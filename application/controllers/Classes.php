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
        $student_list = $this->teacher_model->student_list($input_class, $input_chapter);
        echo json_encode($student_list);
    }

    public function show_exam(){
        $input_class = $this->input->post('select_class');
        $input_chapter = $this->input->post('select_chapter');
        $exam_schedule = $this->teacher_model->exam_schedule($input_chapter, $input_class);
        echo json_encode($exam_schedule);
    }

    public function show_available_schedule(){
        //show schedule yang dipilih
        //range schedule yang bisa dipilih adalah 1 bulan dari hari sekarang,
        //dan yang harinya sesuai schedule rutin
        $input_subject = $this->input->post('select_subject');
        $input_class = $this->input->post('select_class');
        $result = $this->teacher_model->teacher_subject_class_schedule($this->user_account['ID'], $input_subject, $input_class);
        $length = count($result);

        $dates = array();
        for($i = 0; $i < $length ; $i++){
            $dates[] = strtotime($result[$i]['Day']);
        }
        for($i = 0; $i < $length * 3 ; $i++){
            $dates[] = strtotime('+1 week', $dates[$i]);
        }
        echo json_encode($dates);
    }

    public function change_exam(){
        $input_date = $this->input->post('select_date');
        $input_chapter = $this->input->post('select_chapter');
        $input_class = $this->input->post('select_class');

        $data = array (
            'ClassID' => $input_class,
            'ExamSchedule' => $input_date,
            'ChapterID' => $input_chapter
        );

        $result = $this->teacher_model->update_exam($data);
        echo json_encode($result);
    }

    public function change_score(){
        $id = $this->input->post('student_id');
        $chapter = $this->input->post('chapter_id');
        $new_score = $this->input->post('score');
        $old_score = $this->input->post('old_score');
        $result;

        $data = array(
            'StudentID' => $id,
            'Score' => $new_score,
            'ChapterID' => $chapter
        );
       
        if($old_score == 'N/A')
        {    
            $result = $this->teacher_model->create_new_score($data);
        }
        else if($old_score >= 0 && $old_score <= 100){
            $result = $this->teacher_model->update_score($data);
        }
        
        echo json_encode($result);
    }


}
