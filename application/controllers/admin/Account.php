<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('Account_M');
		$this->load->model('Permission_M');

	}
	public function index(){
		$form=$this->input->post();
		if (isset($form['btn_save'])){
			unset($form['btn_save']);
			$form['user_name'] = preg_replace('/[^a-zA-Z0-9]/','',$form['user_name']);
			if ($form['user_permission_group_id']==0){
				$form['is_admin']=1;
			}
			if(!empty($form['user_password'])){
				$form['user_password']=md5($form['user_password']);
			}else{
				unset($form['user_password']);
			}
			if($form['user_id']>0){
				$this->Account_M->update($form['user_id'],$form);
				$status = array(
					'code'=>'success',
					'message'=>'Đã lưu'
				);
			}else{
				$check = $this->Account_M->find(['user_name'=>$form['user_name']]);
				if (empty($check) || !isset($check['user_id'])){
					$this->Account_M->create($form);
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
			}
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('account'),'location');
		}
		$_data['page_name']='Tài khoản';
		$_data['page_menu']='account';
		$_data['arr_account']=$this->Account_M->all();
		$_data['arr_permission_group']=$this->Permission_M->allGroup();
		$this->getHeader($_data);
		$this->load->view('admin/pages/account/account');
		$this->getFooter();
	}
	public function login()
	{
		if ($this->session->has_userdata('user_infor')){
			redirect(base_url('admin/category'),'location');
		}
		$post = $this->input->post();
		if ($post){
			$user_name = $post['user_name'];
			$user_password = md5($post['user_password']);
			if (isset($post['btn_do_login'])){
				$is_login = $this->Account_M->do_login($user_name,$user_password);
				if ($is_login){
					$infor = $this->Account_M->all(['user_name'=>$user_name]);
					$this->session->set_userdata('user_infor', $infor[0] );
					redirect(base_url('admin'),'location');
				}else{
					$this->session->set_flashdata('reponse','Tên đăng nhập / mật khẩu ko đúng.');
				}
			}
		}
		$this->load->view('admin/login');
	}
	public function destroy(){
		$user_id = $this->input->post('user_id');
		$this->Account_M->destroy($user_id);
		$status = array(
			'code'=>'success',
			'message'=>'Đã xóa'
		);
		$this->session->set_flashdata('reponse',$status);
	}
	public function logout(){
		$this->session->unset_userdata('user_infor');
		redirect(base_url().'admin/login','location');
	}

}

/* End of file account.php */
/* Location: ./application/controllers/admin/account.php */