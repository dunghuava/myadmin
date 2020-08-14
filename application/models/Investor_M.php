<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_M extends MY_Model {
	protected $table = 'db_investor';
	public function getListInvestor()
	{
		$this->db->select('*');
		$this->db->where("investor_active",1);
		$this->db->order_by("investor_highlights", "desc");
		$this->db->order_by("investor_id ", "asc");
		$this->db->limit(12);
		return $this->db->get($this->table)->result_array();
	}
}

/* End of file District_M.php */
/* Location: ./application/models/District_M.php */