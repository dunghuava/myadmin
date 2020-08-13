<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Investor_M');
	}

	public function index()
	{
		$data['page_name']='Danh sách chủ đầu tư';
		$data['page_menu']='extend';
		$data['list_investor']=$this->Investor_M->all();
		$this->getHeader($data);
		$this->load->view('admin/pages/investor/index.php',$data);
		$this->getFooter();
	}

	public function add()
	{

		$post = $this->input->post();

		if ($this->input->post()) {
			if (!empty($_FILES['investor_img']['name'])){
				$file_img = $_FILES['investor_img'];
				$filename_img = md5($file_img['name'].time());
				$path_img='upload/images/'.$filename_img;
				move_uploaded_file($file_img['tmp_name'],$path_img);
			}

			if ($post['investor_active'] == '') {
				$post['investor_active'] = 0;
			}


			$data_insert = array(
				'investor_title' => $post['investor_title'], 
				'investor_alias' => $post['investor_alias'], 
				'investor_img' => $filename_img, 
				'investor_name' => $post['investor_name'], 
				'investor_establish' => $post['investor_establish'], 
				'investor_address' => $post['investor_address'], 
				'investor_website' => $post['investor_website'], 
				'investor_introduce' => $post['investor_introduce'], 
				'investor_keyword' => $post['investor_keyword'], 
				'investor_description' => $post['investor_description'], 
				'investor_active' => $post['investor_active'], 
				'investor_highlights' => 0, 

			);

			$this->Investor_M->create($data_insert);

			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/investor/add/'),'location');

		}

		$data['page_name']='Thêm chủ đầu tư';
		$data['page_menu']='extend';
		$this->getHeader($data);
		$this->load->view('admin/pages/investor/add.php',$data);
		$this->getFooter();
	}

	
	public function update(){
		$post = $this->input->post();
		$this->Investor_M->update(['investor_id'=>$post['investor_id']],$post);
	}

	public function destroy()
	{
		$investor_id = $this->input->post('investor_id');
		$this->Investor_M->delete(['investor_id' => $investor_id]);
		$status = array(
				'code'=>'success',
				'message'=>'Đã xóa'
			);
		$this->session->set_flashdata('reponse',$status);
	}


	public function edit($id)
	{	

		$info_investor = $this->Investor_M->find_row(['investor_id' => $id]);
		$post = $this->input->post();

		if ($this->input->post()) {
			if (!empty($_FILES['investor_img']['name'])){
				$file_img = $_FILES['investor_img'];
				$filename_img = md5($file_img['name'].time());
				$path_img='upload/images/'.$filename_img;
				move_uploaded_file($file_img['tmp_name'],$path_img);
				@unlink('upload/images/'.$info_investor['investor_img']);
			}else{
				$filename_img = $info_investor['investor_img'];
			}

			if ($post['investor_active'] == '') {
				$post['investor_active'] = 0;
			}

			$data_update = array(
				'investor_title' => $post['investor_title'], 
				'investor_alias' => $post['investor_alias'], 
				'investor_img' => $filename_img, 
				'investor_name' => $post['investor_name'], 
				'investor_establish' => $post['investor_establish'], 
				'investor_address' => $post['investor_address'], 
				'investor_website' => $post['investor_website'], 
				'investor_introduce' => $post['investor_introduce'], 
				'investor_keyword' => $post['investor_keyword'], 
				'investor_description' => $post['investor_description'], 
				'investor_active' => $post['investor_active'], 
				'investor_highlights' => 0, 
			);

			$this->Investor_M->update(['investor_id' => $id],$data_update);

			$status = array(
				'code'=>'success',
				'message'=>'Đã sửa'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/investor/edit/'.$id),'location');

		}

		$data['info_investor'] = $info_investor;
		$data['page_name']='Chỉnh sửa chủ đầu tư';
		$data['page_menu']='extend';
		$this->getHeader($data);
		$this->load->view('admin/pages/investor/edit.php',$data);
		$this->getFooter();
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */