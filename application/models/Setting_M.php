<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_M extends MY_Model {
	protected $table = 'db_setting';

	public function settingUp($data){
		return $this->db->where('setting_id','1')->update($this->table,$data);
	}
}

/* End of file Setting_M.php */
/* Location: ./application/models/Setting_M.php */