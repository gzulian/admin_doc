<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->user = $this->session->userdata('logged_in') && isAdmin()) {
			$this->load->model('Provider_model', 'provider', true);
			$this->load->model('Document_model', 'document', true);
			$this->load->model('Register_model', 'register', true);
			$this->load->helper('makedate');

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
				if (isset($_POST['filter']['from']) && !empty(trim($_POST['filter']['from'])) && isset($_POST['filter']['to']) && !empty(trim($_POST['filter']['to']))) {
					$from = dinamicMakeDate($_POST['filter']['from']);
					$to   = dinamicMakeDate($_POST['filter']['to']);
					if (!is_null($from) && !is_null($to) && $from <= $to) {
						$this->db->where("doc_facdate>=", $from->format('Y-m-d'));
						$this->db->where("doc_facdate<=", $to->format('Y-m-d'));
					}
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

		if (isset($_POST['filter'])) {
			$this->db->select("rrf_document.*, res_name, mot_name, sta_name, con_date", false);
			$this->db->from("rrf_document");
			$this->db->join('rrf_contingency', 'con_doc_id = doc_id', 'join');
			$this->db->join('rrf_motive', 'con_mot_id = mot_id', 'join');
			$this->db->join('rrf_responsable', 'con_res_id = res_id', 'join');
			$this->db->join('rrf_status', 'con_sta_id = sta_id', 'join');

			if (isset($_POST['filter']['number']) && !empty($_POST['filter']['number'])) {
				$this->db->where("doc_ordernumber", $_POST['filter']['number']);
			} else {
				if (isset($_POST['filter']['customer']) && !empty($_POST['filter']['customer'])) {
					$this->db->like("doc_customer", $_POST['filter']['customer']);
				}
				if (isset($_POST['filter']['from']) && !empty(trim($_POST['filter']['from'])) && isset($_POST['filter']['to']) && !empty(trim($_POST['filter']['to']))) {
					$from = dinamicMakeDate($_POST['filter']['from']);
					$to   = dinamicMakeDate($_POST['filter']['to']);
					if (!is_null($from) && !is_null($to) && $from <= $to) {
						$this->db->where("doc_documentdate>=", $from->format('Y-m-d'));
						$this->db->where("doc_documentdate<=", $to->format('Y-m-d'));
					}
				}
			}
			$result = $this->db->get();
			if ($result->num_rows() > 0) {
				$data['documents'] = $result->result();
			}

			$data['filters'] = $_POST['filter'];

		}
		//$this->load->view('master', $data);
		$this->load->view('header', $data);
		$this->load->view('motive_report', $data);
		$this->load->view('footer', $data);
	}
	public function returnDoc() {
		$data['active']    = "dashboard";
		$data['user']      = $this->session->userdata('logged_in');
		$data['documents'] = array();

		if (isset($_POST['filter'])) {
			$this->db->select("rrf_document.*", false);
			$this->db->from("rrf_document");
			if (isset($_POST['filter']['number']) && !empty($_POST['filter']['number'])) {
				$this->db->where("doc_ordernumber", $_POST['filter']['number']);
			} else {
				if (isset($_POST['filter']['customer']) && !empty($_POST['filter']['customer'])) {
					$this->db->like("doc_customer", $_POST['filter']['customer']);
				}
				if (isset($_POST['filter']['from']) && !empty(trim($_POST['filter']['from'])) && isset($_POST['filter']['to']) && !empty(trim($_POST['filter']['to']))) {
					$from = dinamicMakeDate($_POST['filter']['from']);
					$to   = dinamicMakeDate($_POST['filter']['to']);
					if (!is_null($from) && !is_null($to) && $from <= $to) {
						$this->db->where("doc_documentdate>=", $from->format('Y-m-d'));
						$this->db->where("doc_documentdate<=", $to->format('Y-m-d'));
					}
				}
			}
			$result = $this->db->get();
			if ($result->num_rows() > 0) {
				$data['documents'] = $result->result();
			}

			$data['filters'] = $_POST['filter'];

		}

		//$data['documents'] = array();
		$this->load->view('header', $data);
		$this->load->view('return_report', $data);
		$this->load->view('footer', $data);
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */