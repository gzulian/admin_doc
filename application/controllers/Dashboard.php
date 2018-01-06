<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if ($this->user = $this->session->userdata('logged_in') && isAdmin()) {

			$this->load->model('Provider_model', 'provider', true);
			$this->load->model('Document_model', 'document', true);
			$this->load->model('Register_model', 'register', true);

			$this->load->helper('makedate');
			$this->load->helper('percentage');
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

		//Por estado de digitalización
		$query = "select doc_status, count(doc_id) AS total , sum(doc_monto) AS monto ,
			if (doc_ordertype in ('SO', 'SZ', 'SU', 'DQ','SA'), 'Factura',
			if(doc_ordertype in ('CF', 'CO'),'Nota de Crédito',
			if(doc_ordertype in ('DA'), 'Nota de Débito' ,'No definido' ) ) ) as tipo
			from rrf_document
			group by  Tipo, doc_status";
		$result       = $this->db->query($query);
		$dashboard    = array();
		$docsByStatus = array();
		$docsByStatus = Document_model::$type;
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				if (isset($docsByStatus[$row->tipo])) {
					$docsByStatus[$row->tipo][$row->doc_status]['total'] = $row->total;
					$docsByStatus[$row->tipo][$row->doc_status]['monto'] = $row->monto;
				}
			}
		}
		foreach ($docsByStatus as $key => $row) {
			if (!isset($docsByStatus[$key][0])) {
				$docsByStatus[$key][0]['total'] = 0;
				$docsByStatus[$key][0]['monto'] = 0;
			}
			if (!isset($docsByStatus[$key][1])) {
				$docsByStatus[$key][1]['total'] = 0;
				$docsByStatus[$key][1]['monto'] = 0;
			}
			if (!isset($docsByStatus[$key][2])) {
				$docsByStatus[$key][2]['total'] = 0;
				$docsByStatus[$key][2]['monto'] = 0;
			}
			if (!isset($docsByStatus[$key][3])) {
				$docsByStatus[$key][3]['total'] = 0;
				$docsByStatus[$key][3]['monto'] = 0;
			}
			if (!isset($docsByStatus[$key][4])) {
				$docsByStatus[$key][4]['total'] = 0;
				$docsByStatus[$key][4]['monto'] = 0;
			}
			if (!isset($docsByStatus[$key][5])) {
				$docsByStatus[$key][5]['total'] = 0;
				$docsByStatus[$key][5]['monto'] = 0;
			}
		}
		//print_r($docsByStatus);
		//exit();
		$data['docsByStatus'] = $docsByStatus;

		$data['totalDocEnRadicacion']  = $docsByStatus['Factura'][2]['total']+$docsByStatus['G. Despacho'][2]['total']+$docsByStatus['Nota de Débito'][2]['total']+$docsByStatus['Nota de Crédito'][2]['total'];
		$data['totalDocEmitidos']      = $docsByStatus['Factura'][0]['total']+$docsByStatus['G. Despacho'][0]['total']+$docsByStatus['Nota de Débito'][0]['total']+$docsByStatus['Nota de Crédito'][0]['total'];
		$data['montoDocEmitidos']      = $docsByStatus['Factura'][0]['monto']+$docsByStatus['G. Despacho'][0]['monto']+$docsByStatus['Nota de Débito'][0]['monto']+$docsByStatus['Nota de Crédito'][0]['monto'];
		$data['totalDocDigitalizados'] = $docsByStatus['Factura'][4]['total']+$docsByStatus['G. Despacho'][4]['total']+$docsByStatus['Nota de Débito'][4]['total']+$docsByStatus['Nota de Crédito'][4]['total'];
		$data['montoDocDigitalizados'] = $docsByStatus['Factura'][4]['monto']+$docsByStatus['G. Despacho'][4]['monto']+$docsByStatus['Nota de Débito'][4]['monto']+$docsByStatus['Nota de Crédito'][4]['monto'];

		$data['totalDocPenDigitalizados'] = $docsByStatus['Factura'][3]['total']+$docsByStatus['G. Despacho'][3]['total']+$docsByStatus['Nota de Débito'][3]['total']+$docsByStatus['Nota de Crédito'][3]['total'];
		$data['montoDocPenDigitalizados'] = $docsByStatus['Factura'][3]['monto']+$docsByStatus['G. Despacho'][3]['monto']+$docsByStatus['Nota de Débito'][3]['monto']+$docsByStatus['Nota de Crédito'][3]['monto'];

		$data['totalDocPenVenDigitalizados'] = $docsByStatus['Factura'][5]['total']+$docsByStatus['G. Despacho'][5]['total']+$docsByStatus['Nota de Débito'][5]['total']+$docsByStatus['Nota de Crédito'][5]['total'];
		$data['montoDocPenVenDigitalizados'] = $docsByStatus['Factura'][5]['monto']+$docsByStatus['G. Despacho'][5]['monto']+$docsByStatus['Nota de Débito'][5]['monto']+$docsByStatus['Nota de Crédito'][5]['monto'];

		/*	RETORNO */
		$docsByResponsable = Document_model::$type;
		$query             = "
			select count(doc_id) AS total ,
			if(doc_status = 1,'SAC', if(doc_carrier ='FASTCO','FASTCO',if(doc_carrier='TLS','TLS','') )) as operador,
			if (doc_ordertype in ('SO', 'SZ', 'SU', 'DQ','SA'), 'Factura',
			if(doc_ordertype in ('CF', 'CO'),'Nota de Crédito',
			if(doc_ordertype in ('DA'), 'Nota de débito' ,doc_ordertype ) ) ) as tipo from rrf_document where doc_status in (1,2)
			group by  Tipo,operador";

		$result = $this->db->query($query);

		if ($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				if (isset($docsByResponsable[$row->tipo])) {
					$docsByResponsable[$row->tipo][$row->operador] = $row->total;
				}
			}
		}
		foreach ($docsByResponsable as $key => $row) {
			if (!isset($docsByResponsable[$key]['TLS'])) {
				$docsByResponsable[$key]['TLS'] = 0;

			}
			if (!isset($docsByResponsable[$key]['SAC'])) {
				$docsByResponsable[$key]['SAC'] = 0;

			}
			if (!isset($docsByResponsable[$key]['FASTCO'])) {
				$docsByResponsable[$key]['FASTCO'] = 0;

			}
		}
		$data['totalTLS']          = $docsByResponsable['Factura']['TLS']+$docsByResponsable['G. Despacho']['TLS']+$docsByResponsable['Nota de Débito']['TLS']+$docsByResponsable['Nota de Crédito']['TLS'];
		$data['totalFASTCO']       = $docsByResponsable['Factura']['FASTCO']+$docsByResponsable['G. Despacho']['FASTCO']+$docsByResponsable['Nota de Débito']['FASTCO']+$docsByResponsable['Nota de Crédito']['FASTCO'];
		$data['totalSAC']          = $docsByResponsable['Factura']['SAC']+$docsByResponsable['G. Despacho']['SAC']+$docsByResponsable['Nota de Débito']['SAC']+$docsByResponsable['Nota de Crédito']['SAC'];
		$data['docsByResponsable'] = $docsByResponsable;

		//Gráficos de cumplimiento
		$data['totalFacturaEnProcesoDeRetorno'] = $docsByStatus['Factura'][2]['total']+$docsByStatus['Factura'][3]['total']+$docsByStatus['Factura'][5]['total'];
		$data['totalGuiaEnProcesoDeRetorno']    = $docsByStatus['G. Despacho'][2]['total']+$docsByStatus['G. Despacho'][3]['total']+$docsByStatus['G. Despacho'][5]['total'];
		$data['totalNCEnProcesoDeRetorno']      = $docsByStatus['Nota de Crédito'][2]['total']+$docsByStatus['Nota de Crédito'][3]['total']+$docsByStatus['Nota de Crédito'][5]['total'];
		$data['totalNDEnProcesoDeRetorno']      = $docsByStatus['Nota de Débito'][2]['total']+$docsByStatus['Nota de Débito'][3]['total']+$docsByStatus['Nota de Débito'][5]['total'];
		/* FIN RETORNO */

		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer', $data);

	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */