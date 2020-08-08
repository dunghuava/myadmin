<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_M extends MY_Model {
    protected $table = 'db_web';
    
    public function insert_on_duplicate($ip_address){
        $created_at = dateinsert();
        $updated_at = dateinsert();
        $sql = "INSERT INTO $this->table (ip_address,created_at,updated_at) 
                VALUES ('$ip_address','$created_at','$updated_at')
                ON DUPLICATE KEY UPDATE created_at='$created_at', updated_at='$updated_at' ";
        $this->db->query($sql);
    }
}

/* End of file Web_M.php */
/* Location: ./application/models/Web_M.php */