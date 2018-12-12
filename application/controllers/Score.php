<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        //ambil data dari session yang aktif
        $user_account = $this->session->userdata();

        //cek apakah sessionnya kosong/engga
        if(empty($user_account))
        {
            //kalo kosong -> belom login, redirect ke base_url() -> login url
            redirect(base_url());
        }
        else
        {
            //kalo udah login
            $this->load->model('user_model');
            
            //ambil data dari database
            $data['scores'] = $this->user_model->student_score($user_account['ID']);

            //$page -> path view file
            $page =  $user_account['user_type'] . "/score";

            $this->load->view($page, $data);                        
        } 
    }   
}
