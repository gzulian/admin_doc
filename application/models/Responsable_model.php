<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsable_model extends CI_Model {

	private $_columns = array(
		'res_id'   => null,
		'res_name' => '',
	);
	protected static $_table = 'rrf_responsable';

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
			'red_id',
			'res_name',
		);
		return $requiredFields;
	}
	public function isNew() {
		return $this->_columns['res_id'] == 0;
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
		$res    = $this->db->get_where(self::$_table, array('res_id' => $id));
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
		$user = new Responsable_model();
		$user->setColumns($row);
		return $user;
	}

	public function save() {
		try {
			$this->load->database();
			if ($this->_columns['res_id'] == 0) {
				$this->db->insert(self::$_table, $this->_columns);
				$this->_columns['res_id'] = $this->db->insert_id();
			} else {
				$this->db->where('res_id', $this->_columns['res_id']);
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

/* End of file Responsable_mode.php */
/* Location: ./application/models/Responsable_mode.php */