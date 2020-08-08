<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_M extends MY_Model {
    protected $table = 'db_category';
    
    public function check_alias($cate_alias,$cate_id){
        $this->db->where('cate_alias',$cate_alias);
        $this->db->where('cate_id !=',$cate_id);
        return $this->db->get($this->table)->result_array();
    }
}

/* End of file Category_M.php */
/* Location: ./application/models/Category_M.php */