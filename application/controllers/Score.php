<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller
{
    protected $data;
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
            //kalo yang login student
            if($user_account['user_type'] == "student")
			{
                //kalo udah login
                $this->load->model('student_model');
                
                //ambil data dari database
                $this->data['scores'] = $this->student_model->student_score($user_account['ID']);

                
            }
            //kalo yang login guru
            else
            {
                //redirect home
                redirect(base_url('index.php/home/'));
            }

            //$page -> path view file
            $page =  $user_account['user_type'] . "/score";

            $this->load->view($page, $this->data);  
                             
        } 
    }   
}
