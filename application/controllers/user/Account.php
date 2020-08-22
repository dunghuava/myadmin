<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_M');
        $this->load->model('Slide_M');
        $this->load->model('Investor_M');
        $this->load->model('Residential_M');
        $this->load->model('Province_M');
        $this->load->model('District_M');
        $this->load->model('Ward_M');
        $this->load->model('Region_M');
        $this->load->model('Post_M');
        $this->load->model('Project_M');
        $this->load->model('Status_M');
        $this->load->model('Project_Images_M');
        $this->load->model('Contact_M');
        $this->load->model('Type_M');
        $this->load->model('Furniture_M');
        
    }
    
   
    public function page_user_login(){

        if ($this->session->has_userdata('user_data')){
            redirect(base_url(),'location');
        }
        $post = $this->input->post();
        if ($post){
            $user_name = $post['user_name'];
            $user_password = md5($post['user_password']);
            $is_login = $this->Account_M->CheckLogin($user_name,$user_password,0);
            if ($is_login){
                $infor = $this->Account_M->all(['user_name'=>$user_name,'is_admin'=>'0']);
                    // print_r($infor);die();
                $this->session->set_userdata('user_data', $infor[0] );
                redirect(base_url(),'location');
            }else{
                $this->session->set_flashdata('reponse','Tên đăng nhập hoặc mật khẩu không đúng.');
            }
        }

        $data['title']='Đăng nhập';
        $this->page_header($data);
        $this->view('user/pages/account/user-login');
        $this->page_footer();
    }
    public function page_user_reset(){
        if ($this->session->has_userdata('user_data')){
            redirect(base_url(),'location');
        }
        $data['title']='Quyên mật khẩu';
        $this->page_header($data);
        $this->view('user/pages/account/user-reset');
        $this->page_footer();
    }
    public function page_user_register(){
        if ($this->session->has_userdata('user_data')){
            redirect(base_url(),'location');
        }
        $data['title']='Đăng ký tài khoản';
        $this->page_header($data);
        $this->view('user/pages/account/user-register');
        $this->page_footer();
    }
   
    public function registerUser()
    {
        $post = $this->input->post();

        $data_insert = array(
            'user_fullname' => $post['user_fullname'],
            'user_email' => $post['user_email'], 
            'user_name' => $post['user_name'], 
            'user_password' => md5($post['user_password']), 
            'is_admin' => 0, 
            
        );

        $this->Account_M->create($data_insert);
    }

    public function logout(){
        $this->session->unset_userdata('user_data');
        redirect(base_url(),'location');
    }

    public function infoUser(){
        if (!$this->session->has_userdata('user_data')){
            redirect(base_url(),'location');
        }
        $this->user_data = $this->session->get_userdata('user_data');

        $user_id = $this->user_data['user_data']['user_id'];
        $infor_user = $this->Account_M->find_row(['user_id'=>$user_id]);

        $data['infor_user']= $infor_user;
        $data['title']='Thông tin tài khoản';
        $this->page_header($data);
        $this->view('user/pages/account/user-info');
        $this->page_footer();

    }

    public function UpdateUser()
    {
        $this->user_data = $this->session->get_userdata('user_data');

        $user_id = $this->user_data['user_data']['user_id'];
        $post = $this->input->post();

        $data_update = array(
            'user_fullname' => $post['user_fullname'],
            'user_email' => $post['user_email'], 
        );

        $this->Account_M->update(['user_id' => $user_id],$data_update);
    }

    public function UpdatePass()
    {
        $this->user_data = $this->session->get_userdata('user_data');

        $user_id = $this->user_data['user_data']['user_id'];
        $infor_user = $this->Account_M->find_row(['user_id'=>$user_id]);
        $post = $this->input->post();
        $user_password_curent = md5($post['user_password_curent']);

        if ($user_password_curent == $infor_user['user_password']) {
            $data_update = array(
                'user_password' => md5($post['user_password']),
            );
            $this->Account_M->update(['user_id' => $user_id],$data_update);
            echo "ok";
        }else{
            echo "error";
        }
    }

    public function resetPass()
    {
        
        $post = $this->input->post();
        $user_email = $post['user_email'];

        $infor_user = $this->Account_M->find_row(['user_email'=>$user_email]);

        if (!empty($infor_user)) {
            $new_password = $this->createPassword();
            $md5_password = md5($new_password);

            $data_update = array(
                'user_password' => $md5_password,
            );
            $this->Account_M->update(['user_id' => $infor_user['user_id']],$data_update);

            $this->_email['user_fullname'] = $infor_user['user_fullname'];
            $this->_email['new_password'] = $new_password;
            $email_template = $this->load->view('email_template/email_reset_pass.php',$this->_email,TRUE);
            send_mail($user_email,'[Gianha.vn] Cấp lại mật khẩu。',$email_template);
            echo "ok";
        }else{
            echo "error";
        }
    }

    private function createPassword($length = 8) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
    }
}