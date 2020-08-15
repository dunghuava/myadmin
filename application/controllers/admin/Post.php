<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_M');
		$this->load->model('Category_M');
	}

	public function index()
	{
		$data['page_name']='Danh sách bài viết';
		$data['page_menu']='post';
		$data['list_post']=$this->Post_M->all();
		$this->getHeader($data);
		$this->load->view('admin/pages/post/index.php',$data);
		$this->getFooter();
	}

	public function add()
	{

		$post = $this->input->post();

		if ($this->input->post()) {
			if (isset($_FILES['post_img']['name'])){
				$file = $_FILES['post_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				move_uploaded_file($file['tmp_name'],$path);
			}

			if ($post['post_active'] == '') {
				$post['post_active'] = 0;
			}

			

			$date_post_format = substr($post['date_post'],  6, 4). substr($post['date_post'],  3, 2).substr($post['date_post'],  0, 2);
			$date_time = $date_post_format.$post['time_post'];

			$data_insert = array(
				'post_category_id' => $post['post_category_id'], 
				'post_title' => $post['post_title'], 
				'post_alias' => $post['post_alias'], 
				'post_introduce' => $post['post_introduce'], 
				'post_content' => $post['post_content'], 
				'post_keyword' => $post['post_keyword'], 
				'post_description' => $post['post_description'], 
				'post_highlights' => 0, 
				'post_active' => $post['post_active'], 
				'post_date_time' => $date_time,
				'post_img' => $filename, 
			);

			$this->Post_M->create($data_insert);

			$status = array(
				'code'=>'success',
				'message'=>'Đã lưu'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/post/add/'),'location');

		}
		
		$list_category = $this->get_option_category(1);

		// print_r($list_category);die();
		$data['list_category'] = $list_category;
		$data['page_name']='Thêm bài viết';
		$data['page_menu']='post';
		$this->getHeader($data);
		$this->load->view('admin/pages/post/add.php',$data);
		$this->getFooter();
	}

	public function edit($id)
	{
		$info_post = $this->Post_M->find_row(['post_id' => $id]);

		$post = $this->input->post();

		if ($this->input->post()) {
			if (!empty($_FILES['post_img']['name'])){
				$file = $_FILES['post_img'];
				$filename = md5($file['name'].time());
				$path='upload/images/'.$filename;
				move_uploaded_file($file['tmp_name'],$path);
				@unlink('upload/images/'.$info_post['post_img']);

			}else{
				$filename = $info_post['post_img'];
			}

			if ($post['post_active'] == '') {
				$post['post_active'] = 0;
			}

			

			$date_post_format = substr($post['date_post'],  6, 4). substr($post['date_post'],  3, 2).substr($post['date_post'],  0, 2);
			$date_time = $date_post_format.$post['time_post'];

			$data_update = array(
				'post_category_id' => $post['post_category_id'], 
				'post_title' => $post['post_title'], 
				'post_alias' => $post['post_alias'], 
				'post_introduce' => $post['post_introduce'], 
				'post_content' => $post['post_content'], 
				'post_keyword' => $post['post_keyword'], 
				'post_description' => $post['post_description'], 
				'post_active' => $post['post_active'], 
				'post_date_time' => $date_time,
				'post_img' => $filename, 
			);

			$this->Post_M->update(['post_id' => $id],$data_update);

			$status = array(
				'code'=>'success',
				'message'=>'Đã sửa'
			);
			$this->session->set_flashdata('reponse',$status);
			redirect(base_url('admin/post/edit/'.$id),'location');

		}

		$list_category = $this->get_option_category(1);
		$info_post = $this->Post_M->find_row(['post_id' => $id]);
		$data['list_category'] = $list_category;
		$data['info_post'] = $info_post;
		$data['page_name']='Chỉnh sửa bài viết';
		$data['page_menu']='post';
		$this->getHeader($data);
		$this->load->view('admin/pages/post/edit.php',$data);
		$this->getFooter();
	}

	public function update(){
		$post = $this->input->post();
		$this->Post_M->update(['post_id'=>$post['post_id']],$post);
	}

	public function destroy()
	{
		$post_id = $this->input->post('post_id');
		$this->Post_M->delete(['post_id' => $post_id]);
		$status = array(
				'code'=>'success',
				'message'=>'Đã xóa'
			);
		$this->session->set_flashdata('reponse',$status);
	}

	public function get_option_category($cate_module_id=0){
		$where['cate_parent_id']=0;
		// if ($cate_module_id!=0){
		// 	$where['cate_module_id']=$cate_module_id;
		// }
		$oder_by['cate_stt']= 'asc';
		$all = $this->Category_M->all($where,$oder_by);
		$str='';
		foreach ($all as $val){
			if ($val['cate_module_id'] == $cate_module_id) {
				$str.='<option value="'.$val['cate_id'].'">'.$val['cate_title'].'</option>';
			}
			
			$sub1 = $this->Category_M->all(['cate_parent_id'=>$val['cate_id'],'cate_module_id'=> $cate_module_id],$oder_by);
			// echo'<pre>';
			// print_r($sub1);
			if (count($sub1) >0){
				foreach ($sub1 as $val1){
					$str.='<option value="'.$val1['cate_id'].'">|__'.$val1['cate_title'].'</option>';
					$sub2 = $this->Category_M->all(['cate_parent_id'=>$val1['cate_id'],'cate_module_id'=> $cate_module_id],$oder_by);
					if (count($sub2) >0){
						foreach ($sub2 as $val2){
							$str.='<option value="'.$val2['cate_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$val2['cate_title'].'</option>';
							$sub3 = $this->Category_M->all(['cate_parent_id'=>$val2['cate_id'],'cate_module_id'=> $cate_module_id],$oder_by);
							if (count($sub3) >0){
								foreach ($sub3 as $val3){
									$str.='<option value="'.$val3['cate_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$val3['cate_title'].'</option>';
									$sub4 = $this->Category_M->all(['cate_parent_id'=>$val3['cate_id'],'cate_module_id'=> $cate_module_id],$oder_by);
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