<?php

class User_model extends CI_Model 
{
    protected $usertype;

    //untuk cek apakah user yang login ada di database
    public function check_user($username, $password){
        //TODO encrypt password

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

    public function update_user($data)
    {
        # code...
    }
}
