<?php

class Schedule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user_account = $this->session->userdata();

        if(empty($user_account))
        {
            //kalo belum login
            redirect(base_url());
        }
        else
        {
            //kalo udah login
                        
        }

        $this->load->model('user_model');
        $data['schedule'] = $this->user_model->get_schedule($user_account['ID']);
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        $page =  $user_account['user_type'] . "/schedule";
        $this->load->view($page, $data);
    }    

}
