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

            if($user_account['user_type'] == 'student'){
                $flag = $this->user_model->change_student_password($this->user_account['ID'], $data);
            }
            else{
                $flag = $this->user_model->change_teacher_password($this->user_account['ID'], $data);
            }
            
            
            if(isset($flag))
            {
                $this->session->set_flashdata('Success','Password successfully changed');
                redirect(base_url('index.php/profile/'));
            }
        }
    }

    public function change_profile_picture(){

        $data = $this->session->userdata();

        $img_string = $this->input->post('img_upload');
        
        $img_string = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img_string));

        $path = "asset/img/" . $data['ID'] . "_" . $data['user_type'] . ".png";
        file_put_contents( $path, $img_string);
        
        if($data['user_type'] == 'student'){
            $flag = $this->user_model->change_profile_picture('Student', $data['ID'], $path);
        }
        if($data['user_type'] == 'teacher')
        {
            $flag = $this->user_model->change_profile_picture('Teacher', $data['ID'], $path);
        }
       
        
        echo json_encode($flag);
    }

}
