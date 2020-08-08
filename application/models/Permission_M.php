<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_M extends MY_Model {
	protected $table='db_permission';
	protected $table_permission_group='db_permission_group';

	public function destroy($permission_id){
		return $this->db->delete($this->table,['permission_id'=>$permission_id]);
	}
	public function update($permission_id,$data){
		$data['updated_at']=dateinsert();
		$this->db->where(['permission_id'=>$permission_id]);
		return $this->db->update($this->table,$data);
	}
	public function updateGroup($permission_group_id,$data){
		$data['updated_at']=dateinsert();
		$this->db->where(['permission_group_id'=>$permission_group_id]);
		return $this->db->update($this->table_permission_group,$data);
	}
	public function findGroup($permission_group_id){
		$this->db->where(['permission_group_id'=>$permission_group_id]);
		return $this->db->get($this->table_permission_group)->row_array();
	}
	public function allGroup(){
		return $this->db->get($this->table_permission_group)->result_array();
	}
	public function destroyGroup($permission_group_id){
		return $this->db->where(['permission_group_id'=>$permission_group_id])
		->delete($this->table_permission_group);
	}
	public function createGroup($data){
		$data['created_at']=dateinsert();
		$data['updated_at']=dateinsert();
		return $this->db->insert($this->table_permission_group,$data);
	}
	public function findNamePermission($permission_id){
		if(!empty($permission_id)){
			$permission = $this->find(['permission_id'=>$permission_id]);
			if(isset($permission['permission_id'])){
				return $permission['permission_name'];
			}
		}
		return 'error';
	}
}

/* End of file Permission_M.php */
/* Location: ./application/models/Permission_M.php */