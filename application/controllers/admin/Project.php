<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_M');
		$this->load->model('Project_M');
		$this->load->model('Province_M');
		$this->load->model('District_M');
		$this->load->model('Ward_M');
		$this->load->model('Status_M');
		$this->load->model('Type_M');
		$this->load->model('Extension_M');
		$this->load->model('Furniture_M');
		$this->load->model('Investor_M');
		$this->load->model('Residential_M');
		$this->load->model('Project_Images_M');
		
	}

	public function index()
	{
		$data['page_name']='Danh sách dự án';
		$data['page_menu']='project';
		$data['list_project']=$this->Project_M->all();
		$this->getHeader($data);
		$this->load->view('admin/pages/project/index.php',$data);
		$this->getFooter();
	}

	public function add()
	{

		$post = $this->input->post();

		if ($this->input->post()) {
			if (!empty($_FILES['project_img']['name'])){
				$file = $_FILES['project_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				move_uploaded_file($file['tmp_name'],$path);
			}

			if ($post['project_active'] == '') {
				$post['project_active'] = 0;
			}

			$url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&address=' . urlencode($post['project_address']) . '&sensor=true';
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


			$data_insert = array(
				'project_category' => $post['project_category'], 
				'project_title' => $post['project_title'], 
				'project_alias' => $post['project_alias'], 
				'project_introduce' => $post['project_introduce'], 
				'project_img' => $filename, 
				'project_content' => $post['project_content'], 
				'project_highlights' => 0, 
				'project_active' => $post['project_active'], 
				'project_address' => $post['project_address'], 
				'project_province_id' => $post['project_province_id'], 
				'project_district_id' => $post['project_district_id'], 
				'project_ward_id' => $post['project_ward_id'], 
				'project_lat' => $lat, 
				'project_lng' => $lng, 
				'project_stt' => '', 
				'project_investor' => $post['project_investor'], 
				'project_status' => $post['project_status'], 
				'project_type' => $post['project_type'], 
				'project_acreage' => $post['project_acreage'], 
				'project_price' => $post['project_price'], 
				'number_bedroom' => $post['number_bedroom'], 
				'number_tolet' => $post['number_tolet'], 
				'number_floors' => $post['number_floors'], 
				'number_units' => $post['number_units'], 
				'number_blocks' => $post['number_blocks'], 
				'project_extension' => implode(',', $post['project_extension']), 
				'project_furniture' => implode(',', $post['project_furniture']), 
				'project_residential' => $post['project_residential'], 
				'project_keyword' => $post['project_keyword'], 
				'project_description' => $post['project_description'], 
			);

			$project_id = $this->Project_M->create($data_insert);

			if (!empty($_FILES['project_images'])){
				$count_file = count($_FILES['project_images']['name']);
				for ($i = 0; $i < $count_file; $i++) {
					$file_images = $_FILES['project_images'];
					$filename_images = md5($file_images['name'][$i].time());
					$path='upload/images/'.$filename_images;
					move_uploaded_file($file_images['tmp_name'][$i],$path);

					$data_insert_images = array(
						'project_id' => $project_id, 
						'project_images' => $filename_images, 
					);

					$this->Project_Images_M->create($data_insert_images);
				}


			}



			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/project/add/'),'location');

		}

		$list_category = $this->Category_M->all(['cate_module_id' => '2','cate_parent_id' => '0']);
		$list_province = $this->Province_M->all();
		$list_status = $this->Status_M->all();
		$list_type = $this->Type_M->all();
		$list_extension = $this->Extension_M->all();
		$list_furniture = $this->Furniture_M->all();
		$list_investor = $this->Investor_M->all();
		$list_residential = $this->Residential_M->all();
		$data['list_category'] = $list_category;
		$data['list_province'] = $list_province;
		$data['list_status'] = $list_status;
		$data['list_type'] = $list_type;
		$data['list_extension'] = $list_extension;
		$data['list_furniture'] = $list_furniture;
		$data['list_investor'] = $list_investor;
		$data['list_residential'] = $list_residential;
		$data['page_name']='Thêm dự án';
		$data['page_menu']='project';
		$this->getHeader($data);
		$this->load->view('admin/pages/project/add.php',$data);
		$this->getFooter();
	}

	public function getListDistrict_byProvince()
	{
		$province_id = $this->input->post('province_id');
		$district_id = $this->input->post('district_id');
		$list_district = $this->District_M->find(['province_id' => $province_id]);
		$html = '<option value="">Chọn Quận - Huyện</option>';
		foreach ($list_district as $value) {
			if ($district_id == $value['district_id']) {
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$html.= '<option value="'.$value['district_id'].'" '.$selected.'>'.$value['district_name'].'</option>';
		}

		echo $html;
	}
	public function getListWard_byDistrict()
	{
		$district_id = $this->input->post('district_id');
		$ward_id = $this->input->post('ward_id');
		$list_ward = $this->Ward_M->find(['district_id' => $district_id]);
		$html = '<option value="">Chọn Phường - Xã</option>';
		foreach ($list_ward as $value) {
			if ($ward_id == $value['ward_id']) {
				$selected1 = 'selected';
			}else{
				$selected1 = '';
			}
			$html.= '<option value="'.$value['ward_id'].'" '.$selected1.'>'.$value['ward_name'].'</option>';
		}

		echo $html;
	}

	public function update(){
		$post = $this->input->post();
		$this->Project_M->update(['project_id'=>$post['project_id']],$post);
	}

	public function destroy()
	{
		$project_id = $this->input->post('project_id');
		$this->Project_M->delete(['project_id' => $project_id]);
		$status = array(
				'code'=>'success',
				'message'=>'Đã xóa'
			);
		$this->session->set_flashdata('reponse',$status);
	}


	public function destroyImages()
	{
		$pro_img_id = $this->input->post('pro_img_id');
		$info_images = $this->Project_Images_M->find_row(['project_images_id' => $pro_img_id]);
		$name_file = $info_images['project_images'];
		@unlink('upload/images/'.$name_file);
		$project_id = $this->input->post('project_id');
		$list_images = $this->Project_Images_M->all(['project_id' => $project_id]);
		$this->Project_Images_M->delete(['project_images_id' => $pro_img_id]);

		echo count($list_images);
		
	}



	public function edit($id)
	{
		$info_project = $this->Project_M->find_row(['project_id' => $id]);
		$list_images = $this->Project_Images_M->all(['project_id' => $id]);
		

		$post = $this->input->post();

		if ($this->input->post()) {
			if (!empty($_FILES['project_img']['name'])){
				$file = $_FILES['project_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				move_uploaded_file($file['tmp_name'],$path);
				@unlink('upload/images/'.$info_project['project_img']);
			}else{
				$filename = $info_project['project_img'];
			}

			if ($post['project_active'] == '') {
				$post['project_active'] = 0;
			}

			$url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&address=' . urlencode($post['project_address']) . '&sensor=true';
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


			$data_update = array(
				'project_category' => $post['project_category'], 
				'project_title' => $post['project_title'], 
				'project_alias' => $post['project_alias'], 
				'project_introduce' => $post['project_introduce'], 
				'project_img' => $filename, 
				'project_content' => $post['project_content'], 
				'project_active' => $post['project_active'], 
				'project_address' => $post['project_address'], 
				'project_province_id' => $post['project_province_id'], 
				'project_district_id' => $post['project_district_id'], 
				'project_ward_id' => $post['project_ward_id'], 
				'project_lat' => $lat, 
				'project_lng' => $lng, 
				'project_investor' => $post['project_investor'], 
				'project_status' => $post['project_status'], 
				'project_type' => $post['project_type'], 
				'project_acreage' => $post['project_acreage'], 
				'project_price' => $post['project_price'], 
				'number_bedroom' => $post['number_bedroom'], 
				'number_tolet' => $post['number_tolet'], 
				'number_floors' => $post['number_floors'], 
				'number_units' => $post['number_units'], 
				'number_blocks' => $post['number_blocks'], 
				'project_extension' => implode(',', $post['project_extension']), 
				'project_furniture' => implode(',', $post['project_furniture']), 
				'project_residential' => $post['project_residential'], 
				'project_keyword' => $post['project_keyword'], 
				'project_description' => $post['project_description'], 
			);

			$this->Project_M->update(['project_id' => $id],$data_update);
			if (!empty($_FILES['project_images'])){
				$count_file = count($_FILES['project_images']['name']);
				for ($i = 0; $i < $count_file; $i++) {
					$file_images = $_FILES['project_images'];
					if (!empty($file_images['name'][$i])) {
					
						$filename_images = md5($file_images['name'][$i].time());
						$path='upload/images/'.$filename_images;
						move_uploaded_file($file_images['tmp_name'][$i],$path);

						$data_insert_images = array(
							'project_id' => $id, 
							'project_images' => $filename_images, 
						);

						$this->Project_Images_M->create($data_insert_images);
					}
				}


			}



			$status = array(
				'code'=>'success',
				'message'=>'Đã sửa'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/project/edit/'.$id),'location');

		}

		$list_category = $this->Category_M->all(['cate_module_id' => '2','cate_parent_id' => '0']);
		$list_province = $this->Province_M->all();
		$list_status = $this->Status_M->all();
		$list_type = $this->Type_M->all();
		$list_extension = $this->Extension_M->all();
		$list_furniture = $this->Furniture_M->all();
		$list_investor = $this->Investor_M->all();
		$list_residential = $this->Residential_M->all();
		$data['list_category'] = $list_category;
		$data['list_province'] = $list_province;
		$data['list_status'] = $list_status;
		$data['list_type'] = $list_type;
		$data['list_extension'] = $list_extension;
		$data['list_furniture'] = $list_furniture;
		$data['list_investor'] = $list_investor;
		$data['list_residential'] = $list_residential;
		$data['info_project'] = $info_project;
		$data['list_images'] = $list_images;
		$data['page_name']='Chỉnh sửa dự án';
		$data['page_menu']='project';
		$this->getHeader($data);
		$this->load->view('admin/pages/project/edit.php',$data);
		$this->getFooter();
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */