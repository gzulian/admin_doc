<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	public function index()
	{

		$data['active'] = "document1";
		$data['user']  = $this->session->userdata('logged_in');
		$this->load->view('master',$data);
		$this->load->view('recive', $data, FALSE);
	
	}
	public function recive()
	{
		
	}
	public function upload()
	{
		//	phpinfo(); exit();
		$data['active'] = "document2";
		$data['user']   = $this->session->userdata('logged_in');
		if(isset($_FILES['file']) && $_FILES['file']['error']  == 0){
			
			//include_once 'excel_reader/excel_reader.php';
			
			$flag = true;
			if (($gestor = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
			    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
			        if($flag) { $flag = false; continue; }
					$doc_fsac                = DateTime::createFromFormat('j-M-Y', $datos[18]);
					$doc_fradicacion         = DateTime::createFromFormat('j-M-Y', $datos[23]);
					$doc_facdate             = DateTime::createFromFormat('j-M-Y', $datos[34]);
					$doc_guidedate           = DateTime::createFromFormat('j-M-Y', $datos[35]);
					$doc_ftls                = DateTime::createFromFormat('j-M-Y', $datos[25]);
					$doc_documentdate        = DateTime::createFromFormat('j-M-Y', $datos[5]);
					$doc_datelogtosac        = DateTime::createFromFormat('j-M-Y', $datos[18]);
					$doc_datetls             = DateTime::createFromFormat('j-M-Y', $datos[28]);
					$doc_dateradicacion      = DateTime::createFromFormat('j-M-Y', $datos[31]);
					$doc_dateradicacionfact  = DateTime::createFromFormat('j-M-Y', $datos[34]);
					$doc_datedigi            = DateTime::createFromFormat('j-M-Y', $datos[35]);
					$doc_datedigrecepcionfac = DateTime::createFromFormat('j-M-Y', $datos[36]);
					
					
			    	$rowData =  array(        
			    			'doc_serial'=>$datos[7], 
					        'doc_status'=>0, 
					        'doc_file'=>$datos[7], 
					        'doc_datesys'=>date('Y-m-d H:i:s'), 
					        //'doc_customer'=>$datos[7], 
					        //'doc_pro_id'=>$datos[7], 
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
					        'doc_nameproviderOne'=>$datos[2],
					        'doc_nameproviderTwo'=>$datos[3]
					    );

			        print_r($rowData); exit();
			       
			        
					
					echo $dateOne->format('Y-m-d');
					exit();
			        /*
			        $numero = count($datos);
			        
			        
			        for ($c=0; $c < $numero; $c++) {
			            echo $datos[$c] . "<br />\n"; exit();
			        }*/
			    }
			    fclose($gestor);
			}	
			/*/
			$this->load->library('PHPExcel');

			$path = $_FILES['file']['tmp_name'];
		    $fileObj = PHPExcel_IOFactory::load( $path );
		    
			    
			$sheet = $fileObj->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); 
			$highestColumn = $sheet->getHighestColumn();

			//  Loop through each row of the worksheet in turn
			for ($row = 1; $row <= $highestRow; $row++){ 
			    //  Read a row of data into an array
			     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			                                    NULL,
			                                    TRUE,
			                                    FALSE);
			    print_r($rowData);
			    //  Insert row data array into your database of choice here
				exit();
			}*/

	}
		$this->load->view('master',$data);
		$this->load->view('upload', $data, FALSE);	
 
		
	}

	public function uploadAjax()
	{
	//	phpinfo(); exit();
		//ini_set( "upload_max_filesize", "500M" );
		//print_r($_FILES['file']); exit();
		
	}

}

/* End of file Document.php */
/* Location: ./application/controllers/Document.php */