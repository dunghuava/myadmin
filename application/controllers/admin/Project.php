<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_M');
		$this->load->model('Project_M');
		$this->load->model('Province_M');
		$this->load->model('District_M');
		$this->load->model('Ward_M');
		$this->load->model('Status_M');
		$this->load->model('Type_M');
		$this->load->model('Extension_M');
		$this->load->model('Furniture_M');
		$this->load->model('Investor_M');
		$this->load->model('Residential_M');
	}

	public function index()
	{
		$data['page_name']='Danh sách dự án';
		$data['page_menu']='project';
		$data['list_project']=$this->Project_M->all();
		$this->getHeader($data);
		$this->load->view('admin/pages/project/index.php',$data);
		$this->getFooter();
	}

	public function add()
	{

		// $post = $this->input->post();

		// if ($this->input->post()) {
		// 	if (isset($_FILES['post_img']['name'])){
		// 		$file = $_FILES['post_img'];
		// 		$filename = md5($file['name'].time());
		// 		$path='upload/images/'.$filename;
		// 		move_uploaded_file($file['tmp_name'],$path);
		// 	}

		// 	if ($post['post_active'] == '') {
		// 		$post['post_active'] = 0;
		// 	}

			

		// 	$date_post_format = substr($post['date_post'],  6, 4). substr($post['date_post'],  3, 2).substr($post['date_post'],  0, 2);
		// 	$date_time = $date_post_format.$post['time_post'];

		// 	$data_insert = array(
		// 		'post_category_id' => $post['post_category_id'], 
		// 		'post_title' => $post['post_title'], 
		// 		'post_alias' => $post['post_alias'], 
		// 		'post_introduce' => $post['post_introduce'], 
		// 		'post_content' => $post['post_content'], 
		// 		'post_keyword' => $post['post_keyword'], 
		// 		'post_description' => $post['post_description'], 
		// 		'post_highlights' => 0, 
		// 		'post_active' => $post['post_active'], 
		// 		'post_date_time' => $date_time,
		// 		'post_img' => $filename, 
		// 	);

		// 	$this->Post_M->create($data_insert);

		// 	$status = array(
		// 		'code'=>'success',
		// 		'message'=>'Đã lưu'
		// 	);
		// 	$this->session->set_flashdata('reponse',$status);

		// }
		// $data_category = array(
		// 	'cate_module_id' => '1',
		// );

		$list_category = $this->Category_M->all(['cate_module_id' => '2']);
		$list_province = $this->Province_M->all();
		$list_status = $this->Status_M->all();
		$list_type = $this->Type_M->all();
		$list_extension = $this->Extension_M->all();
		$list_furniture = $this->Furniture_M->all();
		$list_investor = $this->Investor_M->all();
		$list_residential = $this->Residential_M->all();
		$data['list_category'] = $list_category;
		$data['list_province'] = $list_province;
		$data['list_status'] = $list_status;
		$data['list_type'] = $list_type;
		$data['list_extension'] = $list_extension;
		$data['list_furniture'] = $list_furniture;
		$data['list_investor'] = $list_investor;
		$data['list_residential'] = $list_residential;
		$data['page_name']='Thêm dự án';
		$data['page_menu']='post';
		$this->getHeader($data);
		$this->load->view('admin/pages/project/add.php',$data);
		$this->getFooter();
	}

	// public function edit($id)
	// {
	// 	$info_post = $this->Post_M->find_row(['post_id' => $id]);

	// 	$post = $this->input->post();

	// 	if ($this->input->post()) {
	// 		if (!empty($_FILES['post_img']['name'])){
	// 			$file = $_FILES['post_img'];
	// 			$filename = md5($file['name'].time());
	// 			$path='upload/images/'.$filename;
	// 			move_uploaded_file($file['tmp_name'],$path);
	// 			@unlink('upload/images/'.$info_post['post_img']);

	// 		}else{
	// 			$filename = $info_post['post_img'];
	// 		}

	// 		if ($post['post_active'] == '') {
	// 			$post['post_active'] = 0;
	// 		}

			

	// 		$date_post_format = substr($post['date_post'],  6, 4). substr($post['date_post'],  3, 2).substr($post['date_post'],  0, 2);
	// 		$date_time = $date_post_format.$post['time_post'];

	// 		$data_update = array(
	// 			'post_category_id' => $post['post_category_id'], 
	// 			'post_title' => $post['post_title'], 
	// 			'post_alias' => $post['post_alias'], 
	// 			'post_introduce' => $post['post_introduce'], 
	// 			'post_content' => $post['post_content'], 
	// 			'post_keyword' => $post['post_keyword'], 
	// 			'post_description' => $post['post_description'], 
	// 			'post_highlights' => 0, 
	// 			'post_active' => $post['post_active'], 
	// 			'post_date_time' => $date_time,
	// 			'post_img' => $filename, 
	// 		);

	// 		$this->Post_M->update(['post_id' => $id],$data_update);

	// 		$status = array(
	// 			'code'=>'success',
	// 			'message'=>'Đã sửa'
	// 		);
	// 		$this->session->set_flashdata('reponse',$status);

	// 	}

	// 	$list_category = $this->Category_M->all(['cate_module_id' => '1']);
	// 	$info_post = $this->Post_M->find_row(['post_id' => $id]);
	// 	$data['list_category'] = $list_category;
	// 	$data['info_post'] = $info_post;
	// 	$data['page_name']='Chỉnh sửa bài viết';
	// 	$data['page_menu']='post';
	// 	$this->getHeader($data);
	// 	$this->load->view('admin/pages/post/edit.php',$data);
	// 	$this->getFooter();
	// }

	// public function update(){
	// 	$post = $this->input->post();
	// 	$this->Post_M->update(['post_id'=>$post['post_id']],$post);
	// }

	// public function destroy()
	// {
	// 	$post_id = $this->input->post('post_id');
	// 	$this->Post_M->delete(['post_id' => $post_id]);
	// 	$status = array(
	// 			'code'=>'success',
	// 			'message'=>'Đã xóa'
	// 		);
	// 	$this->session->set_flashdata('reponse',$status);
	// }

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */