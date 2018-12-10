<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('score_model');
    }

    public function index(){
        $id = 1;
        $data["scores"] = $this->score_model->getById($id);
        $this->load->view('score', $data);
    }
}
