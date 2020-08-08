<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_M');
	}
	public function index()
	{
		$post = $this->input->post();
		if (isset($post['btn_save'])){
			unset($post['btn_save']);
			$file = $this->do_upload('file');
			unset($post['old_file']);
			if($file){
				$post['favicon']=$file;
			}
			$inserted = $this->Setting_M->settingUp($post);
			if($inserted){
				$status = array(
					'code'=>'success',
					'message'=>'Đã lưu cài đặt'
				);
				$this->session->set_flashdata('reponse',$status);
				redirect(base_url('admin/setting'),'location');
			}
		}				
		$_data['page_name']='Cài đặt';
		$_data['page_menu']='setting';
		$_data['setting']=$this->Setting_M->find(['setting_id'=>1]);
		$this->getHeader($_data);
		$this->load->view('admin/pages/setting/setting');
		$this->getFooter();
	}
	public function sibar($sibar=0){
		$this->Setting_M->settingUp(['sibar_mode'=>$sibar]);
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */