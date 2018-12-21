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
        
    }
}
