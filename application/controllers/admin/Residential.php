<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residential extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_M');
		$this->load->model('Residential_M');
		$this->load->model('Province_M');
		$this->load->model('District_M');
		$this->load->model('Ward_M');
		
	}

	public function index()
	{
		$data['page_name']='Danh sách khu dân cư';
		$data['page_menu']='extend';
		$data['list_residential']=$this->Residential_M->all('',['residential_id'=>'desc']);
		$this->getHeader($data);
		$this->load->view('admin/pages/residential/index.php',$data);
		$this->getFooter();
	}

	public function add()
	{

		$post = $this->input->post();

		if ($this->input->post()) {
			if (!empty($_FILES['residential_img']['name'])){
				$file_img = $_FILES['residential_img'];
				$filename_img = md5($file_img['name'].time());
				$path_img='upload/images/'.$filename_img;
				move_uploaded_file($file_img['tmp_name'],$path_img);
			}

			// if (!empty($_FILES['residential_banner']['name'])){
			// 	$file_banner = $_FILES['residential_banner'];
			// 	$filename_banner = md5($file_banner['name'].time());
			// 	$path_banner='upload/images/'.$filename_banner;
			// 	move_uploaded_file($file_banner['tmp_name'],$path_banner);
			// }


			if ($post['residential_active'] == '') {
				$post['residential_active'] = 0;
			}

			$info_district = $this->District_M->find_row(['district_id' => $post['residential_district_id']]);

			$info_province = $this->Province_M->find_row(['province_id' => $post['residential_province_id']]);

			$address = $info_district['district_name'].','.$info_province['province_name'];



			$url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&address=' . urlencode($address) . '&sensor=true';
            $json = @file_get_contents($url);
            $position = json_decode($json);
            if ($position->status == "OK") {
                $lat = $position->results[0]->geometry->location->lat;
                $lng = $position->results[0]->geometry->location->lng;
            } else {
                // $this->_data['error'] = 'Chúng tôi không tìm thấy địa chỉ này. Vui lòng nhập đúng địa chỉ';
                $lat = '';
                $lng = '';
            }

            if ($post['residential_tag']!='') {
            	$tag = implode(',', $post['residential_tag']);
            }else{
            	$tag = '';
            }


			$data_insert = array(
				'residential_title' => $post['residential_title'], 
				'residential_alias' => $post['residential_alias'], 
				'residential_img' => $filename_img, 
				'residential_banner' => '', 
				'residential_introduce' => $post['residential_introduce'], 
				'residential_content' => $post['residential_content'], 
				'residential_highlights' => 0, 
				'residential_active' => $post['residential_active'], 
				'residential_province_id' => $post['residential_province_id'], 
				'residential_district_id' => $post['residential_district_id'], 
				'residential_ward_id' => $post['residential_ward_id'], 
				'residential_lat' => $lat, 
				'residential_lng' => $lng, 
				'residential_tag' => $tag, 
				'residential_habitat' => $post['residential_habitat'], 
				'residential_community' => $post['residential_community'], 
				'residential_utility' => $post['residential_utility'], 
				'residential_traffic' => $post['residential_traffic'], 
				'residential_keyword' => $post['residential_keyword'], 
				'residential_description' => $post['residential_description'], 
			);

			$this->Residential_M->create($data_insert);

			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/residential/add/'),'location');

		}

		$list_province = $this->Province_M->all();
		
		$data['list_province'] = $list_province;
		
		$data['page_name']='Thêm khu dân cư';
		$data['page_menu']='extend';
		$this->getHeader($data);
		$this->load->view('admin/pages/residential/add.php',$data);
		$this->getFooter();
	}

	
	public function update(){
		$post = $this->input->post();
		$this->Residential_M->update(['residential_id'=>$post['residential_id']],$post);
	}

	public function destroy()
	{
		$residential_id = $this->input->post('residential_id');
		$this->Residential_M->delete(['residential_id' => $residential_id]);
		$status = array(
				'code'=>'success',
				'message'=>'Đã xóa'
			);
		$this->session->set_flashdata('reponse',$status);
	}


	public function edit($id)
	{	

		$info_residential = $this->Residential_M->find_row(['residential_id' => $id]);
		$post = $this->input->post();

		if ($this->input->post()) {
			if (!empty($_FILES['residential_img']['name'])){
				$file_img = $_FILES['residential_img'];
				$filename_img = md5($file_img['name'].time());
				$path_img='upload/images/'.$filename_img;
				move_uploaded_file($file_img['tmp_name'],$path_img);
				@unlink('upload/images/'.$info_residential['residential_img']);
			}else{
				$filename_img = $info_residential['residential_img'];
			}

			// if (!empty($_FILES['residential_banner']['name'])){
			// 	$file_banner = $_FILES['residential_banner'];
			// 	$filename_banner = md5($file_banner['name'].time());
			// 	$path_banner='upload/images/'.$filename_banner;
			// 	move_uploaded_file($file_banner['tmp_name'],$path_banner);
			// 	@unlink('upload/images/'.$info_residential['residential_banner']);
			// }else{
			// 	$filename_banner = $info_residential['residential_banner'];
			// }


			if ($post['residential_active'] == '') {
				$post['residential_active'] = 0;
			}

			$info_district = $this->District_M->find_row(['district_id' => $post['residential_district_id']]);

			$info_province = $this->Province_M->find_row(['province_id' => $post['residential_province_id']]);

			$address = $info_district['district_name'].','.$info_province['province_name'];



			$url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&address=' . urlencode($address) . '&sensor=true';
            $json = @file_get_contents($url);
            $position = json_decode($json);
            if ($position->status == "OK") {
                $lat = $position->results[0]->geometry->location->lat;
                $lng = $position->results[0]->geometry->location->lng;
            } else {
                // $this->_data['error'] = 'Chúng tôi không tìm thấy địa chỉ này. Vui lòng nhập đúng địa chỉ';
                $lat = '';
                $lng = '';
            }

            if ($post['residential_tag']!='') {
            	$tag = implode(',', $post['residential_tag']);
            }else{
            	$tag = '';
            }


			$data_update = array(
				'residential_title' => $post['residential_title'], 
				'residential_alias' => $post['residential_alias'], 
				'residential_img' => $filename_img, 
				'residential_banner' => '', 
				'residential_introduce' => $post['residential_introduce'], 
				'residential_content' => $post['residential_content'], 
				'residential_active' => $post['residential_active'], 
				'residential_province_id' => $post['residential_province_id'], 
				'residential_district_id' => $post['residential_district_id'], 
				'residential_ward_id' => $post['residential_ward_id'], 
				'residential_lat' => $lat, 
				'residential_lng' => $lng, 
				'residential_tag' => $tag, 
				'residential_habitat' => $post['residential_habitat'], 
				'residential_community' => $post['residential_community'], 
				'residential_utility' => $post['residential_utility'], 
				'residential_traffic' => $post['residential_traffic'], 
				'residential_keyword' => $post['residential_keyword'], 
				'residential_description' => $post['residential_description'], 
			);

			$this->Residential_M->update(['residential_id' => $id],$data_update);

			$status = array(
				'code'=>'success',
				'message'=>'Đã sửa'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/residential/edit/'.$id),'location');

		}

		$list_province = $this->Province_M->all();
		$data['info_residential'] = $info_residential;
		$data['list_province'] = $list_province;
		$data['page_name']='Chỉnh sửa khu dân cư';
		$data['page_menu']='extend';
		$this->getHeader($data);
		$this->load->view('admin/pages/residential/edit.php',$data);
		$this->getFooter();
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */