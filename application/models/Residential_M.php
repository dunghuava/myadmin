<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residential_M extends MY_Model {
	protected $table = 'db_residential';
	public function getListResidential()
	{
		$this->db->select('*');
		$this->db->where("residential_active",1);
		$this->db->order_by("residential_highlights", "desc");
		$this->db->order_by("residential_id ", "asc");
		$this->db->limit(6);
		return $this->db->get($this->table)->result_array();
	}
}

/* End of file District_M.php */
/* Location: ./application/models/District_M.php */