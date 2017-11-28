<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if ($this->user = $this->session->userdata('logged_in')) {

			$this->load->model('Provider_model', 'provider', true);
			$this->load->model('Document_model', 'document', true);
			$this->load->model('Register_model', 'register', true);

			$this->load->helper('makedate');
		} else {
			redirect('Login/index', 'refresh');
		}
		//Do your magic here
	}
	public function test() {

		$this->load->view('header', "", FALSE);
		$this->load->view('test', "", FALSE);
		$this->load->view('footer', "", FALSE);
	}
	public function index() {
		$data['active'] = "dashboard";
		$data['user']   = $this->session->userdata('logged_in');
		$this->load->database();

		$meses  = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$filter = array('month' => date("m"), "year" => date("Y"));

		if (isset($_POST['filter']) && !empty(trim($_POST['filter']['year'])) && !empty(trim($_POST['filter']['month']))) {

			$filter = $_POST['filter'];
		}

		$where = ' where doc_month = "'.$meses[$filter['month']].'" and year(doc_documentdate) = '.$filter["year"];

		//Por estado de digitalización
		$query = "select count(doc_id) AS total , sum(doc_monto) AS monto , if(doc_datedigrecepcionfac = '' or doc_datedigrecepcionfac ='0000-00-00', 0,1 ) as digi,
			if (doc_ordertype in ('SO', 'SZ', 'SU', 'DQ'), 'Factura',
			if(doc_ordertype in ('CF', 'CO'),'Nota de Crédito',
			if(doc_ordertype in ('DA'), 'Nota de Débito' ,'No definido' ) ) ) as tipo
			from rrf_document
			".$where."
			group by  Tipo, digi";
		$result           = $this->db->query($query);
		$dashboard        = array();
		$docsByStatusDigi = array();
		$docsByStatusDigi = Document_model::$type;

		if ($result->num_rows() > 0) {

			foreach ($result->result() as $row) {
				if (isset($docsByStatusDigi[$row->tipo])) {
					$docsByStatusDigi[$row->tipo][$row->digi]['total'] = $row->total;
					$docsByStatusDigi[$row->tipo][$row->digi]['monto'] = $row->monto;
				}
			}
		}
		foreach ($docsByStatusDigi as $key => $row) {
			if (!isset($docsByStatusDigi[$key][0])) {
				$docsByStatusDigi[$key][0]['total'] = 0;
				$docsByStatusDigi[$key][0]['monto'] = 0;
			}
			if (!isset($docsByStatusDigi[$key][1])) {
				$docsByStatusDigi[$key][1]['total'] = 0;
				$docsByStatusDigi[$key][1]['monto'] = 0;
			}
		}

		$data['docsByStatusDigi'] = $docsByStatusDigi;
		$data['filters']          = $filter;

		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer', $data);

	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */