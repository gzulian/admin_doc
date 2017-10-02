<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	private  $_columns  =  array(
			'prof_id' => null,
			'prof_name' => '',
			'prof_status' => 1,
		);
	protected static $_table = 'rrf_user';
	
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
			'prof_id' ,
			'prof_name',
			'prof_status',
		);
		return $requiredFields;
	}
	public function isNew()
	{
		return  $this->_columns['use_id'] == 0;
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
		$res                 = $this->db->get_where(self::$_table,array('use_id' =>$id));
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
		$user =  new User_model();
		$user->setColumns($row);
		return $user;
    }

    public function save(){
		try {
			$this->load->database();
			if($this->_columns['use_id'] == 0){
				$this->db->insert(self::$_table,$this->_columns);
				$this->_columns['use_id'] = $this->db->insert_id();
			}else{
				$this->db->where('use_id',$this->_columns['use_id']);
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

/* End of file Profile_model.php */
/* Location: ./application/models/Profile_model.php */