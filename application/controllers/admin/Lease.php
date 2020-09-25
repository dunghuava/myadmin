<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lease extends MY_Controller {

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
		$this->load->model('Staff_M');
		
	}

	public function index()
	{
		$data['page_name']='Danh sách nhà đất cho thuê';
		$data['page_menu']='lease';
		$data['list_project']=$this->Project_M->all(['project_kind' => 2],'desc');
		$this->getHeader($data);
		$this->load->view('admin/pages/lease/index.php',$data);
		$this->getFooter();
	}

	public function add()
	{

		$post = $this->input->post();

		if ($this->input->post()) {

			$project_type_string = array();
			$project_type_number = array();
			foreach ($post['project_type'] as $item) {
				if (!is_numeric($item)){
					array_push($project_type_string, $item);
				}else{
					array_push($project_type_number, $item);
				}
			}
			
			if (!empty($project_type_string)) {
				foreach ($project_type_string as $type_string) {
					$data_insert_type = array('type_project' => $type_string, );
					$id_type_project = $this->Type_M->create($data_insert_type);
					array_push($project_type_number, $id_type_project);
				}
			}

			
			if (!empty($_FILES['project_img']['name'])){
				$file = $_FILES['project_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				move_uploaded_file($file['tmp_name'],$path);
			}

			if ($post['project_active'] == '') {
				$post['project_active'] = 0;
			}

			$url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCjwJQRCuf970OLe6UuBiMvg_DyYW2PL6Y&address=' . urlencode($post['project_address']) . '&sensor=true';
            $json = @file_get_contents($url);
            $position = json_decode($json);
            if ($position->status == "OK") {
                $lat = $position->results[0]->geometry->location->lat;
                $lng = $position->results[0]->geometry->location->lng;
                // $full_address = $position->results[0]->formatted_address;
                $district_name = $position->results[0]->address_components[count($position->results[0]->address_components) -3]->long_name;

               $district_name_format1 = preg_replace('/District/', 'Quận', $district_name);
                $district_name_format = preg_replace('/Thị xã /', '', $district_name_format1);

            } else {
                // $this->_data['error'] = 'Chúng tôi không tìm thấy địa chỉ này. Vui lòng nhập đúng địa chỉ';
                $lat = '';
                $lng = '';
                $district_name_format = '';
            }

            $info_district =$this->District_M->find_row(['district_name' => $district_name_format]);

            // 'project_category' => $post['project_category'], 

            if (!empty($post['project_furniture'])) {
            	$furniture = implode(',', $post['project_furniture']);
            }else{
            	$furniture = '';
            }

            $project_introduce = preg_replace('/h>|h1>|h2>|h3>|h4>|em>/', 'p>', $post['project_introduce']);

            $output = preg_replace('/text-align:center;/', '', $project_introduce);

            $address_format = preg_replace('/, Việt Nam|, Vietnam/', '', $post['project_address']);


			$data_insert = array(
				'project_category' => $post['project_category'], 
				'project_kind' => 2, 
				'project_title' => $post['project_title'], 
				'project_alias' => $post['project_alias'], 
				'project_introduce_short' => $post['project_introduce_short'], 
				'project_introduce' => $project_introduce, 
				'project_img' => $filename, 
				// 'project_content' => $post['project_content'], 
				'project_highlights' => 0, 
				'project_active' => $post['project_active'], 
				'project_address' => $address_format, 
				'project_province_id' => '', 
				'project_district_id' => $info_district['district_id'], 
				'project_ward_id' => '', 
				'project_lat' => $lat, 
				'project_lng' => $lng, 
				'project_stt' => '', 
				'project_investor' => '', 
				'project_status' => '', 
				'project_type' => implode(',', $project_type_number), 
				'project_acreage' => $post['project_acreage'], 
				'project_price' => $post['project_price'], 
				'number_bedroom' => $post['number_bedroom'], 
				'number_tolet' => $post['number_tolet'], 
				'number_floors' => $post['number_floors'], 
				'number_units' => 0, 
				'number_blocks' => 0, 
				'project_extension' => implode(',', $post['project_extension']), 
				'project_furniture' => $furniture, 
				'project_residential' => $post['project_residential'], 
				'project_price_lease' => '', 
				'project_delivery_time' => '', 
				'project_building_density' => '', 
				'project_handing_over' => '', 
				'project_direction' => $post['project_direction'], 
				'project_view' => $post['project_view'], 
				'in_project' => $post['in_project'], 
				'staff_in_charge' => $post['staff_in_charge'], 
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
			redirect(base_url('admin/lease/add/'),'location');

		}

		$data['list_project']=$this->Project_M->all(['project_kind' => 0],'desc');

		$list_category = $this->get_option_category(2);
		$list_province = $this->Province_M->all();
		$list_status = $this->Status_M->all();
		$list_type = $this->Type_M->all();
		$list_extension = $this->Extension_M->all();
		$list_furniture = $this->Furniture_M->all();
		$list_investor = $this->Investor_M->all();
		$list_residential = $this->Residential_M->all();
		$list_staff = $this->Staff_M->all(['staff_active' => 1]);
		$data['list_staff'] = $list_staff;
		$data['list_category'] = $list_category;
		$data['list_province'] = $list_province;
		$data['list_status'] = $list_status;
		$data['list_type'] = $list_type;
		$data['list_extension'] = $list_extension;
		$data['list_furniture'] = $list_furniture;
		$data['list_investor'] = $list_investor;
		$data['list_residential'] = $list_residential;
		$data['page_name']='Thêm nhà đất cho thuê';
		$data['page_menu']='lease';
		$this->getHeader($data);
		$this->load->view('admin/pages/lease/add.php',$data);
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

			
			$project_type_string = array();
			$project_type_number = array();
			foreach ($post['project_type'] as $item) {
				if (!is_numeric($item)){
					array_push($project_type_string, $item);
				}else{
					array_push($project_type_number, $item);
				}
			}
			if (!empty($project_type_string)) {
				foreach ($project_type_string as $type_string) {
					$data_insert_type = array('type_project' => $type_string, );
					$id_type_project = $this->Type_M->create($data_insert_type);
					array_push($project_type_number, $id_type_project);
				}
			}

            

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

			$url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCjwJQRCuf970OLe6UuBiMvg_DyYW2PL6Y&address=' . urlencode($post['project_address']) . '&sensor=true';
            $json = @file_get_contents($url);
            $position = json_decode($json);
            if ($position->status == "OK") {
                $lat = $position->results[0]->geometry->location->lat;
                $lng = $position->results[0]->geometry->location->lng;
                // $full_address = $position->results[0]->formatted_address;
                $district_name = $position->results[0]->address_components[count($position->results[0]->address_components) -3]->long_name;

                $district_name_format1 = preg_replace('/District/', 'Quận', $district_name);
                $district_name_format = preg_replace('/Thị xã /', '', $district_name_format1);

            } else {
                // $this->_data['error'] = 'Chúng tôi không tìm thấy địa chỉ này. Vui lòng nhập đúng địa chỉ';
                $lat = '';
                $lng = '';
                $district_name_format = '';
            }

            $info_district =$this->District_M->find_row(['district_name' => $district_name_format]);

            if (!empty($post['project_furniture'])) {
            	$furniture = implode(',', $post['project_furniture']);
            }else{
            	$furniture = '';
            }

            $project_introduce = preg_replace('/h>|h1>|h2>|h3>|h4>|em>/', 'p>', $post['project_introduce']);
            $output = preg_replace('/text-align:center;/', '', $project_introduce);

            $address_format = preg_replace('/, Việt Nam|, Vietnam/', '', $post['project_address']);

            
			$data_update = array(
				'project_category' => $post['project_category'], 
				'project_kind' => 2, 
				'project_title' => $post['project_title'], 
				'project_alias' => $post['project_alias'], 
				'project_introduce_short' => $post['project_introduce_short'], 
				'project_introduce' => $project_introduce, 
				'project_img' => $filename, 
				// 'project_content' => $post['project_content'], 
				'project_active' => $post['project_active'], 
				'project_address' => $address_format, 
				'project_province_id' => '', 
				'project_district_id' => $info_district['district_id'], 
				'project_ward_id' => '', 
				'project_lat' => $lat, 
				'project_lng' => $lng, 
				'project_investor' => $post['project_investor'], 
				'project_status' => $post['project_status'], 
				'project_type' => implode(',', $project_type_number), 
				'project_acreage' => $post['project_acreage'], 
				'project_price' => $post['project_price'], 
				'number_bedroom' => $post['number_bedroom'], 
				'number_tolet' => $post['number_tolet'], 
				'number_floors' => $post['number_floors'], 
				'number_units' => 0, 
				'number_blocks' => 0, 
				'project_extension' => implode(',', $post['project_extension']), 
				'project_furniture' => $furniture, 
				'project_residential' => $post['project_residential'], 
				'project_price_lease' => '', 
				'project_delivery_time' => '', 
				'project_building_density' => '', 
				'project_handing_over' => '', 
				'project_direction' => $post['project_direction'], 
				'project_view' => $post['project_view'], 
				'in_project' => $post['in_project'], 
				'staff_in_charge' => $post['staff_in_charge'], 
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
			redirect(base_url('admin/lease/edit/'.$id),'location');

		}

		$data['list_project']=$this->Project_M->all(['project_kind' => 0],'desc');

		$list_category = $this->get_option_category(2);
		$list_province = $this->Province_M->all();
		$list_status = $this->Status_M->all();
		$list_type = $this->Type_M->all();
		$list_extension = $this->Extension_M->all();
		$list_furniture = $this->Furniture_M->all();
		$list_investor = $this->Investor_M->all();
		$list_residential = $this->Residential_M->all();
		$list_staff = $this->Staff_M->all(['staff_active' => 1]);
		$data['list_staff'] = $list_staff;
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
		$data['page_name']='Chỉnh sửa nhà đất cho thuê';
		$data['page_menu']='lease';
		$this->getHeader($data);
		$this->load->view('admin/pages/lease/edit.php',$data);
		$this->getFooter();
	}


	public function get_option_category($cate_module_id=0){
		$where['cate_parent_id']=0;
		if ($cate_module_id!=0){
			$where['cate_module_id']=$cate_module_id;
			$where['cate_id']=43;
		}
		$oder_by= 'asc';
		$all = $this->Category_M->all($where,$oder_by);
		$str='';
		foreach ($all as $val){
			// $str.='<option value="'.$val['cate_id'].'">'.$val['cate_title'].'</option>';
			$sub1 = $this->Category_M->all(['cate_parent_id'=>$val['cate_id'],'cate_module_id'=>$cate_module_id],$oder_by);
			if (count($sub1) >0){
				foreach ($sub1 as $val1){
					$str.='<option value="'.$val1['cate_id'].'">|__'.$val1['cate_title'].'</option>';
					$sub2 = $this->Category_M->all(['cate_parent_id'=>$val1['cate_id'],'cate_module_id'=>$cate_module_id],$oder_by);
					if (count($sub2) >0){
						foreach ($sub2 as $val2){
							$str.='<option value="'.$val2['cate_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$val2['cate_title'].'</option>';
							$sub3 = $this->Category_M->all(['cate_parent_id'=>$val2['cate_id'],'cate_module_id'=>$cate_module_id],$oder_by);
							if (count($sub3) >0){
								foreach ($sub3 as $val3){
									$str.='<option value="'.$val3['cate_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$val3['cate_title'].'</option>';
									$sub4 = $this->Category_M->all(['cate_parent_id'=>$val3['cate_id'],'cate_module_id'=>$cate_module_id],$oder_by);
									if (count($sub4) >0){
										foreach ($sub4 as $val4){
											$str.='<option value="'.$val4['cate_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$val4['cate_title'].'</option>';
										}
									}
								}
							}
						}
					}
				}
			}
		}
		return $str;
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */