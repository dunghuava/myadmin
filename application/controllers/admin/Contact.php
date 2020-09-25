<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Contact_M');
		$this->load->model('Staff_M');
	}

	public function index()
	{
		$data['page_name']='Danh sách liên hệ';
		$data['page_menu']='contact';
		$data['list_contact']=$this->Contact_M->all('','desc');
		$this->getHeader($data);
		$this->load->view('admin/pages/contact/index.php',$data);
		$this->getFooter();
	}

	
	public function details($id)
	{
		$this->Contact_M->update(['contact_id'=>$id],['contact_status'=>1]);
		$info_contact = $this->Contact_M->find_row(['contact_id' => $id]);
		$data['info_contact'] = $info_contact;
		$data['page_name']='Chi tiết liên hệ';
		$data['page_menu']='contact';
		$this->getHeader($data);
		$this->load->view('admin/pages/contact/details.php',$data);
		$this->getFooter();
	}

	public function destroy()
	{
		$contact_id = $this->input->post('contact_id');
		$this->Contact_M->delete(['contact_id' => $contact_id]);
		$status = array(
				'code'=>'success',
				'message'=>'Đã xóa'
			);
		$this->session->set_flashdata('reponse',$status);
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */