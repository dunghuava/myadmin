<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table = '';
	protected $key = '';

	
	public function __construct()
	{
		parent::__construct();
	}
	

	public function all($where=array(),$sort=''){
		if (!empty($where)){
			$this->db->where($where);
		}
		if (!empty($sort)){
			$this->db->order_by($this->primarykey,$sort);
		}
		return $this->db->get($this->table)->result_array();
	}
	public function find($where){
		$this->db->where($where);
		$count = $this->db->get($this->table)->num_rows();
		if ($count>1){
			$this->db->where($where);
			return $this->db->get($this->table)->result_array();
		}
		$this->db->where($where);
		return $this->db->get($this->table)->row_array();
	}

	public function find_row($where){
		$this->db->where($where);
		return $this->db->get($this->table)->row_array();
	}

	public function count($where){
		$this->db->where($where);
		$count = $this->db->get($this->table)->num_rows();
		return $count;
	}
	public function delete($where){
		return $this->db->where($where)->delete($this->table);
	}
	public function update($where,$data){
		return $this->db->where($where)->update($this->table,$data);
	}
	public function create($where){
		$where['created_at']=dateinsert();
		$where['updated_at']=dateinsert();
		$this->db->insert($this->table,$where);
		return $this->db->insert_id();
	}
	public function last_id(){
		return $this->db->query("SELECT LAST_INSERT_ID() AS ID")->row_array()['ID'];
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */