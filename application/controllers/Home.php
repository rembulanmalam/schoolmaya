<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//ambil data dari session yang aktif
		$data['user_account'] = $this->session->userdata();

		//cek apakah sessionnya kosong/engga
		if(empty($data['user_account']))
        {
            //kalo belum login
            redirect(base_url());
        }
        else
        {	
			//kalo yang login student
			if($data['user_account']['user_type'] == "student")
			{
				$this->load->model('student_model');
				
				//ambil data dari database
				$data['class'] = $this->student_model->get_student_class($data['user_account']['ID']);
				$data['schedule'] = $this->student_model->student_next_schedule($data['user_account']['ID']);
				$data['exam'] = $this->student_model->student_next_exam($data['class']['ClassID']);	
			}
			//kalo yang login guru
			else
			{
				$this->load->model('teacher_model');

				//ambil data dari database
				$data['schedule'] = $this->teacher_model->teacher_next_schedule($data['user_account']['ID']);
			}
			//$page -> path view file
			$page =  $data['user_account']['user_type'] . "/home";
			$this->load->view($page, $data);
        }	
	}

	public function check_usertype(){
		$data['user_account'] = $this->session->userdata();
		echo json_encode($data['user_account']['user_type']);
	}
}
