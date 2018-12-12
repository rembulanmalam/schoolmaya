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
			//kalo udah login
			$this->load->model('user_model');

			//ambil data dari database
			$data['schedule'] = $this->user_model->student_next_schedule($data['user_account']['ID']);
			
			//$page -> path view file
			$page =  $data['user_account']['user_type'] . "/home";
			$this->load->view($page, $data);
        }	
	}
}
