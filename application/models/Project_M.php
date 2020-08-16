<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_M extends MY_model {
	protected $table = 'db_project';
	protected $key   = 'project_id';

	public function getListProject($where=array(),$limit)
	{
		$this->db->select('*');
		if (!empty($where)){
			$this->db->where($where);
		}
		$this->db->order_by("project_highlights", "desc");
		$this->db->order_by("project_id", "desc");
		$this->db->limit($limit);
		return $this->db->get($this->table)->result_array();
	}
	public function searchApi($search){
		if (isset($search['arr_category'])){
			$this->db->where_in('project_category',$search['arr_category']);
		}
		if (isset($search['project_title']) && !empty($search['project_title'])){
			$this->db->or_like('project_title',$search['project_title']);
		}
		return $this->db->get($this->table)->result_array();
	}
}

/* End of file Account_M.php */
/* Location: ./application/models/admin/Account_M.php */