<?php

class User_model extends CI_Model 
{
    protected $usertype;
    
    //untuk cek apakah user yang login ada di database
    public function check_user($username, $password){
        //TODO encrypt password
        $default_password = 123456;
        
        $array = array('Username' => $username);
        $this->db->select("*");
        $this->db->from("MsStudent");
        $this->db->where($array);
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            $data = $query->row_array();
            $user_password = $data['Password'];
            
            if($data['Password'] != $default_password)
                $user_password = $this->encryption->decrypt($data['Password']);
            
            if($password == $user_password)
            {
                $this->usertype = array("user_type" => "student");
                $this->session->set_userdata($this->usertype);
                return $query->row_array();
            }
            
        }
        
        else
        {
            $this->db->select("*");
            $this->db->from("MsTeacher");
            $this->db->where($array);
            $query = $this->db->get();
            
            if($query->num_rows() == 1)
            {
                $data = $query->row_array();
                $user_password = $data['Password'];
                
                if($data['Password'] != $default_password)
                    $user_password = $this->encryption->decrypt($data['Password']);
                
                if($password == $user_password)
                {
                    $this->usertype = array("user_type" => "teacher");
                    $this->session->set_userdata($this->usertype);
                    return $query->row_array();
                }
            }
        }
    }
    
    public function change_student_password($id, $data){
        $this->db->where('ID', $id);
        $this->db->update('MsStudent', $data);
        return $this->db->affected_rows();
    }

    public function change_teacher_password($id, $data){
        $this->db->where('ID', $id);
        $this->db->update('MsTeacher', $data);
        return $this->db->affected_rows();
    }
}
