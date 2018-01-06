<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->user = $this->session->userdata('logged_in')) {
			$this->load->model('Provider_model', 'provider', true);
			$this->load->model('Document_model', 'document', true);
			$this->load->model('Register_model', 'register', true);
			$this->load->model('Holiday_model', 'holiday');
			$this->load->helper(array('caculate', 'makedate'));

		} else {
			redirect('Login/index', 'refresh');
		}
	}

	public function index() {

		$data['active'] = "document1";
		$data['user']   = $this->user;
		$this->load->model('Responsable_model', 'responsable');
		$this->load->model('Motive_model', 'motive');

		$this->load->view('header', $data);

		$data['responsable'] = $this->responsable->findAll();
		$data['motive']      = $this->motive->findAll();

		$this->load->view('documents', $data);
		//$this->load->view('recive', $data);
		$this->load->view('footer', $data, FALSE);
	}
	public function filter() {
		if (isset($_POST['filter'])) {
			$this->load->database();
			$this->db->select('rrf_document.*');
			$this->db->from('rrf_document');
			$execute = false;
			if (isset($_POST['filter']['folio']) && !empty(trim($_POST['filter']['folio']) && is_numeric($_POST['filter']['folio']))) {
				$this->db->where('doc_serial', $_POST['filter']['folio']);
				$execute = true;
			}
			if (isset($_POST['filter']['provider']) && !empty(trim($_POST['filter']['provider']))) {
				$this->db->like('doc_customer', $_POST['filter']['provider']);
				$execute = true;
			}
			//if(isset($_POST['filter']['datetype']) && is_numeric($_POST['filter']['datetype']) && $_POST['filter']['datetype'] >= 0  ){
			if (isset($_POST['filter']['year']) && !empty(trim($_POST['filter']['year']))) {
				if (isset($_POST['filter']['month']) && is_numeric($_POST['filter']['month']) && is_numeric($_POST['filter']['year'])) {

					$year  = $_POST['filter']['year'];
					$month = $_POST['filter']['month'];
					$this->db->where("MONTH(doc_documentdate) ", $month, false);
					$this->db->where("YEAR(doc_documentdate) ", $year, false);
					$execute = true;
				} else {
					//$response['errors'][] = "Período invalido";
					$execute = false;
				}
			}
			if ($execute) {
				$results = $this->db->get();
				//exit();
				$documents = array();
				if ($results->num_rows() > 0) {
					foreach ($results->result() as $key => $value) {
						$document                    = $this->document->create($value);
						$documents[$key]['serial']   = $document->get('doc_serial');
						$documents[$key]['customer'] = $document->get('doc_customer');
						$documents[$key]['date']     = $document->get('doc_documentdate');
					}
				}
				$response['documents'] = $documents;
			} else {
				$response['errors'][] = "Período invalido";
			}
			echo json_encode($response);
		}
	}
	public function recive() {
		//print_r($_REQUEST['document']);
		if (isset($_REQUEST['document']) && isset($_REQUEST['document']['doc_id']) && is_numeric($_REQUEST['document']['doc_id'])) {
			$document = $this->document->findById($_REQUEST['document']['doc_id']);
			$document->setColumns(array_filter($_REQUEST['document']));
			$document->set('doc_status', 1);
			$document->save();

			$registerData = array("reg_doc_id" => $_REQUEST['document']['doc_id'], "reg_use_id" => $this->user['id'], "reg_sta_id" => 2, "reg_date" => date("Y-m-d H:i:s"));
			$register     = $this->register->create($registerData);
			$register->save();
		}
	}
	public function action() {

		if (isset($_REQUEST['action']) && isset($_REQUEST['documents']) && isset($_REQUEST['dataForm'])) {

			switch ($_REQUEST['action']) {
				case 'receiveForm':
					$this->receive($_REQUEST['documents'], $_REQUEST['dataForm']);
					break;
				case 'radicacionForm':
					$this->sendToEstablishment();
					break;
				case 'tlsForm':

					$this->returnDocument();
					// code...
					break;
				case 'digiForm':
					$this->digiDocument();

					/*

				 */
					break;

				default:
					echo "mal";
					break;
			}
		}
	}
	public function receive($documents = null, $dataForm = null) {
		//print_r($_REQUEST['document']);

		$response = array();
		$errors   = array();
		$success  = array();
		$ok       = array();
		if (!is_null($documents) && !is_null($dataForm)) {
			$date = $dataForm['date'];

			if (is_array($documents)) {
				foreach ($documents as $id) {
					$document = $this->document->findById($id);
					if (!is_null($document)) {

						if ($document->get('doc_status') == 0) {
							#agregar fecha de FECHA ESTIMADA FACTURA DE TLS para radicación
							$document->set('doc_status', 1);
							$document->set('doc_datelogtosac', dinamicMakeDate($date)->format('Y-m-d'));
							$document->save();

							$success[]    = "Documento ".$document->get('doc_salenumber')." ingresado exitosamente ";
							$ok[]         = $document->get('doc_id');
							$registerData = array("reg_doc_id" => $document->get('doc_id'), "reg_use_id" => $this->user['id'], "reg_sta_id" => 1, "reg_date" => date("Y-m-d H:i:s"));
							$register     = $this->register->create($registerData);
							$register->save();
						} else {
							$errors[] = 'Este documento: '.$document->get('doc_salenumber').' ya se ha recepcionado el: '.$document->get('doc_datelogtosac');
						}
					} else {
						$errors[] = 'El documento:'.$id.' no existe ';
					}
				}
			} else {
				$errors[] = 'Debes seleccionar a lo menos un documento';
			}
		} else {
			$errors[] = 'Debes seleccionar a lo menos un documento';
		}

		$response['errors']  = $errors;
		$response['success'] = $success;
		$response['ok']      = $ok;
		echo json_encode($response);
	}
	// pendiente
	function sendToEstablishment() {
		$response = array();
		$errors   = array();
		$success  = array();
		$ok       = array();
		if (isset($_REQUEST['documents']) && isset($_REQUEST['dataForm'])) {
			$documents  = $_REQUEST['documents'];
			$radicacion = $_REQUEST['dataForm'];
			$holyDaysDB = $this->holiday->findAll(array(), true);
			if (is_array($documents)) {
				foreach ($documents as $id) {
					$document = $this->document->findById($id);
					if (!is_null($document)) {
						if ($document->get('doc_status') == 1) {
							#agregar fecha de FECHA ESTIMADA FACTURA DE TLS para redicación
							$document->set('doc_radicacion', $radicacion['send']);
							$document->set('doc_obssac', $radicacion['obsSac']);
							if ($radicacion['send'] == 'NO') {
								$document->set('doc_dateradicacion', dinamicMakeDate($document->get('doc_documentdate'))->format('Y-m-d'));
								$document->set('doc_status', 3);
								$success[] = "Documento ".$document->get('doc_salenumber')." a espera de digitalización ";

							} else {
								$document->set('doc_status', 2);
								$document->set('doc_fradicacion', dinamicMakeDate($radicacion['date'])->format('Y-m-d'));

								#aplicar formula

								$to = stimateReturn(dinamicMakeDate($radicacion['date']), $document->get('doc_city'), $holyDaysDB);
								$document->set('doc_dateradicacion', $to->format('Y-m-d'));
								/* fin formula*/
								$document->set('doc_carrier', $radicacion['doc_transport']);
								$success[] = "Documento ".$document->get('doc_salenumber')." en proceso de radicación ";
							}
							$document->save();
							$ok[]         = $document->get('doc_id');
							$registerData = array("reg_doc_id" => $document->get('doc_id'), "reg_use_id" => $this->user['id'], "reg_sta_id" => 2, "reg_date" => date("Y-m-d H:i:s"));
							$register     = $this->register->create($registerData);
							$register->save();
						} else {
							$errors[] = 'Este documento: '.$document->get('doc_salenumber').' ya se encuentra en proceso de radicación desde el: '.$document->get('doc_fradicacion');
						}
					} else {
						$errors[] = 'El documento:'.$id.' no existe ';
					}
				}
			} else {
				$errors[] = 'Debes seleccionar a lo menos un documento';
			}
		} else {
			$errors[] = 'Debes seleccionar a lo menos un documento';
		}

		$response['errors']  = $errors;
		$response['success'] = $success;
		$response['ok']      = $ok;
		echo json_encode($response);
	}

	function returnDocument() {
		$response = array();
		$errors   = array();
		$success  = array();
		$ok       = array();
		if (isset($_REQUEST['documents']) && isset($_REQUEST['dataForm'])) {
			$documents = $_REQUEST['documents'];
			$return    = $_REQUEST['dataForm'];

			if (is_array($documents)) {
				foreach ($documents as $id) {
					$document = $this->document->findById($id);
					if (!is_null($document)) {
						if ($document->get('doc_status') == 2) {
							$dateTls      = dinamicMakeDate($return['ftls']);
							$dataEstimate = dinamicMakeDate($document->get('doc_dateradicacion'));

							$registerData = array("reg_doc_id" => $document->get('doc_id'), "reg_use_id" => $this->user['id'], "reg_sta_id" => 3, "reg_date" => date("Y-m-d H:i:s"));

							if ($dateTls <= $dataEstimate) {
								$document->set('doc_status', 3);
							} else {
								$registerData['reg_sta_id'] = 5;
								$document->set('doc_status', 5);
							}
							$register = $this->register->create($registerData);

							$document->set('doc_ftls', $dateTls->format('Y-m-d'));
							$document->set('doc_obstls1', $return['obstls1']);
							$document->set('doc_obstls2', $return['obstls2']);
							$document->save();
							$register->save();
							$success[] = "Documento: ".$document->get('doc_salenumber')." actualizado exitosamente ";
							$ok[]      = $document->get('doc_id');

						} else {
							$errors[] = 'El documento: '.$document->get('doc_salenumber').' ya ha retornado el :'.$document->get('doc_ftls');
						}
					} else {
						$errors[] = 'El documento:'.$id.' no existe ';
					}
				}
			} else {
				$errors[] = 'Debes seleccionar a lo menos un documento';
			}
		} else {
			$errors[] = 'Debes seleccionar a lo menos un documento';
		}

		$response['errors']  = $errors;
		$response['success'] = $success;
		$response['ok']      = $ok;
		echo json_encode($response);
	}

	# registro de digitalización datedigrecepcionfac dateradicacionfact
	public function digiDocument() {
		$response = array();
		$errors   = array();
		$success  = array();
		$ok       = array();
		if (isset($_REQUEST['documents']) && isset($_REQUEST['dataForm'])) {
			$documents = $_REQUEST['documents'];
			$dataForm  = $_REQUEST['dataForm'];

			if (is_array($documents)) {
				foreach ($documents as $id) {
					$document = $this->document->findById($id);
					if (!is_null($document)) {

						if ($document->get('doc_status') == 3 || $document->get('doc_status') == 5) {
							#agregar fecha de FECHA ESTIMADA FACTURA DE TLS para redicación
							$document->set('doc_datedigrecepcionfac', dinamicMakeDate($dataForm['datedigrecepcionfac'])->format('Y-m-d'));
							$document->set('doc_dateradicacionfact', dinamicMakeDate($dataForm['dateradicacionfact'])->format('Y-m-d'));
							$document->set('doc_status', 4);
							$success[] = "Documento: ".$document->get('doc_salenumber')." actualizado exitosamente  ";
							$document->save();
							$ok[]         = $document->get('doc_id');
							$registerData = array("reg_doc_id" => $document->get('doc_id'), "reg_use_id" => $this->user['id'], "reg_sta_id" => 4, "reg_date" => date("Y-m-d H:i:s"));
							$register     = $this->register->create($registerData);
							$register->save();
						} else {
							$errors[] = 'Este documento: '.$document->get('doc_salenumber').' ya se encuentra digitalizado el: '.$document->get('doc_datedigrecepcionfac');
						}
					} else {
						$errors[] = 'El documento:'.$id.' no existe ';
					}
				}
			} else {
				$errors[] = 'Debes seleccionar a lo menos un documento';
			}
		} else {
			$errors[] = 'Debes seleccionar a lo menos un documento';
		}

		$response['errors']  = $errors;
		$response['success'] = $success;
		$response['ok']      = $ok;
		echo json_encode($response);
	}

	public function getByStatus() {
		if (isset($_REQUEST['status']) && is_numeric($_REQUEST['status'])) {
			$status = $_REQUEST['status'];
			if ($status == 3) {
				//para retornados y retornados vencidos
				$estados = array(3, 5);

			} else {
				$estados[] = $status;

			}
			$documents = $this->document->findAllIn($estados, true);
			echo json_encode($documents);
		}

	}
	public function find() {
		$response = array();
		$document = $this->document->findById($_REQUEST['serial']);
		//var_dump($_REQUEST['serial']);
		if (isset($_REQUEST['serial']) && is_numeric($_REQUEST['serial']) && !is_null($document)) {
			$response['document']    = $document->toArray();
			$response['trazability'] = $document->getRegistersArray();
			$response['catch']       = $document->getCatchArray();
		} else {
			$response['error'] = "Valor inválido";
		}
		echo json_encode($response);
	}
	public function findBySerial() {
		$response = array();
		$document = $this->document->findByFolio($_REQUEST['serial']);
		if (isset($_REQUEST['serial']) && is_numeric(intval($_REQUEST['serial'])) && !is_null($document)) {
			$response['document']    = $document->toArray();
			$response['trazability'] = $document->getRegistersArray();
			$response['catch']       = $document->getCatchArray();
		} else {
			$response['error'] = "Valor inválido";
		}
		echo json_encode($response);
	}

	public function upload() {
		$data['active'] = "document2";
		$data['user']   = $this->user;

		$this->load->view('header', $data);
		$this->load->view('upload', $data, FALSE);
		$this->load->view('footer', $data, FALSE);
	}
	public function historicDocuments() {

		$this->db->select("rrf_document.*", false);
		$this->db->from("rrf_document");
		$filter;

		if (isset($_REQUEST['filter']) && count($filter = array_filter($_REQUEST['filter'])) > 0) {

			if (isset($filter['customer'])) {
				$this->db->like("doc_customer", $filter['customer']);
			}
			if (isset($filter['from']) && !empty(trim($filter['from'])) && isset($filter['to']) && !empty(trim($filter['to']))) {
				$from = dinamicMakeDate($filter['from']);
				$to   = dinamicMakeDate($filter['to']);
				if (!is_null($from) && !is_null($to) && $from <= $to) {
					$this->db->where("doc_facdate>=", $from->format('Y-m-d'));
					$this->db->where("doc_facdate<=", $to->format('Y-m-d'));
				}
			}
		} else {
			$month = date('m');
			$this->db->where('MONTH(doc_datedigrecepcionfac)', $month, false);
		}

		$this->db->where('doc_status', 4);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			$data['documents'] = $result->result_array();
			echo json_encode($data);
		}

	}
	public function uploadAjax() {

		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
			$flag   = true;
			$rows   = 0;
			$errors = array();

			//number_of_working_days($from,);
			//'application/vnd.ms-excel',

			$mimes = array('text/plain', 'text/csv', 'text/tsv');

			if (in_array($_FILES['file']['type'], $mimes) && ($gestor = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
				$documents = array();
				$holyDaysDB = $this->holiday->findAll(array(), true);
				
				while (($datos = fgetcsv($gestor, 100, ";")) !== FALSE) {

					if ($flag) {$flag = false;continue;}
					$rows++;
					if (count($datos) == 39 && is_numeric($datos[7])) {
						$document = $this->document->findByFolio($datos[7]);
						if (is_null($document)) {
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
							$provider                = $this->provider->findByName($datos[2]);
							if (is_null($provider)) {
								$providerData = array('pro_name' => $datos[2], 'pro_nameTwo' => $datos[3], 'pro_datesys' => date('Y-m-d H:i:s'));
								$provider     = $this->provider->create($providerData);
								$provider->save();
							}
							$rowData = array(
								'doc_serial' => $datos[7],
								'doc_status' => 0,
								//'doc_file'=>$datos[7],
								'doc_datesys'             => date('Y-m-d H:i:s'),
								'doc_customer'            => $datos[2],
								'doc_customerTwo'         => $datos[3],
								'doc_pro_id'              => $provider->get('pro_id'),
								'doc_return'              => $datos[16],
								'doc_radicacion'          => $datos[22],
								'doc_fsac'                => ($doc_fsac)?$doc_fsac->format('Y-m-d'):"", //FECHA
								'doc_fradicacion'         => ($doc_fradicacion)?$doc_fradicacion->format('Y-m-d'):"", //fecha
								'doc_guidedate'           => ($doc_guidedate)?$doc_guidedate->format('Y-m-d'):"", //fecha
								'doc_facdate'             => ($doc_facdate)?$doc_facdate->format('Y-m-d'):"", //fecha
								'doc_obsbodega'           => $datos[17],
								'doc_obssac'              => $datos[24],
								'doc_ftls'                => ($doc_ftls)?$doc_ftls->format('Y-m-d'):"", //fecha
								'doc_obstls1'             => $datos[29],
								'doc_obstls2'             => $datos[30],
								'doc_month'               => $datos[0],
								'doc_city'                => $datos[1],
								'doc_ordernumber'         => $datos[4],
								'doc_ordertype'           => $datos[5],
								'doc_documentdate'        => ($doc_documentdate)?$doc_documentdate->format('Y-m-d'):"", //fecha
								'doc_salenumber'          => $datos[7],
								'doc_guidenumber'         => $datos[8],
								'doc_saleorder'           => $datos[10],
								'doc_executive'           => $datos[11],
								'doc_monto'               => $datos[12],
								'doc_montousd'            => $datos[13],
								'doc_transport'           => $datos[14],
								'doc_depot'               => $datos[15],
								'doc_datelogtosac'        => ($doc_datelogtosac)?$doc_datelogtosac->format('Y-m-d'):"", //fecha
								'doc_daylogic'            => $datos[20],
								'doc_logicstatus'         => $datos[21],
								'doc_datetls'             => $datos[28], //date
								'doc_daysets'             => $datos[26],
								'doc_statussac'           => $datos[27],
								'doc_dateradicacion'      => ($doc_dateradicacion)?$doc_dateradicacion->format('Y-m-d'):"", //fecha
								'doc_daytls'              => $datos[32],
								'doc_statusfastco'        => $datos[33],
								'doc_dateradicacionfact'  => ($doc_dateradicacionfact)?$doc_dateradicacionfact->format('Y-m-d'):"", //fecha
								'doc_datedigi'            => ($doc_datedigi)?$doc_datedigi->format('Y-m-d'):"", //fecha
								'doc_datedigrecepcionfac' => ($doc_datedigrecepcionfac)?$doc_datedigrecepcionfac->format('Y-m-d'):"", //fecha
								'doc_causal'              => $datos[37],
								'doc_responsible'         => $datos[38],
							);
							$document = $this->document->create($rowData);
							$document->save();
							$documents[] = $document->toArray();
						} else {
							$errors[] = "Fila ".$rows." no insertada, la factura: ".$document->get('doc_serial')." ya está ingresada";
						}
					} else {
						$errors[] = "Fila ".$rows." no insertada";
					}
				}
				$data['errors'] = $errors;
				fclose($gestor);
				$response['documents'] = $documents;
			} else {
				$errors['errors'] = "Documento inválido";
			}

			$response['errors'] = $errors;
			echo json_encode($response);
			exit();
		}

	}
	public function uploadAjax2() {

		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

			$flag   = true;
			$rows   = 0;
			$errors = array();

			//number_of_working_days($from,);
			//'application/vnd.ms-excel',

			$mimes = array('text/plain', 'text/csv', 'text/tsv');

			if (in_array($_FILES['file']['type'], $mimes) && ($gestor = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
				$documents = array();
				$holyDaysDB               = $this->holiday->findAll(array(), true);
				while (($datos = fgetcsv($gestor, 4000, ";")) !== FALSE) {

					if ($flag) {$flag = false;continue;}
					$rows++;
					if (count($datos) == 14 && is_numeric($datos[6])) {
						$document = $this->document->findByFolio($datos[6]); // busqueda por numero legal
						if (is_null($document) ) {
							$doc_facdate              = dinamicMakeDate($datos[5]);
							$doc_datelogtosacstimated = stimateDateLogicToSac($doc_facdate, $datos[0], $holyDaysDB);
							$provider                 = $this->provider->findByName($datos[1]);
							if (is_null($provider)) {
								$providerData = array('pro_name' => $datos[1], 'pro_nameTwo' => $datos[2], 'pro_datesys' => date('Y-m-d H:i:s'));
								$provider     = $this->provider->create($providerData);
								$provider->save();
							}
							if(in_array($datos[1], Document_model::$orderType)){
								$rowData = array(
									//datos base
									'doc_status' => 0,
									'doc_datesys'             => date('Y-m-d H:i:s'),
									'doc_pro_id'              => $provider->get('pro_id'),
									'doc_city'                => $datos[0],
									'doc_customer'            => $datos[1],
									'doc_customerTwo'         => $datos[2],
									'doc_ordernumber'         => $datos[3],
									'doc_ordertype'           => $datos[4],
									'doc_facdate'             => ($doc_facdate)?$doc_facdate->format('Y-m-d'):"", //fecha
									'doc_salenumber' 		  => $datos[6],
									'doc_guidenumber'         => $datos[7],
									'doc_causal'         	  => $datos[8], //número de línea
									'doc_saleorder'           => $datos[9],
									'doc_responsible'         => $datos[10],//transaccion
									'doc_monto'               => $datos[11],
									'doc_montousd'            => $datos[12],
									'doc_transport'           => $datos[13],
									'doc_depot'               => $datos[14],
									'doc_month'               => $datos[15],
									'doc_datelogtosacstimated' => $doc_datelogtosacstimated->format('Y-m-d')
								);
								$document = $this->document->create($rowData);
								$document->save();
								$documents[] = $document->toArray();

								$registerData = array("reg_doc_id" => $document->get('doc_id'), "reg_use_id" => $this->user['id'], "reg_sta_id" => 0, "reg_date" => date("Y-m-d H:i:s"));
								$register     = $this->register->create($registerData);
								$register->save();
							}else{
								$errors[] = "Fila ".$rows." no insertada, la ciudad : ".$document->get('doc_city')." no existe";
							}

						} else {
							$errors[] = "Fila ".$rows." no insertada, la factura: ".$document->get('doc_serial')." ya está ingresada";
						}
					} else {
						$errors[] = "Fila ".$rows." no insertada";
					}
				}
				$data['errors'] = $errors;
				fclose($gestor);
				$response['documents'] = $documents;
			} else {
				$errors['errors'] = "Documento inválido";
			}

			$response['errors'] = $errors;
			echo json_encode($response);
			exit();
		}

	}

}

/* End of file Document.php */
/* Location: ./application/controllers/Document.php */