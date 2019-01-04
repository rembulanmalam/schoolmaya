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

    public function show_class(){
        $input_class = $this->input->post('select_class');        
        $chapter = $this->teacher_model->teacher_class_subject_chapter($this->user_account['ID']);
        echo json_encode($chapter);
    }

    public function show_student(){
        $input_class = $this->input->post('select_class');
        $input_chapter = $this->input->post('select_chapter');
        $student_list = $this->teacher_model->student_list($input_class);
        echo json_encode($student_list);
    }
}
