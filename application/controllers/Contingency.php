<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contingency extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->user = $this->session->userdata('logged_in')) {
			$this->load->model('Contingency_model', 'contingency', true);
			$this->load->helper('makedate');
		} else {
			redirect('Login/index', 'refresh');
		}
		//Do your magic here
	}
	public function create() {
		$response = array();
		if (isset($_REQUEST['catchData'])) {
			$catchData = $_REQUEST['catchData'];
			$this->load->model('Responsable_model', 'responsable');
			$this->load->model('Motive_model', 'motive');
			$this->load->model('Document_model', 'document');
			if (!is_null($motive = $this->motive->findById($catchData['motive'])) && !is_null($responsable = $this->responsable->findById($catchData['responsable'])) && !is_null($document = $this->document->findById($_REQUEST['documents']))) {
				$now         = new DateTime();
				$contingency = $this->contingency->create(array(
						'con_mot_id' => $motive->get('mot_id'),
						'con_res_id' => $responsable->get('res_id'),
						'con_date'   => $now->format('Y-m-d H:i:s'),
						'con_sta_id' => $document->get('doc_status'),
						'con_obs'    => $catchData['obs'],
						'con_use_id' => $this->user['id'],
						'con_doc_id' => $document->get('doc_id')
					));
				$contingency->save();
				$response['success'] = "Registro creado con éxito ";
			} else {
				$response['error'] = "Error al crear el registro ";
			}
		} else {
			$response['error'] = "Error al crear el registro ";
		}
		echo json_encode($response);
	}


	public function responsible(){
		$data['responsibles'] = $this->db->get('rrf_responsable ')->result();
		$this->load->view('header', $data, FALSE);
		$this->load->view('responsible', $data, FALSE);
		$this->load->view('footer', $data, FALSE);
	}
	public function motive(){

		$data['motives'] = $this->db->get('rrf_motive')->result();
		$this->load->view('header', $data, FALSE);
		$this->load->view('motive', $data, FALSE);
		$this->load->view('footer', $data, FALSE);
	}
	public function findMotive($id)
	{
		if (!is_null($id) &&  is_numeric($id) ) {
			
			$result = $this->db->get_where('rrf_motive',array('mot_id'=>$id));
			$data  = $result->row_object();
			$response['motive']     = get_object_vars($data); 
			echo json_encode($response);
		}
	}
	public function saveMotive($id)
	{
		if (!is_null($id) &&  is_numeric($id) ) {
			
			$result = $this->db->get_where('rrf_motive',array('mot_id'=>$id));
			$data  = $result->row_object();
			$response['motive']     = get_object_vars($data); 
			echo json_encode($response);
		}
	}
	public function findResponsible($id)
	{
		if (!is_null($id) &&  is_numeric($id) ) {
			
			$result = $this->db->get_where('rrf_responsable',array('res_id'=>$id));
			$data  = $result->row_object();
			$response['responsible']     = get_object_vars($data); 
			echo json_encode($response);
		}
	}

}

/* End of file Catch.php */
/* Location: ./application/controllers/Catch.php */