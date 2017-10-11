<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	private  $_columns  =  array(
	'doc_id'=>null, 
    'doc_serial'=>'', 
    'doc_status'=>'', 
    'doc_file'=>'', 
    'doc_datesys'=>'', 
    'doc_customer'=>'', 
    'doc_customerTwo'=>'',
    'doc_pro_id'=>'', 
    'doc_return'=>'', 
    'doc_radicacion'=>'', 
    'doc_fsac'=>'', 
    'doc_fradicacion'=>'', 
    'doc_guidedate'=>'', 
    'doc_facdate'=>'', 
    'doc_obsbodega'=>'', 
    'doc_obssac'=>'', 
    'doc_ftls'=>'', 
    'doc_obstls1'=>'', 
    'doc_obstls2'=>'', 
    'doc_month'=>'', 
    'doc_city'=>'', 
    'doc_ordernumber'=>'', 
    'doc_ordertype'=>'', 
    'doc_documentdate'=>'', 
    'doc_facturenumber'=>'',
    'doc_guidenumber' =>'',
    'doc_saleorder'=>'', 
    'doc_executive'=>'', 
    'doc_monto'=>'', 
    'doc_montousd'=>'', 
    'doc_transport'=>'', 
    'doc_depot'=>'', 
    'doc_datelogtosac'=>'', 
    'doc_daylogic'=>'', 
    'doc_logicstatus'=>'', 
    'doc_datetls'=>'', 
    'doc_daysets'=>'', 
    'doc_statussac'=>'', 
    'doc_dateradicacion'=>'', 
    'doc_daytls'=>'', 
    'doc_statusfastco'=>'', 
    'doc_dateradicacionfact'=>'', 
    'doc_datedigi'=>'', 
    'doc_causal'=>'', 
    'doc_responsible'=>'',
    'doc_datedigrecepcionfac'=>''
	);
	protected static $_table = 'rrf_document';
	
	public function findAll($where = array()){
		$this->load->database();
		$result = null;
		$res = $this->db->get_where(self::$_table,$where);
		if ($res->num_rows() > 0) {
			foreach ($res->result() as $value) {
				$result[] = $this->create($value);
			}
		}
		return $result;
    }
    public function getRequired(){
		$requiredFields = array(
			
		);
		return $requiredFields;
	}
	public function isNew()
	{
		return  $this->_columns['doc_id'] == 0;
	}
    public function validate(){
		$emptyCollumn = array();
		foreach ($this->_columns as $key => $value) {
			if( (is_null($value)  || empty(str_replace(' ', "", $value))) && in_array($key,$this->getRequired())){
				$emptyCollumn[] = $key;
			}
		}
		return $emptyCollumn;
	}
    public function setColumns ($row = null){
		foreach ($row as $key => $value) {
			$this->_columns[$key] = $value;
		}
    }
    public function set($key,$value)
	{
		$this->_columns[$key] = $value;
	}
    public function findById($id = null){
		$id                  = intval($id);
		$this->load->database();
		$res                 = $this->db->get_where(self::$_table,array('doc_id' =>$id));
		$result              = null;
		if ($res->num_rows() == 1) {
			$result              = $this->create($res->row_object());
		}
		return $result;
	}
	 public function findByFolio($folio = null){
		$folio                  = intval($folio);
		$this->load->database();
		$res                 = $this->db->get_where(self::$_table,array('doc_serial' =>$folio));
		$result              = null;
		if ($res->num_rows() == 1) {
			$result              = $this->create($res->row_object());
		}
		
		return $result;
	}
	public function get($attr){
			return $this->_columns[$attr];
	}

	public function create($row){
		$user =  new Document_model();
		$user->setColumns($row);
		return $user;
    }

    public function save(){
		try {
			$this->load->database();
			if(is_null($this->_columns['doc_id']) || $this->_columns['doc_id'] == 0){
				$this->db->insert(self::$_table,$this->_columns);
				$this->_columns['doc_id'] = $this->db->insert_id();
			}else{
				$this->db->where('doc_id',$this->_columns['doc_id']);
				$this->db->update(self::$_table,$this->_columns);
			}
			
		} catch (Exception $e) {
			echo"se produjo una excepcion del tipo".$e->getMessage() ;
		}
	}
	
	public function toArray()
	{
		return get_object_vars($this);
	}



}

/* End of file Document_model.php */
/* Location: ./application/models/Document_model.php */