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
		$this->load->database();
		//if(isset($_POST['filter'])){
			//desde el primer día del mes a la fecha 
			//facturas recibidas vs ingRESAS
			//$pendings = $this->document->getPendings();
			//$
		//}else{
			setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');  
			$months = array();
			for ($i=0; $i <3; $i++) { 
				$months[] = "'".strftime("%b",strtotime("-".$i." month"))."'";
				$monthsNumber[] = strftime("%m",strtotime("-".$i." month"));
			}
			//$monthsNumber[] = 0;

			/* facturas */
			$sqlFacturaDigi = "select MONTH(doc_datedigrecepcionfac) as month, count(*) as cantidad from rrf_document where MONTH(doc_datedigrecepcionfac) in (".implode(",",$monthsNumber).") and YEAR(doc_documentdate)  = ".date("Y")." group  by MONTH(doc_datedigrecepcionfac) ";
			
			$resultFactDigi = $this->db->query($sqlFacturaDigi);
			$facturas = array();
			foreach ($resultFactDigi->result() as $key => $value) {
				$facturas[$value->month] =  $value->cantidad;
			}
			foreach ($monthsNumber as $key => $value) {
				if(!array_key_exists(intval($value), $facturas)){	
					$facturas[intval($value)] =  0;
				}
			}
			
			$sqlFacturaNoDigi = " select MONTH(doc_documentdate) as month, count(*) as cantidad from rrf_document where doc_datedigrecepcionfac = '0' or doc_datedigrecepcionfac = '0000-00-00' and MONTH(doc_documentdate)  in (".implode(",",$monthsNumber).") and YEAR(doc_documentdate)  = ".date("Y")." group  by MONTH(doc_documentdate)  ";
			
			$resultFactNoDigi = $this->db->query($sqlFacturaNoDigi);
			$facturasPendientes = array();
			foreach ($resultFactNoDigi->result() as $key => $value) {
				$facturasPendientes[$value->month] =  $value->cantidad;
			}
			foreach ($monthsNumber as $key => $value) {
				if(!array_key_exists(intval($value), $facturasPendientes)){	
					$facturasPendientes[intval($value)] =  0;
				}
			}
			
			/* fin facturas */	

			/** guías*/
			$sqlGuiaDigi = "select MONTH(doc_datedigi) as month, count(*) as cantidad from rrf_document where MONTH(doc_datedigi) in (".implode(",",$monthsNumber).") 
				group  by MONTH(doc_datedigi) ";
			$resultGuia = $this->db->query($sqlGuiaDigi);
			$guias = array();
			foreach ($resultGuia->result() as $key => $value) {
				$guias[$value->month] =  $value->cantidad;
			}
			foreach ($monthsNumber as $key => $value) {
				if(!array_key_exists(intval($value), $guias)){	
					$guias[intval($value)] =  0;
				}
			}

			$sqlGuiaNoDigi = " select MONTH(doc_documentdate) as month, count(*) as cantidad from rrf_document where doc_datedigi = '0' or doc_datedigi = '0000-00-00' and MONTH(doc_documentdate)  in (".implode(",",$monthsNumber).") and YEAR(doc_documentdate)  = ".date("Y")." group  by MONTH(doc_documentdate)  ";
			
			$resultGuiaNoDigi = $this->db->query($sqlGuiaNoDigi);
			$guiasPendientes = array();
			foreach ($resultGuiaNoDigi ->result() as $key => $value) {
				$guiasPendientes[$value->month] =  $value->cantidad;
			}
			foreach ($monthsNumber as $key => $value) {
				if(!array_key_exists(intval($value), $guiasPendientes)){	
					$guiasPendientes[intval($value)] =  0;
				}
			}
			// mejorar este arreglo
			foreach ($guiasPendientes as $key => $value) {
				if(array_key_exists(intval($key), $monthsNumber)){	
					unset($guiasPendientes[$key]);
				}
			}

			/*  fin guías */
			//$guiasPendientes = array_intersect_key($guiasPendientes,$monthsNumber);
			krsort($facturasPendientes);
			krsort($facturas);
			krsort($guias);
			krsort($guiasPendientes);
			
			$sqlRetorno = "select  doc_daytls,count(doc_daytls) as retorno from  rrf_document where month(doc_documentdate) in (8,9,10)
						group by doc_daytls ";
			$resultRetorno = $this->db->query($sqlRetorno);
			$dataRetorno =  array();
			if($resultRetorno->num_rows() > 0){
				foreach ($resultRetorno->result() as $key => $value) {
					$dataRetorno['dias'][] = "'".$value->doc_daytls."'";
					$dataRetorno['prom'][] = $value->retorno;
				}
			}

			//rsort($dataRetorno['dias']);
			
			$data['dataRetorno']        = $dataRetorno;
			$data['guias']              = $guias;
			$data['facturas']           = $facturas;
			$data['facturasPendientes'] = $facturasPendientes;
			$data['guiasPendientes']    = $guiasPendientes;
			$data['months']             = $months;
		//}

		$this->load->view('master',$data);
		$this->load->view('dashboard', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */