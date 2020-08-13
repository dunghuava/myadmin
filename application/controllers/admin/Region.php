<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Region_M');
		$this->load->model('Category_M');
		$this->load->model('District_M');
		
	}

	public function index()
	{
		$data['page_name']='Danh sách khu vực';
		$data['page_menu']='extend';

		$data['category_region']=$this->Region_M->listCategory_Region();

		$data['list_slide']=$this->Region_M->all();
		$this->getHeader($data);
		$this->load->view('admin/pages/region/index.php',$data);
		$this->getFooter();
	}


	public function add()
	{
		$data['page_name']='Thêm khu vực';
		$data['page_menu']='extend';

		$post = $this->input->post();
		if ($this->input->post()) {
			if (!empty($_FILES['region_img']['name'])){
				$file = $_FILES['region_img'];
				$name = md5($file['name'].time());
				$path='upload/images/'.$name;
				move_uploaded_file($file['tmp_name'],$path);
			}

			$data_insert = array(
				'region_category' => $post['region_category'], 
				'region_id_district' => $post['region_id_district'], 
				'region_active' => $post['region_active'], 
				'region_highlights' => 0, 
				'region_img' => $name, 
				
				
			);

			$this->Region_M->delete(['region_category' => $post['region_category'],'region_id_district' => $post['region_id_district']]);

			$this->Region_M->create($data_insert);
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/region/add/'),'location');

		}

		$list_category = $this->Category_M->all(['cate_module_id' => '2','cate_parent_id' => '0']);
		$list_district = $this->District_M->all(['province_id' => '1']);
		$data['list_category'] = $list_category;
		$data['list_district'] = $list_district;
		$this->getHeader($data);
		$this->load->view('admin/pages/region/add.php',$data);
		$this->getFooter();
	}


	public function edit($id)
	{
		$data['page_name']='Chỉnh sửa khu vực';
		$data['page_menu']='extend';
		$info_region = $this->Region_M->find_row(['region_id' => $id]);
		$post = $this->input->post();
		if ($this->input->post()) {
			if (!empty($_FILES['region_img']['name'])){
				$file = $_FILES['region_img'];
				$name = md5($file['name'].time());
				$path='upload/images/'.$name;
				move_uploaded_file($file['tmp_name'],$path);
				@unlink('upload/images/'.$info_region['region_img']);
			}else{
				$name = $info_region['region_img'];
			}

			$data_update = array(
				'region_category' => $post['region_category'], 
				'region_id_district' => $post['region_id_district'], 
				'region_active' => $post['region_active'], 
				'region_img' => $name, 
				
				
			);

			$this->Region_M->deleteRegion($id,$post['region_category'],$post['region_id_district']);

			$this->Region_M->update(['region_id' => $info_region['region_id']],$data_update);
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/region/edit/'.$id),'location');

		}
		$list_category = $this->Category_M->all(['cate_module_id' => '2','cate_parent_id' => '0']);
		$list_district = $this->District_M->all(['province_id' => '1']);
		$data['list_category'] = $list_category;
		$data['list_district'] = $list_district;
		$data['info_region'] = $info_region;
		$this->getHeader($data);
		$this->load->view('admin/pages/region/edit.php',$data);
		$this->getFooter();
	}


	public function update(){
		$post = $this->input->post();
		$this->Region_M->update(['region_id'=>$post['region_id']],$post);
	}

	public function destroy()
	{
		$region_id = $this->input->post('region_id');
		$this->Region_M->delete(['region_id' => $region_id]);
		$status = array(
				'code'=>'success',
				'message'=>'Đã xóa'
			);
		$this->session->set_flashdata('reponse',$status);
	}


	

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */