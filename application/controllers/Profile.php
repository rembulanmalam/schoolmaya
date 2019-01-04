<?php

class Profile extends CI_Controller
{
    protected $user_account;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        
    }
    
    public function index()
    {
        $this->user_account = $this->session->userdata();
        $page = $this->user_account['user_type'] . "/profile";
        $this->load->view($page, $this->user_account);
    }
    
    public function update()
    {
        $this->user_account = $this->session->userdata();
        //encrypt new password

        $confirm_new_password = $this->input->post('RNPassword');
        $new_password = $this->input->post('NPassword');
        
        //password ga match
        if($confirm_new_password != $new_password)
        {
            $this->session->set_flashdata('Failed','Password not match');
            redirect(base_url('index.php/profile/'));  
        }
        
        //password kurang dari 8 digit
        else if(strlen($confirm_new_password) < 8)
        {
            $this->session->set_flashdata('Failed','Password doesn\'t match requirement');
            redirect(base_url('index.php/profile/'));
        }
        
        //password sesuai requirement
        else {
            $new_password = $this->encryption->encrypt($new_password);
            
            $data = array( 'Password' => $new_password );
            $flag = $this->user_model->change_student_password($this->user_account['ID'], $data);
            
            if(isset($flag))
            {
                $this->session->set_flashdata('Success','Password successfully changed');
                redirect(base_url('index.php/profile/'));
            }
        }
    }
}
