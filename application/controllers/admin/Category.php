<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('Module_M');
	}
	public function index()
	{
		$data['page_name']='Danh mục';
		$data['page_menu']='category';
		$this->getHeader($data);
		$this->load->view('admin/pages/category/category');
		$this->getFooter();
	}
	public function add()
	{
		$post = $this->input->post();
		if ($post){
			xlog($post,true);
		}
		$data['page_name']='Thêm danh mục';
		$data['page_menu']='category';
		//$data['arr_module']=$this->Module_M->all();
		$this->getHeader($data);
		$this->load->view('admin/pages/category/category_add');
		$this->getFooter();
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/admin/Category.php */