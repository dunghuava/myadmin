<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('Account_M');

	}
	public function index(){
		// $form=$this->input->post();
		// if (isset($form['btn_save'])){
		// 	unset($form['btn_save']);
		// 	$form['user_name'] = preg_replace('/[^a-zA-Z0-9]/','',$form['user_name']);

		// 	if(!empty($form['user_password'])){
		// 		$form['user_password']=md5($form['user_password']);
		// 	}else{
		// 		unset($form['user_password']);
		// 	}
		// 	if($form['user_id']>0){
		// 		$this->Account_M->update($form['user_id'],$form);
		// 		$status = array(
		// 			'code'=>'success',
		// 			'message'=>'Đã lưu'
		// 		);
		// 	}else{
		// 		$check = $this->Account_M->find(['user_name'=>$form['user_name']]);
		// 		if (empty($check) || !isset($check['user_id'])){
		// 			$this->Account_M->create($form);
		// 			$status = array(
		// 				'code'=>'success',
		// 				'message'=>'Đăng ký thành công'
		// 			);
		// 		}else{
		// 			$status = array(
		// 				'code'=>'warning',
		// 				'message'=>'Tên đăng nhập đã tồn tại'
		// 			);
		// 		}
		// 	}
		// 	$this->session->set_flashdata('reponse',$status);
		// 	redirect(base_url('admin/user'),'location');
		// }
		$_data['page_name']='Danh sách tài khoản';
		$_data['page_menu']='account';
		$_data['arr_account']=$this->Account_M->all(['is_admin'=>'0']);
		$this->getHeader($_data);
		$this->load->view('admin/pages/user/index.php',$_data);
		$this->getFooter();
	}

	public function add()
	{

		$post = $this->input->post();
		if ($this->input->post()) {
			
				$check = $this->Account_M->find(['user_name'=>$post['user_name']]);
				if (empty($check)){
					$this->Account_M->create($post);
					$status = array(
						'code'=>'success',
						'message'=>'Đăng ký thành công'
					);
				}else{
					$status = array(
						'code'=>'warning',
						'message'=>'Tên đăng nhập đã tồn tại'
					);
				}
			$this->session->set_flashdata('reponse',$status);
			// redirect(base_url('admin/user/add'),'location');
		}

		$_data['page_name']='Thêm tài khoản';
		$_data['page_menu']='account';
		$this->getHeader($_data);
		$this->load->view('admin/pages/user/add.php');
		$this->getFooter();
	}

	public function check_user_name()
	{
		$user_name = $this->input->post('user_name');
		$user_id = $this->input->post('user_id');
		$check = $this->Account_M->Check_Username($user_name,$user_id);

		if (count($check) >0) {
			echo "exist";
		}else{
			echo "ok";
		}
	}

}

/* End of file account.php */
/* Location: ./application/controllers/admin/account.php */