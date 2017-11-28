<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->user = $this->session->userdata('logged_in')) {
			$this->load->model('Provider_model', 'provider', true);
			$this->load->model('Document_model', 'document', true);
			$this->load->model('Register_model', 'register', true);
		} else {
			redirect('Login/index', 'refresh');
		}

	}
	public function status() {
		$data['active']    = "dashboard";
		$data['user']      = $this->session->userdata('logged_in');
		$data['documents'] = array();

		if (isset($_POST['filter'])) {
			$this->db->select("rrf_document.*", false);
			$this->db->from("rrf_document");
			if (isset($_POST['filter']['number']) && !empty($_POST['filter']['number'])) {
				$this->db->where("doc_salenumber", $_POST['filter']['number']);
			} else {
				if (isset($_POST['filter']['customer']) && !empty($_POST['filter']['customer'])) {
					$this->db->like("doc_customer", $_POST['filter']['customer']);
				}
				if (isset($_POST['filter']['year']) && !empty(trim($_POST['filter']['year']))) {
					$this->db->where("YEAR(doc_facdate)", $_POST['filter']['year']);
				}
				if (isset($_POST['filter']['month']) && !empty(trim($_POST['filter']['month']))) {
					$this->db->where("doc_month", $_POST['filter']['month']);
				}
			}
			$result = $this->db->get();
			if ($result->num_rows() > 0) {
				$data['documents'] = $result->result();
			}

			$data['filters'] = $_POST['filter'];

		}

		$this->load->view('header', $data);
		$this->load->view('status_report', $data);
		$this->load->view('footer', $data);

	}
	public function motive() {
		$data['active'] = "dashboard";
		$data['user']   = $this->session->userdata('logged_in');

		$data['documents'] = array();
		//$this->load->view('master', $data);
		$this->load->view('header', $data);
		$this->load->view('motive_report', $data);
		$this->load->view('footer', $data);
	}
	public function returnDoc() {
		$data['active'] = "dashboard";
		$data['user']   = $this->session->userdata('logged_in');

		$data['documents'] = array();
		$this->load->view('header', $data);
		$this->load->view('return_report', $data);
		$this->load->view('footer', $data);
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */