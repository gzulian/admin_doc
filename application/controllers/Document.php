<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->user = $this->session->userdata('logged_in')){
			$this->load->model('Provider_model','provider',true);
			$this->load->model('Document_model','document',true);
			$this->load->model('Register_model','register',true);
			$this->load->helper('makedate');

		}else{
			redirect('Login/index','refresh');
		}
	}

	public function index()
	{

		

		$data['active'] = "document1";
		$data['user']   = $this->user;
		$this->load->view('master',$data);
		$this->load->view('recive', $data, FALSE);
	}
	public function filter(){
		if(isset($_POST['filter'])){
			$this->load->database();
			$this->db->select('rrf_document.*');
			$this->db->from('rrf_document');
			if(isset($_POST['filter']['folio']) && !empty(trim($_POST['filter']['folio']) && is_numeric($_POST['filter']['folio']))){
				$this->db->where('doc_serial',$_POST['filter']['folio']);
			}
			
			if(isset($_POST['filter']['provider']) && !empty(trim($_POST['filter']['provider']))) {
				$this->db->like('doc_customer',$_POST['filter']['provider']);	
			}
			
			if(isset($_POST['filter']['datetype']) && !empty(trim($_POST['filter']['datetype']))){
				if(isset($_POST['filter']['from']) && !empty(trim($_POST['filter']['from'])) && isset($_POST['filter']['to']) && !empty(trim($_POST['filter']['to'])) ){
					$from = dinamicMakeDate($_POST['filter']['from']);
					$to   = dinamicMakeDate($_POST['filter']['to']);
					
					if($from && $to && $from<=$to){
						$this->db->where($_POST['filter']['datetype'],">=".$from->format('Y-m-d'));
						$this->db->where($_POST['filter']['datetype'],"<=".$to->format('Y-m-d'));
					}else{
						$response['errors'][] = "Rango de fechas invalido";
					}

				}
			}
			$results = $this->db->get();
			$documents =  array(); 
			if($results->num_rows() > 0){
				foreach ($results->result() as $key => $value) {
					$document = $this->document->create($value);
					$documents[$key]['serial']   = $document->get('doc_serial');
					$documents[$key]['customer'] = $document->get('doc_customer');
					$documents[$key]['date']     = $document->get('doc_documentdate');
				}
				$response['documents'] = $documents;
			}
			
			echo json_encode($response);
			
			
		}
	}
	public function recive()
	{
		
		if(isset($_POST['document']) &&  isset($_POST['document']['doc_id']) && is_numeric($_POST['document']['doc_id'])){
			$document = $this->document->findById($_POST['document']['doc_id']);
			$document->setColumns(array_filter($_POST['document']));
			$document->set('doc_status',1);
			$document->save();

			$registerData = array("reg_doc_id"=>300,"reg_use_id"=>$this->user['id'],"reg_action"=>1,"reg_date"=>date("Y-m-d"));
			$register = $this->register->create($registerData);
			$register->save();	
			
		}
	}
	public function find()
	{
		$response = array();
		$document = $this->document->findByFolio($_REQUEST['serial']);

		if(isset($_REQUEST['serial']) &&  is_numeric($_REQUEST['serial'])  && !is_null($document)   ) {
			$response['document']  = $document->toArray();
		}else{
			$response['error']  = "Valor inválido";

		}
		echo json_encode($response);
	}

	public function upload()
	{
		//	phpinfo(); exit();
		$data['active'] = "document2";
		$data['user']   = $this->user;

		$this->load->view('master',$data);
		$this->load->view('upload', $data, FALSE);	
 
		
	}

	public function uploadAjax()
	{
		if(isset($_FILES['file']) && $_FILES['file']['error']  == 0){
			$flag = true;
			$rows = 0;
			$errors = array();
			//'application/vnd.ms-excel',
			$mimes = array('text/plain','text/csv','text/tsv');
			if (in_array($_FILES['file']['type'],$mimes) &&  ($gestor = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
			    $documents = array();
			    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
		        	if($flag) { $flag = false; continue; }
					$rows++;
					if(count($datos) == 39 && is_numeric($datos[7])){
						$document = $this->document->findByFolio($datos[7]);
						if(is_null($document)){
							$doc_fsac                = dinamicMakeDate($datos[18]);
							$doc_fradicacion         = dinamicMakeDate($datos[23]);
							$doc_facdate             = dinamicMakeDate($datos[34]);
							$doc_guidedate           = dinamicMakeDate($datos[35]);
							$doc_ftls                = dinamicMakeDate($datos[25]);
							$doc_documentdate        = dinamicMakeDate($datos[6]);
							$doc_datelogtosac        = dinamicMakeDate($datos[18]);
							$doc_datetls             = dinamicMakeDate($datos[28]);
							$doc_dateradicacion      = dinamicMakeDate($datos[31]);
							$doc_dateradicacionfact  = dinamicMakeDate($datos[34]);
							$doc_datedigi            = dinamicMakeDate($datos[35]);
							$doc_datedigrecepcionfac = dinamicMakeDate($datos[36]);
							
							$provider = $this->provider->findByName($datos[2]);
							if(is_null($provider)){
								$providerData = array('pro_name'=>$datos[2],'pro_nameTwo'=>$datos[3],'pro_datesys'=>date('Y-m-d H:i:s'));
								$provider = $this->provider->create($providerData);
								$provider->save();
							}

					    	$rowData =  array(        
				    			'doc_serial'=>$datos[7], 
						        'doc_status'=>0, 
						        //'doc_file'=>$datos[7], 
						        'doc_datesys'=>date('Y-m-d H:i:s'), 
						        'doc_customer'=>$datos[2], 
						        'doc_customerTwo'=>$datos[3],
						        'doc_pro_id'=>$provider->get('pro_id'), 
						        'doc_return'=>$datos[16], 
						        'doc_radicacion'=>$datos[22], 
						        'doc_fsac'=>($doc_fsac)? $doc_fsac->format('Y-m-d'):"",//FECHA 
						        'doc_fradicacion'=>($doc_fradicacion)? $doc_fradicacion->format('Y-m-d'):"",//fecha
						        'doc_guidedate'=>($doc_guidedate)? $doc_guidedate->format('Y-m-d'):"", //fecha
						        'doc_facdate'=>($doc_facdate)? $doc_facdate->format('Y-m-d'):"", //fecha
						        'doc_obsbodega'=>$datos[17], 
						        'doc_obssac'=>$datos[24], 
						        'doc_ftls'=>($doc_ftls)? $doc_ftls->format('Y-m-d'):"",//fecha
						        'doc_obstls1'=>$datos[29], 
						        'doc_obstls2'=>$datos[30], 
						        'doc_month'=>$datos[0], 
						        'doc_city'=>$datos[1], 
						        'doc_ordernumber'=>$datos[4], 
						        'doc_ordertype'=>$datos[5], 
						        'doc_documentdate'=>($doc_documentdate)? $doc_documentdate->format('Y-m-d'):"",//fecha
						        'doc_facturenumber'=>$datos[7], 
						        'doc_guidenumber'=>$datos[8], 
						        'doc_saleorder'=>$datos[10], 
						        'doc_executive'=>$datos[11], 
						        'doc_monto'=>$datos[12], 
						        'doc_montousd'=>$datos[13], 
						        'doc_transport'=>$datos[14], 
						        'doc_depot'=>$datos[15], 
						        'doc_datelogtosac'=>($doc_datelogtosac)? $doc_datelogtosac->format('Y-m-d'):"",//fecha
						        'doc_daylogic'=>$datos[20], 
						        'doc_logicstatus'=>$datos[21], 
						        'doc_datetls'=>$datos[28],//date
						        'doc_daysets'=>$datos[26], 
						        'doc_statussac'=>$datos[27], 
						        'doc_dateradicacion'=>($doc_dateradicacion)? $doc_dateradicacion->format('Y-m-d'):"",//fecha
						        'doc_daytls'=>$datos[32], 
						        'doc_statusfastco'=>$datos[33], 
						        'doc_dateradicacionfact'=>($doc_dateradicacionfact)? $doc_dateradicacionfact->format('Y-m-d'):"",//fecha
						        'doc_datedigi'=>($doc_datedigi)? $doc_datedigi->format('Y-m-d'):"",//fecha
						        'doc_datedigrecepcionfac'=>($doc_datedigrecepcionfac)? $doc_datedigrecepcionfac->format('Y-m-d'):"",//fecha
						        'doc_causal'=>$datos[37],
						        'doc_responsible'=>$datos[38],
						    );
					    	$document =  $this->document->create($rowData);
					    	$document->save();
					    	$documents[] = $document->toArray();
					    }else{
					    	$errors[] = "Fila ".$rows." no insertada, la factura: ".$document->get('doc_serial')." ya está ingresada" ;
					    }
					}else{
						$errors[] = "Fila ".$rows." no insertada";
					}
			    }
			    $data['errors']  =  $errors;
			    fclose($gestor);
				$response['documents'] = $documents;
			}else{
				$errors['errors']  = "Documento inválido";
 			}	

			$response['errors']    = $errors;
			echo json_encode($response); exit();
		}
		
	}



}

/* End of file Document.php */
/* Location: ./application/controllers/Document.php */