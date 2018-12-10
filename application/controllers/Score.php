<?php

class Score extends CI_Controller
{
    public function __construct(){
        $this->load->model('score_model');
    }

    public function index(){
        $id = 1;
        $data["score"] = $this->score_model->getById($id);
        $this->load->view('score', $data);
    }
}
