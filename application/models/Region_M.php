<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region_M extends MY_model {
	protected $table = 'db_region';

	public function listCategory_Region()
	{
		$this->db->select('region_category');
		$this->db->group_by('region_category');
		return $this->db->get('db_region')->result_array();
	}

	public function deleteRegion($id,$category,$district)
	{
		
		$this->db->where('region_category', $category);
		$this->db->where('region_id_district', $district);
		$this->db->where('region_id !=', $id);
		return $this->db->delete('db_region');
	}
}

/* End of file Account_M.php */
/* Location: ./application/models/admin/Account_M.php */