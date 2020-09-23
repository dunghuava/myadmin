<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('Staff_M');

	}
	public function index(){
		$_data['page_name']='Danh sách nhân viên';
		$_data['page_menu']='staff';
		$_data['list_staff']=$this->Staff_M->all();
		$this->getHeader($_data);
		$this->load->view('admin/pages/staff/index.php',$_data);
		$this->getFooter();
	}

	public function add()
	{

		$post = $this->input->post();
		if ($this->input->post()) {

			if (isset($_FILES['staff_img']['name'])){
				$file = $_FILES['staff_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				move_uploaded_file($file['tmp_name'],$path);
			}

			if ($post['staff_active'] == '') {
				$post['staff_active'] = 0;
			}

			$data_insert = array(
				'staff_name' => $post['staff_name'], 
				'staff_position' => $post['staff_position'], 
				'staff_phone' => $post['staff_phone'], 
				'staff_active' => $post['staff_active'], 
				'staff_img' => $filename, 
			);
			

			$this->Staff_M->create($data_insert);
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);

			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/staff/add'),'location');
		}

		$_data['page_name']='Thêm nhân viên';
		$_data['page_menu']='staff';
		$this->getHeader($_data);
		$this->load->view('admin/pages/staff/add.php');
		$this->getFooter();
	}

	public function edit($id)
	{
		$info_staff = $this->Staff_M->find_row(['staff_id'=>$id]);
		$post = $this->input->post();
		if ($this->input->post()) {
			if (!empty($_FILES['staff_img']['name'])){
				$file = $_FILES['staff_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				move_uploaded_file($file['tmp_name'],$path);
				@unlink('upload/images/'.$info_staff['staff_img']);

			}else{
				$filename = $info_staff['staff_img'];
			}

			if ($post['staff_active'] == '') {
				$post['staff_active'] = 0;
			}

			
			$data_update = array(
				'staff_name' => $post['staff_name'], 
				'staff_position' => $post['staff_position'], 
				'staff_phone' => $post['staff_phone'], 
				'staff_active' => $post['staff_active'], 
				'staff_img' => $filename, 
			);
			
			

			$this->Staff_M->update(['staff_id' => $id],$data_update);
			$status = array(
				'code'=>'success',
				'message'=>'Đã sửa'
			);

			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/staff/edit/'.$id),'location');
		}



		$_data['page_name']='Chỉnh sửa nhân viên';
		$_data['page_menu']='staff';

		$_data['info_staff']=$info_staff;
		$this->getHeader($_data);
		$this->load->view('admin/pages/staff/edit.php',$_data);
		$this->getFooter();
	}


	public function update(){
		$post = $this->input->post();
		$this->Staff_M->update(['staff_id'=>$post['staff_id']],$post);
	}

	public function destroy()
	{
		$staff_id = $this->input->post('staff_id');
		$this->Staff_M->delete(['staff_id' => $staff_id]);
		$status = array(
				'code'=>'success',
				'message'=>'Đã xóa'
			);
		$this->session->set_flashdata('reponse',$status);
	}

}

/* End of file account.php */
/* Location: ./application/controllers/admin/account.php */