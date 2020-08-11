<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themes extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Slide_M');
		$this->load->model('Info_M');
		
	}

	public function banner()
	{
		$data['page_name']='Danh sách banner';
		$data['page_menu']='themes';
		$data['list_slide']=$this->Slide_M->all();
		$this->getHeader($data);
		$this->load->view('admin/pages/themes/banner/index.php',$data);
		$this->getFooter();
	}


	public function addBanner()
	{
		$data['page_name']='Thêm banner';
		$data['page_menu']='themes';

		$post = $this->input->post();
		if ($this->input->post()) {
			if (!empty($_FILES['slide_img']['name'])){
				$file = $_FILES['slide_img'];
				$name_slide_img = md5($file['name'].time());
				$path_slide_img='upload/images/'.$name_slide_img;
				move_uploaded_file($file['tmp_name'],$path_slide_img);
			}

			$data_insert = array(
				'slide_title' => $post['slide_title'], 
				'slide_active' => $post['slide_active'], 
				'slide_href' => '', 
				'slide_img' => $name_slide_img, 
				
				
			);

			$this->Slide_M->create($data_insert);
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/themes/addBanner/'),'location');

		}
		$this->getHeader($data);
		$this->load->view('admin/pages/themes/banner/add.php',$data);
		$this->getFooter();
	}


	public function editBanner($id)
	{
		$data['page_name']='Chỉnh sửa banner';
		$data['page_menu']='themes';
		$info_banner = $this->Slide_M->find_row(['slide_id' => $id]);
		$post = $this->input->post();
		if ($this->input->post()) {
			if (!empty($_FILES['slide_img']['name'])){
				$file = $_FILES['slide_img'];
				$name_slide_img = md5($file['name'].time());
				$path_slide_img='upload/images/'.$name_slide_img;
				move_uploaded_file($file['tmp_name'],$path_slide_img);
			}else{
				$name_slide_img = $info_banner['slide_img'];
			}

			$data_update = array(
				'slide_title' => $post['slide_title'], 
				'slide_active' => $post['slide_active'], 
				'slide_href' => '', 
				'slide_img' => $name_slide_img, 
				
				
			);

			$this->Slide_M->update(['slide_id' => $info_banner['slide_id']],$data_update);
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/themes/editBanner/'.$id),'location');

		}

		$data['info_banner'] = $info_banner;
		$this->getHeader($data);
		$this->load->view('admin/pages/themes/banner/edit.php',$data);
		$this->getFooter();
	}

	public function info()
	{
		$data['page_name']='Thông tin chung';
		$data['page_menu']='themes';

		$info = $this->Info_M->find_row(['info_id' => '1']);
		$post = $this->input->post();
		if ($this->input->post()) {
			if (!empty($_FILES['logo_img']['name'])){
				$file_logo = $_FILES['logo_img'];
				$name_logo = md5($file_logo['name'].time());
				$path_logo='upload/images/'.$name_logo;
				move_uploaded_file($file_logo['tmp_name'],$path_logo);
				@unlink('upload/images/'.$info['logo_img']);
			}else{
				$name_logo = $info['logo_img'];
			}


			if (!empty($_FILES['icon_img']['name'])){
				$file_icon = $_FILES['icon_img'];
				$name_icon = md5($file_icon['name'].time());
				$path_icon='upload/images/'.$name_icon;
				move_uploaded_file($file_icon['tmp_name'],$path_icon);
				@unlink('upload/images/'.$info['icon_img']);
			}else{
				$name_icon = $info['icon_img'];
			}

			

			$data_update = array(
				'company' => $post['company'], 
				'address' => $post['address'], 
				'twitter' => $post['twitter'], 
				'facebook' => $post['facebook'], 
				'google' => $post['google'], 
				'youtube' => $post['youtube'], 
				'instagram' => $post['instagram'], 
				'email' => $post['email'], 
				'coppy_right' => $post['coppy_right'], 
				'phone' => $post['phone'], 
				'logo_img' => $name_logo, 
				'icon_img' => $name_icon, 
				
			);


			if (!empty($info)) {
				$this->Info_M->update(['info_id' => $info['info_id']],$data_update);
				$status = array(
					'code'=>'success',
					'message'=>'Đã sửa'
				);
			}else{
				$this->Info_M->create($data_update);
				$status = array(
					'code'=>'success',
					'message'=>'Đã lưu'
				);
			}

			
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/themes/info/'),'location');

		}
		$data['info'] = $info;
		$this->getHeader($data);
		$this->load->view('admin/pages/themes/info/index.php',$data);
		$this->getFooter();
	}

	


	public function updateBanner(){
		$post = $this->input->post();
		$this->Slide_M->update(['slide_id'=>$post['slide_id']],$post);
	}

	public function destroyBanner()
	{
		$slide_id = $this->input->post('slide_id');
		$this->Slide_M->delete(['slide_id' => $slide_id]);
		$status = array(
				'code'=>'success',
				'message'=>'Đã xóa'
			);
		$this->session->set_flashdata('reponse',$status);
	}


	

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */