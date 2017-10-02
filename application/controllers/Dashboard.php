<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function index()
	{
		$data['active'] = "dashboard";
		$data['user']   = $this->session->userdata('logged_in');
		$this->load->view('master',$data);
		$this->load->view('dashboard', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */