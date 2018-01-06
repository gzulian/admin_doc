<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		//Do your magic here
	}
	private $_columns = array(
		'use_id'       => null,
		'use_name'     => '',
		'use_status'   => 1,
		'use_email'    => '',
		'use_password' => ''

	);
	protected static $_table = 'rrf_user';
	public static $status = array('INHABILITADO','HABILITADO');

	public function findAll($where = array()) {
		$this->load->database();
		$result = null;
		$res    = $this->db->get_where(self::$_table, $where);
		if ($res->num_rows() > 0) {
			foreach ($res->result() as $value) {
				$result[] = $this->create($value);
			}
		}
		return $result;
	}
	public function getRequired() {
		$requiredFields = array(
			'use_name',
			'use_status',
			'use_email',
			'use_prof_id',
			'use_password',
		);
		return $requiredFields;
	}
	public function isNew() {
		return $this->_columns['use_id'] == 0;
	}
	public function getStatus() {
		return self::$status[$this->_columns['use_status']];
	}
	public function validate() {
		$emptyCollumn = array();
		foreach ($this->_columns as $key => $value) {
			if ((is_null($value) || empty(str_replace(' ', "", $value))) && in_array($key, $this->getRequired())) {
				$emptyCollumn[] = $key;
			}
		}
		return $emptyCollumn;
	}
	public function setColumns($row = null) {
		foreach ($row as $key => $value) {
			$this->_columns[$key] = $value;
		}
	}
	public function set($key, $value) {
		$this->_columns[$key] = $value;
	}
	public function findById($id = null) {
		$id = intval($id);
		$this->load->database();
		$res    = $this->db->get_where(self::$_table, array('use_id' => $id));
		$result = null;
		if ($res->num_rows() == 1) {
			$result = $this->create($res->row_object());
		}
		return $result;
	}
	public function get($attr) {
		return $this->_columns[$attr];
	}

	public function create($row) {
		$user = new User_model();
		$user->setColumns($row);
		return $user;
	}

	public function save() {
		try {
			$this->load->database();
			if ($this->_columns['use_id'] == 0 || is_null($this->_columns['use_id'])) {
				$this->db->insert(self::$_table, $this->_columns);
				$this->_columns['use_id'] = $this->db->insert_id();
			} else {
				$this->db->where('use_id', $this->_columns['use_id']);
				$this->db->update(self::$_table, $this->_columns);
			}
		} catch (Exception $e) {
			echo "se produjo una excepcion del tipo".$e->getMessage();
		}
	}

	public function toArray() {
		return get_object_vars($this);
	}
	function login($email, $clave) {
		$datos = array();
		$user  = null;

		$result = $this->db->get_where(self::$_table, array('use_email' => $email,'use_status'=>1));
		if ($result->num_rows() > 0) {
			$row = $result->row_object();
			if ($row->use_password == sha1($clave)) {
				$user = $this->create($row);
			}
		}
		return $user;
	}	
	public function getPermission() {
		$result   = $this->db->get_where("rrf_permission", array('perm_use_id' => $this->_columns['use_id']));
		$permisos = array();
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $key => $value) {
				$permisos[] = $value->perm_pro_id;
			}
		}
		return $permisos;
	}
	public function exist() {
		$result   = $this->db->get_where("rrf_user", array('use_email' => $this->_columns['use_email']));
		return $result->num_rows() > 0;
	}
	public function validateEmail($email) {
		$result   = $this->db->get_where("rrf_user", array('use_email' => $email));
		$data     = $result->row_object();
		return $data->use_id  == $this->_columns['use_id'];

		

		return $result->num_rows() > 0;
	}
	public function getPermissionArray() {
		//$result   = $this->db->get_where("rrf_permission", array('perm_use_id' => $this->_columns['use_id']));

		$this->db->select('prof_id,prof_name');
		$this->db->from('rrf_profile');
		$this->db->join('rrf_permission', 'prof_id  = perm_pro_id', 'inner');
		$this->db->where('perm_use_id',$this->_columns['use_id']);

		$result  = $this->db->get();
		$permisos = array();
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $key => $value) {
				$permisos[] = $value->prof_name;
			}
		}
		return $permisos;
	}
	public  function setPermissions($profilesArray){
		$this->db->where('perm_use_id', $this->_columns['use_id']);
		$this->db->delete('rrf_permission');
		foreach ($profilesArray as $value) {
			if(is_numeric($value)){
				$profile= array('perm_pro_id'=>$value,'perm_use_id'=>$this->_columns['use_id']);
				
				$this->db->insert('rrf_permission',$profile);	
			}
			
		}
	}
	public function resetPassword(){
		
		$this->_columns['use_password'] = sha1(123456);

	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */