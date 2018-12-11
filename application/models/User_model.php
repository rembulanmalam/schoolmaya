<?php

class User_model extends CI_Model 
{
    public function check_user($username, $password){
        //cek username & password yang cocok di tabel MsStudent
        $array = array('Password' => $password, 'Username' => $username);
        $this->db->select("*");
        $this->db->from("MsStudent");
        $this->db->where($array);
        $query = $this->db->get();
        
        if(null !== $query->result_array())
            //kalo ketemu, return hasilnya
            return $query->result_array();
        
        else
        {
            //kalo ga ketemu, cari di tabel MsTeacher -> berarti usernya guru
            $this->db->select("*");
            $this->db->from("MsTeacher");
            $this->db->where($array);
            $query = $this->db->get();
            if(null!==$query->result_array())
                //kalo ketemu, return hasilnya
                return $query->result_array();  
        }
    }
}
