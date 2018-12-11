<?php

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login_process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login = $this->user_model->check_user($username, $password);

        if(!empty(login))
        {
            //login sukses
            $this->session->set_userdata($login);
            redirect(base_url());
        }
        else
        {
            //login gagal
            $this->session->set_flasdata('Login Failed','Wrong Username or Password!');
            redirect(base_url());
        }
    }
}
