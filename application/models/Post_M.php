<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_M extends MY_model {
	protected $table = 'db_post';
	protected $key   = 'post_id';

	public function getListPost_byCategory($category)
	{
		$this->db->select('*');
		$this->db->where("post_active",1);
		$this->db->where("post_category_id",$category);
		// if ($post_id != '')$this->db->where("post_id !=",$post_id);
		$this->db->where("post_date_time <=",date("YmdH"));
		$this->db->order_by("post_highlights", "desc");
		$this->db->order_by("post_date_time", "desc");
		$this->db->limit(4);
		return $this->db->get($this->table)->result_array();
	}

}

/* End of file Account_M.php */
/* Location: ./application/models/admin/Account_M.php */