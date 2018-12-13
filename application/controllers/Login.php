<?php

class Login extends CI_Controller 
{
    protected $username;
    protected $password;
    protected $login;
    protected $sessions;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(isset($this->sessions))
            redirect('index.php/home');
        else
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
            $this->sessions = $this->session->set_userdata($this->login);
            redirect(base_url('index.php/home/'));
        }
        else
        {
            //login gagal
            $this->session->set_flashdata('Failed','Wrong Username or Password!');
            redirect(base_url());
        }
    }

    public function logout()
    {
        $this->load->driver('cache');
        $this->session->unset_userdata($this->sessions);
        $this->session->sess_destroy();
        $this->cache->clean();
        ob_clean();
        redirect(base_url());
    }
}
