<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		//Do your magic here
	}

	private $_columns = array(
		'hol_date' => null,
	);
	protected static $_table = 'rrf_holiday';

	public function findAll($where = array(), $arrayData = false) {
		$this->load->database();
		$result = null;
		$res    = $this->db->get_where(self::$_table, $where);
		if ($res->num_rows() > 0) {
			if ($arrayData) {
				foreach ($res->result() as $value) {
					$result[] = $value->hol_date;
				}
			} else {
				foreach ($res->result() as $value) {
					$result[] = $this->create($value);
				}
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
		$res    = $this->db->get_where(self::$_table, array('hol_date' => $id));
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
			if ($this->_columns['hol_date'] == 0 || is_null($this->_columns['hol_date'])) {
				$this->db->insert(self::$_table, $this->_columns);
				$this->_columns['hol_date'] = $this->db->insert_id();
			} else {
				$this->db->where('hol_date', $this->_columns['hol_date']);
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

/* End of file Holiday_model.php */
/* Location: ./application/models/Holiday_model.php */