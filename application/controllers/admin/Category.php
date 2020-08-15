<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Module_M');
		$this->load->model('Category_M');
	}
	public function index()
	{
		$data['page_name']='Danh mục';
		$data['page_menu']='category';
		$data['arr_category']=$this->Category_M->all(['cate_parent_id'=>0],'desc');
		echo $this->db->last_query();
		die;
		$this->getHeader($data);
		$this->load->view('admin/pages/category/category');
		$this->getFooter();
	}
	public function edit($cate_id)
	{
		$category = $this->Category_M->all(['cate_id'=>$cate_id])[0];

		$post = $this->input->post();
		if ($post){
			if (!empty($_FILES['cate_img']['name'])){
				$file = $_FILES['cate_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				if (move_uploaded_file($file['tmp_name'],$path)){
					$post['cate_img']=$filename;
					@unlink('./upload/images/'.$category['cate_img']);
				}
			}
			$check = $this->Category_M->check_alias($post['cate_alias'],$cate_id);
			if (count($check)>0){
				$post['cate_alias']=$post['cate_alias'].'-'.rand(100,999);
			}
			$this->Category_M->update(['cate_id'=>$cate_id],$post);
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu danh mục'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/category/edit/'.$cate_id),'location');
		}
		$data['page_name'] ='Sửa danh mục';
		$data['page_menu'] ='category';
		$data['arr_module']=$this->Module_M->all();
		$data['arr_category']=$this->get_option_category();
		$data['category']=$category;
		$this->getHeader($data);
		$this->load->view('admin/pages/category/category_add');
		$this->getFooter();
	}
	public function add()
	{
		$post = $this->input->post();

		if ($post){
			if (isset($_FILES['cate_img']['name'])){
				$file = $_FILES['cate_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				if (move_uploaded_file($file['tmp_name'],$path)){
					$post['cate_img']=$filename;
				}
			}
			$check = $this->Category_M->all(['cate_alias'=>$post['cate_alias']]);
			if (count($check)>0){
				$post['cate_alias']=$post['cate_alias'].'-'.rand(100,999);
			}

			$max_stt = $this->Category_M->getMaxCateStt($post['cate_parent_id']);
			$post['cate_stt'] = $max_stt['cate_stt']+1;
			$this->Category_M->create($post);
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu danh mục'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/category/add'),'location');
		}
		$data['page_name'] ='Thêm danh mục';
		$data['page_menu'] ='category';
		$data['arr_module']=$this->Module_M->all();
		$data['arr_category']=$this->get_option_category(0);
		$this->getHeader($data);
		$this->load->view('admin/pages/category/category_add');
		$this->getFooter();
	}
	public function update(){
		$post = $this->input->post();
		$this->Category_M->update(['cate_id'=>$post['cate_id']],$post);
	}
	public function delimg(){
		$post = $this->input->post();
		unlink('./upload/images/'.$post['cate_img']);
		$this->Category_M->update(['cate_id'=>$post['cate_id']],['cate_img'=>'']);
	}
	public function get_option_category($cate_module_id=0){
		$where['cate_parent_id']=0;
		if ($cate_module_id!=0){
			$where['cate_module_id']=$cate_module_id;
		}
		$oder_by['cate_stt']= 'asc';
		$all = $this->Category_M->all($where,$oder_by);
		$str='';
		foreach ($all as $val){
			$str.='<option value="'.$val['cate_id'].'">'.$val['cate_title'].'</option>';
			$sub1 = $this->Category_M->all(['cate_parent_id'=>$val['cate_id']],$oder_by);
			if (count($sub1) >0){
				foreach ($sub1 as $val1){
					$str.='<option value="'.$val1['cate_id'].'">|__'.$val1['cate_title'].'</option>';
					$sub2 = $this->Category_M->all(['cate_parent_id'=>$val1['cate_id']],$oder_by);
					if (count($sub2) >0){
						foreach ($sub2 as $val2){
							$str.='<option value="'.$val2['cate_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$val2['cate_title'].'</option>';
							$sub3 = $this->Category_M->all(['cate_parent_id'=>$val2['cate_id']],$oder_by);
							if (count($sub3) >0){
								foreach ($sub3 as $val3){
									$str.='<option value="'.$val3['cate_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$val3['cate_title'].'</option>';
									$sub4 = $this->Category_M->all(['cate_parent_id'=>$val3['cate_id']],$oder_by);
									if (count($sub4) >0){
										foreach ($sub4 as $val4){
											$str.='<option value="'.$val4['cate_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$val4['cate_title'].'</option>';
										}
									}
								}
							}
						}
					}
				}
			}
		}
		return $str;
	}
}

/* End of file Category.php */
/* Location: ./application/controllers/admin/Category.php */