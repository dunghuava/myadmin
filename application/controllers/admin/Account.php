<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('Account_M');

	}
	public function login()
	{
		if ($this->session->has_userdata('admin_infor')){
			redirect(base_url('admin/category'),'location');
		}
		$post = $this->input->post();
		if ($post){
			$user_name = $post['user_name'];
			$user_password = md5($post['user_password']);
			if (isset($post['btn_do_login'])){
				$is_login = $this->Account_M->CheckLogin($user_name,$user_password,1);
				if ($is_login){
					$infor = $this->Account_M->all(['user_name'=>$user_name,'is_admin'=>'1']);
					// print_r($infor);die();
					$this->session->set_userdata('admin_infor', $infor[0] );
					redirect(base_url('admin'),'location');
				}else{
					$this->session->set_flashdata('reponse','Tên đăng nhập hoặc mật khẩu không đúng.');
				}
			}
		}
		$this->load->view('admin/login');
	}
	
	public function logout(){
		$this->session->unset_userdata('admin_infor');
		redirect(base_url().'admin/login','location');
	}

}

/* End of file account.php */
/* Location: ./application/controllers/admin/account.php */