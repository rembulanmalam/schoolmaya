<?php

class Login extends CI_Controller 
{
    protected $username;
    protected $password;
    protected $login;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function process()
    {
        $this->username = $this->input->post('username');
        $this->password = $this->input->post('password');
        $this->load->model('user_model');
        $this->login = $this->user_model->check_user($this->username, $this->password);

        if(isset($this->login))
        {
            //login sukses
            $this->session->set_userdata($this->login);
            redirect(base_url('index.php/welcome/'));
        }
        else
        {
            //login gagal
            $this->session->set_flashdata('Login Failed','Wrong Username or Password!');
            redirect(base_url());
        }
    }
}
