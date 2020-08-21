<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	private $user_infor=null;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Account_M');
		$this->load->model('Setting_M');
		$this->load->model('Web_M');
		$this->load->model('Info_M');
		$this->load->model('Contact_M');
	}
	public function page_header($data=null){
		$data['info'] = $this->Info_M->all();
		$this->load->view('web/header.php',$data);
	}
	public function page_footer($data=null){
		$data['info'] = $this->Info_M->all();
		$data['blog_footer'] = $this->Post_M->getListPost_byCategory(14,4);
		$data['du_an_footer']= $this->Project_M->getListProject(['project_kind'=>0],4);
		$data['nha_dep_footer']= $this->Post_M->getListPost_byCategory(21,4);
		$this->load->view('web/footer.php',$data);
	}
	public function view($view,$data=null){
		$this->load->view($view,$data);
	}
	// public function isOnline(){
	// 	$ip_address=get_client_ip();
	// 	$this->Web_M->insert_on_duplicate($ip_address);
	// }
	public function getHeader($data=null){
		if (!$this->session->has_userdata('admin_infor')){
			redirect(base_url('admin/login'),'location');
		}
		// $this->isOnline();

		// if ($this->actual_link!=trim(base_url(),'/')){
		// 	if (!in_array($this->actual_link,$this->arr_permission_allow) && $this->user_infor['user_infor']['is_admin']==0){
		// 		$status = array(
		// 			'code'=>'error',
		// 			'message'=>'Bạn không có quyền truy cập vào trang này'
		// 		);
		// 		$this->session->set_flashdata('reponse',$status);
		// 		$this->session->set_flashdata('disable_screen',true);
		// 	}
		// }

		// $data['online'] = $this->Web_M->count(['LEFT(created_at,15)'=>substr(date('Y-m-d h:i'),0,15)]);
		// $data['arr_permission_allow']=$this->arr_permission_allow;
		$this->admin_infor = $this->session->get_userdata('admin_infor');
		$data['admin_infor']=$this->admin_infor['admin_infor'];
		$data['setting']=$this->Setting_M->find(['setting_id'=>1]);
		$this->load->view('admin/header.php',$data);
	}
	public function getFooter(){
		$this->load->view('admin/footer.php');
		$this->load->view('admin/script.php');
	}
	function do_upload($userfile)
	{		
		$dir='./upload/img/';
		unlink($dir.$_POST['old_file']);
		if(isset($_FILES[$userfile])){
			$file = $_FILES[$userfile]['name'];
			$file_name = md5($file);
			$file_upload = $dir.$file_name;
			if (move_uploaded_file($_FILES[$userfile]['tmp_name'],$file_upload)){
				return $file_name;
			}
			return false;
		}
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */