<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classes extends CI_Controller
{
    protected $data;
    protected $user_account;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("teacher_model");

        //ambil data dari session yang aktif
        $this->user_account = $this->session->userdata();

        //cek apakah sessionnya kosong/engga
        if (empty($this->user_account)) {
            //kalo kosong -> belom login, redirect ke base_url() -> login url
            redirect(base_url());
        }

        $this->data['class_list'] = $this->teacher_model->teacher_class($this->user_account['ID']);
    }

    public function index()
    {
        //kalo yang login student
        if ($this->user_account['user_type'] == "student") {
            redirect(base_url('index.php/home/'));
        }
        //kalo yang login guru
        else {
            //input nilai siswa
            // $this->load->library("form_validation");
            // $this->form_validation->set_rules('student_score', 'Student_score', 'required');
            // $score = $this->input->post('score');

            //$page -> path view file
            

            $page = $this->user_account['user_type'] . "/classes";

            $this->load->view($page, $this->data);
        }

    }

    public function show_chapter($chapterid = 0)
    {
        $this->data['active'] = $this->input->post('select_class');
        if($chapterid == 0) 
        {
            //sampe if ini bener
            $this->data['subject'] = $this->teacher_model->teacher_subject($this->user_account['ID']);
            $page = $this->user_account['user_type'] . "/classes-chapter";

            $this->load->view($page, $this->data);
        }
        else
        {
            //tapi else ini belum kelar
            $this->data['student_list'] = $this->teacher_model->teacher_class($this->data['active']);
            $page = $this->user_account['user_type'] . "/classes-student";

            $this->load->view($page, $this->data);
        }
    }
}
