<?php

class Student_model extends CI_Model 
{
    //get student class
    public function get_student_class($id){
        $query = "  SELECT DISTINCT C.ClassID, ClassName
                    FROM MsStudent AS S, ClassDetail AS CD, Class AS C 
                    WHERE S.ID = CD.StudentID AND C.ClassID = CD.ClassID AND S.ID = $id; ";
        $result = $this->db->query($query);
        return $result->result_array(); 
    }

    //ambil semua dari kolom MsStudent
    public function student_list()
    {
        $query = "  SELECT *
                    FROM MsStudent AS S, ClassDetail AS CD 
                    WHERE S.ID = CD.StudentID; ";
        $result = $this->db->query($query);
        return $result->result_array(); 
    }

    //ambil semua student di satu kelas
    public function student_list_by_class($classid)
    {
        $query = "  SELECT *
                    FROM MsStudent AS S, ClassDetail AS CD 
                    WHERE S.ID = CD.StudentID AND ClassID = $classid ; ";
        $result = $this->db->query($query);
        return $result->result_array(); 
    }

    //untuk ambil semua schedule dari siswa
    public function student_schedule($id){
        $query = "  SELECT `S`.Name, `CD`.ClassID, `HS`.SubjectName, `SC`.Day, `SC`.Start, `SC`.Duration
                    FROM `msstudent` AS `S`, `classdetail` AS `CD`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE S.ID = CD.StudentID AND CD.ClassID = HS.ClassID AND HS.ScheduleID = SC.ScheduleID AND S.ID = $id
                    ORDER BY `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }

    //untuk ambil schedule besok dari siswa
    public function student_next_schedule($id){
        $query = "  SELECT `S`.Name, `CD`.ClassID, `HS`.SubjectName, `SC`.Day, `SC`.Start, `SC`.Duration
                    FROM `msstudent` AS `S`, `classdetail` AS `CD`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE S.ID = CD.StudentID AND CD.ClassID = HS.ClassID AND HS.ScheduleID = SC.ScheduleID AND S.ID = $id AND 
                        SC.Day = (
                            SELECT DAYNAME(CURDATE()+1)
                        )
                    ORDER BY `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }

    //untuk ambil skor dari siswa
    public function student_score($id)
    {
        $this->db->select('*');
        $this->db->from('Score');
        $this->db->where('StudentID', $id);
        return $this->db->get()->result_array();
    }

    public function change_password($id){
        
    }
}
