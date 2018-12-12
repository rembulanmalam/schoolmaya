<?php

class User_model extends CI_Model 
{
    protected $usertype;

    public function check_user($username, $password){
        //cek username & password yang cocok di tabel MsStudent
        $array = array('Password' => $password, 'Username' => $username);
        $this->db->select("*");
        $this->db->from("MsStudent");
        $this->db->where($array);
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            //kalo ketemu, return hasilnya
            $this->usertype = array("user_type" => "student");
            $this->session->set_userdata($this->usertype);
            return $query->row_array();
        }
        
        else
        {
            //kalo ga ketemu, cari di tabel MsTeacher -> berarti usernya guru
            $this->db->select("*");
            $this->db->from("MsTeacher");
            $this->db->where($array);
            $query = $this->db->get();
            if($query->num_rows() > 0)
            {
                //kalo ketemu, return hasilnya
                //buat session teacher -> identifikasi yg login adalah teacher
                $this->usertype = array("user_type" => "teacher");
                $this->session->set_userdata($this->usertype);
                return $query->row_array();  
            }
        }
    }   

    public function get_schedule($id){
        $query = "  SELECT `S`.Name, `CD`.ClassID, `HS`.SubjectName, `SC`.Day, `SC`.Start, `SC`.Duration
                    FROM `msstudent` AS `S`, `classdetail` AS `CD`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE S.ID = CD.StudentID AND CD.ClassID = HS.ClassID AND HS.ScheduleID = SC.ScheduleID AND S.ID = 1
                    ORDER BY `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }

    public function get_next_schedule($id){
        $query = "  SELECT `S`.Name, `CD`.ClassID, `HS`.SubjectName, `SC`.Day, `SC`.Start, `SC`.Duration
                    FROM `msstudent` AS `S`, `classdetail` AS `CD`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE S.ID = CD.StudentID AND CD.ClassID = HS.ClassID AND HS.ScheduleID = SC.ScheduleID AND S.ID = 1 AND 
                        SC.Day = (
                            SELECT DAYNAME(CURDATE()+1)
                        )
                    ORDER BY `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }
}
