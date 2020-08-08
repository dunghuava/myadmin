<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_M extends MY_model {
	protected $table = 'db_user';
	protected $table_permission_group = 'db_permission_group';
	public function do_login($user_name,$user_password){
		$this->db->where(['user_name'=>$user_name,'user_password'=>$user_password]);
		$row = $this->db->get($this->table)->num_rows();
		if ($row==1){
			return true;
		}
		return false;
	}
	public function all($find=array(),$order=array()){
		$this->db->select($this->table.".*,".$this->table_permission_group.".permission_group_name")->from($this->table);
		$this->db->join(
				$this->table_permission_group,
				$this->table_permission_group.".permission_group_id=".$this->table.".user_permission_group_id",
				"left");
		return $this->db->get()->result_array();
	}
	public function destroy($user_id){
		return $this->db->delete($this->table,['user_id'=>$user_id]);
	}
	public function update($user_id,$data){
		$data['updated_at']=dateinsert();
		$this->db->where(['user_id'=>$user_id]);
		return $this->db->update($this->table,$data);
	}
}

/* End of file Account_M.php */
/* Location: ./application/models/admin/Account_M.php */