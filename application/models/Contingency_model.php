<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contingency_model extends CI_Model {
	#cat_id, cat_mot_id, cat_res_id, cat_sta_id, cat_date, cat_obs, cat_use_id
	public function __construct() {
		parent::__construct();
		//Do your magic here
	}

	private $_columns = array(
		'con_id' => null, 'con_mot_id' => null, 'con_res_id' => null, 'con_sta_id' => null, 'con_date' => null, 'con_obs' => '', 'con_use_id' => null
	);
	protected static $_table = 'rrf_contingency';

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

	public function isNew() {
		return $this->_columns['con_id'] == 0;
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
		$res    = $this->db->get_where(self::$_table, array('con_id' => $id));
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
		$user = new Contingency_model();
		$user->setColumns($row);
		return $user;
	}

	public function save() {
		try {
			$this->load->database();
			if ($this->_columns['con_id'] == 0 || is_null($this->_columns['con_id'])) {
				$this->db->insert(self::$_table, $this->_columns);
				$this->_columns['con_id'] = $this->db->insert_id();
			} else {
				$this->db->where('con_id', $this->_columns['con_id']);
				$this->db->update(self::$_table, $this->_columns);
			}
		} catch (Exception $e) {
			echo "se produjo una excepcion del tipo".$e->getMessage();
		}
	}

	public function toArray() {
		return get_object_vars($this);
	}

}

/* End of file Contingency_model.php */
/* Location: ./application/models/Contingency_model.php */