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

		}

		$list_category = $this->Category_M->all(['cate_module_id' => '2']);
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
		$list_district = $this->District_M->find(['province_id' => $province_id]);
		$html = '<option value="">Chọn Quận - Huyện</option>';
		foreach ($list_district as $value) {
			$html.= '<option value="'.$value['district_id'].'">'.$value['district_name'].'</option>';
		}

		echo $html;
	}
	public function getListWard_byDistrict()
	{
		$district_id = $this->input->post('district_id');
		$list_ward = $this->Ward_M->find(['district_id' => $district_id]);
		$html = '<option value="">Chọn Quận - Huyện</option>';
		foreach ($list_ward as $value) {
			$html.= '<option value="'.$value['ward_id'].'">'.$value['ward_name'].'</option>';
		}

		echo $html;
	}

	// public function edit($id)
	// {
	// 	$info_post = $this->Post_M->find_row(['post_id' => $id]);

	// 	$post = $this->input->post();

	// 	if ($this->input->post()) {
	// 		if (!empty($_FILES['post_img']['name'])){
	// 			$file = $_FILES['post_img'];
	// 			$filename = md5($file['name'].time());
	// 			$path='upload/images/'.$filename;
	// 			move_uploaded_file($file['tmp_name'],$path);
	// 			@unlink('upload/images/'.$info_post['post_img']);

	// 		}else{
	// 			$filename = $info_post['post_img'];
	// 		}

	// 		if ($post['post_active'] == '') {
	// 			$post['post_active'] = 0;
	// 		}

			

	// 		$date_post_format = substr($post['date_post'],  6, 4). substr($post['date_post'],  3, 2).substr($post['date_post'],  0, 2);
	// 		$date_time = $date_post_format.$post['time_post'];

	// 		$data_update = array(
	// 			'post_category_id' => $post['post_category_id'], 
	// 			'post_title' => $post['post_title'], 
	// 			'post_alias' => $post['post_alias'], 
	// 			'post_introduce' => $post['post_introduce'], 
	// 			'post_content' => $post['post_content'], 
	// 			'post_keyword' => $post['post_keyword'], 
	// 			'post_description' => $post['post_description'], 
	// 			'post_highlights' => 0, 
	// 			'post_active' => $post['post_active'], 
	// 			'post_date_time' => $date_time,
	// 			'post_img' => $filename, 
	// 		);

	// 		$this->Post_M->update(['post_id' => $id],$data_update);

	// 		$status = array(
	// 			'code'=>'success',
	// 			'message'=>'Đã sửa'
	// 		);
	// 		$this->session->set_flashdata('reponse',$status);

	// 	}

	// 	$list_category = $this->Category_M->all(['cate_module_id' => '1']);
	// 	$info_post = $this->Post_M->find_row(['post_id' => $id]);
	// 	$data['list_category'] = $list_category;
	// 	$data['info_post'] = $info_post;
	// 	$data['page_name']='Chỉnh sửa bài viết';
	// 	$data['page_menu']='post';
	// 	$this->getHeader($data);
	// 	$this->load->view('admin/pages/post/edit.php',$data);
	// 	$this->getFooter();
	// }

	// public function update(){
	// 	$post = $this->input->post();
	// 	$this->Post_M->update(['post_id'=>$post['post_id']],$post);
	// }

	// public function destroy()
	// {
	// 	$post_id = $this->input->post('post_id');
	// 	$this->Post_M->delete(['post_id' => $post_id]);
	// 	$status = array(
	// 			'code'=>'success',
	// 			'message'=>'Đã xóa'
	// 		);
	// 	$this->session->set_flashdata('reponse',$status);
	// }

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */