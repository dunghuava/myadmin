<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Permission_M');
	}
	public function index()
	{
		$form = $this->input->post();
		if (isset($form['btn_save'])){
			unset($form['btn_save']);
			$form['permission_value']=trim(preg_replace('/[0-9]/','',$form['permission_value']),'/');
			$form['permission_value']=str_replace(base_url(),'',$form['permission_value']);
			if($form['permission_id']>0){
				$this->Permission_M->update($form['permission_id'],$form);
			}else{
				$this->Permission_M->create($form);
			}
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('permission'),'location');
		}
		$_data['page_name']='Permission';
		$_data['page_menu']='account';
		$_data['arr_permission']=$this->Permission_M->all();
		$this->getHeader($_data);
		$this->load->view('admin/pages/permission/permission');
		$this->getFooter();	
	}
	public function destroy(){
		$permission_id = $this->input->post('permission_id');
		$this->Permission_M->destroy($permission_id);
		$status = array(
			'code'=>'success',
			'message'=>'Đã xóa'
		);
		$this->session->set_flashdata('reponse',$status);
	}
	public function destroyGroup(){
		$permission_group_id = $this->input->post('permission_group_id');
		$this->Permission_M->destroyGroup($permission_group_id);
		$status = array(
			'code'=>'success',
			'message'=>'Đã xóa'
		);
		$this->session->set_flashdata('reponse',$status);
	}
	public function group()
	{
		$form = $this->input->post();

		if (isset($form['btn_save'])){
			unset($form['btn_save']);
			$permission_group_value='';
			foreach ($form['permission_group_value'] as $value){
				$permission_group_value.=$value.'&';
			}
			$permission_group_value=trim($permission_group_value,'&');
			$form['permission_group_value']=$permission_group_value;
			if($form['permission_group_id']>0){
				$this->Permission_M->updateGroup($form['permission_group_id'],$form);
			}else{
				$this->Permission_M->createGroup($form);
			}
			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('permission/group'),'location');
		}
		$_data['page_name']='Permission group';
		$_data['page_menu']='account';
		$_data['arr_permission']=$this->Permission_M->all();
		$_data['arr_permission_group']=$this->Permission_M->allGroup();

		$this->getHeader($_data);
		$this->load->view('admin/pages/permission/permission_group');
		$this->getFooter();	
	}


}

/* End of file Permission.php */
/* Location: ./application/controllers/Permission.php */