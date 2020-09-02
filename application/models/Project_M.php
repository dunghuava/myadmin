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
	public function livesearch($query){
		if (!empty($query)){
			return $this->db->like('project_title',$query,'both')->get($this->table)->result_array();
		}
		return [];
	}
	public function searchApi($search){

		if (!empty($search['arr_category'])){
			$this->db->where_in('project_category',$search['arr_category']);
		}
		if (!empty($search['project_title'])){
			$this->db->like('project_title',$search['project_title'],'both');
		}
		if ($search['project_status']!=''){
			$this->db->where('project_status',$search['project_status']);
		}
		if ($search['project_type']!=''){
			$this->db->where('project_type',$search['project_type']);
		}
		if ($search['number_bedroom']!=''){
			$this->db->where('number_bedroom',$search['number_bedroom']);
		}
		if ($search['project_district_id']!=''){
			$this->db->where('project_district_id',$search['project_district_id']);
		}
		if ($search['project_kind']!=''){
			$this->db->where('project_kind',$search['project_kind']);
		}
		return $this->db->get($this->table)->result_array();
	}
	public function getTienich($id_tienich){
		$sql = "select * from db_extension where extension_id in ($id_tienich) ";
		return $this->db->query($sql)->result_array();
	}
	public function getThueMuaLanCan($project_id,$district_id,$type){
		$this->db->where('project_id !=',$project_id);
		$this->db->where('project_kind !=',$type);
		$this->db->where('project_district_id',$district_id);
		$this->db->order_by("project_highlights", "desc");
		$this->db->order_by("project_id", "desc");
		$this->db->limit(6);
		return $this->db->get($this->table)->result_array();
	}

	public function getDuanLanCan($project_id,$district_id,$type){
		$this->db->where('project_id !=',$project_id);
		$this->db->where('project_kind',$type);
		$this->db->where('project_district_id',$district_id);
		$this->db->order_by("project_highlights", "desc");
		$this->db->order_by("project_id", "desc");
		$this->db->limit(6);
		return $this->db->get($this->table)->result_array();
	}

	public function getThueMuaofDuan($project_id,$type){
		$this->db->where('in_project',$project_id);
		$this->db->where('project_kind !=',$type);
		$this->db->order_by("project_highlights", "desc");
		$this->db->order_by("project_id", "desc");
		$this->db->limit(6);
		return $this->db->get($this->table)->result_array();
	}

	
}

/* End of file Account_M.php */
/* Location: ./application/models/admin/Account_M.php */