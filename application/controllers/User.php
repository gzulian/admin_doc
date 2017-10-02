<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['active'] = "users";
		$data['user']  = $this->session->userdata('logged_in');
		$this->load->view('master',$data);
		$this->load->view('users', $data, FALSE);
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */