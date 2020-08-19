<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_M extends MY_model {
	protected $table = 'db_user';
	// protected $table_permission_group = 'db_permission_group';
	public function CheckLogin($user_name,$user_password,$is_admin){
		$this->db->where(['user_name'=>$user_name,'user_password'=>$user_password,'is_admin'=>$is_admin]);
		$row = $this->db->get($this->table)->num_rows();
		if ($row==1){
			return true;
		}
		return false;
	}
	// public function all($find=array(),$order=array()){
	// 	$this->db->select("*")->from($this->table);
	// 	return $this->db->get()->result_array();
	// }
	public function destroy($user_id){
		return $this->db->delete($this->table,['user_id'=>$user_id]);
	}
	public function update($user_id,$data){
		$data['updated_at']=dateinsert();
		$this->db->where(['user_id'=>$user_id]);
		return $this->db->update($this->table,$data);
	}

	public function Check_Username($user_name,$user_id)
	{
		$this->db->select('*');
		if ($user_id!='')$this->db->where('user_id !=',$user_id);
		$this->db->where('user_name',$user_name);
		return $this->db->get($this->table)->result_array();
	}
}

/* End of file Account_M.php */
/* Location: ./application/models/admin/Account_M.php */