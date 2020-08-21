<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends MY_Controller {

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
    
    public function page_post_list($cate){

        $data['arr_post']=$this->Post_M->all(['post_category_id'=>$cate['cate_id']]);
        $data['cate']=$cate;
        $this->page_header();
        $this->view('web/tintuc-list',$data);
        $this->page_footer();
    }
    public function page_index(){
        $this->page_header();
        $data['list_investor'] = $this->Investor_M->getListInvestor();
        $data['list_residential'] = $this->Residential_M->getListResidential();

        $data['duan_region'] = $this->Region_M->getListRegion_byCategory(25);
        $data['mua_region'] = $this->Region_M->getListRegion_byCategory(35);
        $data['thue_region'] = $this->Region_M->getListRegion_byCategory(43);

        $data['list_post'] = $this->Post_M->getListPost_byCategory(11,4);

        $data['tuvanluat'] = $this->Post_M->getListPost_byCategory(18,5);

        $data['blog'] = $this->Post_M->getListPost_byCategory(14,5);

        $tinmuanha = $this->Post_M->getListPost_byCategory(16,3);

        $tinbannha = $this->Post_M->getListPost_byCategory(17,3);

        $tin_mua_ban = [];

        foreach ($tinmuanha as $key => $tin_mua) {
            $tin_mua_ban[] = [
                "created_at" => $tin_mua['created_at'],
                "post_img" => $tin_mua['post_img'],
                "post_title" => $tin_mua['post_title'],
                "post_alias" => $tin_mua['post_alias'],
                "post_id" => $tin_mua['post_id'],
            ];
        }

        foreach ($tinbannha as $key => $tin_ban) {
            $tin_mua_ban[] = [
                "created_at" => $tin_ban['created_at'],
                "post_img" => $tin_ban['post_img'],
                "post_title" => $tin_ban['post_title'],
                "post_alias" => $tin_ban['post_alias'],
                "post_id" => $tin_ban['post_id'],
            ];
        }

        sort($tin_mua_ban);

        $data['tin_mua_ban'] = $tin_mua_ban;

        $data['list_du_an']= $this->Project_M->getListProject(['project_kind'=>0],6);

        $data['list_mua']= $this->Project_M->getListProject(['project_kind'=>1],6);

        $data['list_thue']= $this->Project_M->getListProject(['project_kind'=>2],6);

        $this->view('web/index',$data);
        $this->page_footer();
    }
    public function page_post_detail($alias=null){
        $post_id = getID($alias);
        $data['post']=$this->Post_M->find_row(['post_id'=>$post_id]);

        $data['post_involve']=$this->Post_M->getListPost_Involve($post_id,$data['post']['post_category_id'],10);
        $this->page_header();
        $this->view('web/tintuc-detail',$data);
        $this->page_footer();
    }
    public function page_khudancu_detail($alias=null){
        $kdc_id = getID($alias);
        $data['kdc']= $this->Residential_M->find_row(['residential_id'=>$kdc_id]);

        $data['list_mua']= $this->Project_M->getListProject(['project_residential'=>$data['kdc']['residential_id'],'project_kind'=>1],6);

        $data['list_thue']= $this->Project_M->getListProject(['project_residential'=>$data['kdc']['residential_id'],'project_kind'=>2],6);
        
        $this->page_header();
        $this->view('web/khudancu-detail',$data);
        $this->page_footer();
    }
    public function page_khudancu_all($alias=null){

        $data['arr_kdc']=$this->Residential_M->all('','desc');
        $this->page_header();
        $this->view('web/khudancu-all',$data);
        $this->page_footer();
    }
    public function page_categories($alias=null){
        
       $cate = $this->Category_M->all(['cate_alias'=>$alias])[0];
       if ($cate['cate_module_id']==1){
           // tin tức
           $this->page_post_list($cate);
       }else if ($cate['cate_module_id']==2){
           // dự án
           $this->page_project_list($cate);
       }else if ($cate['cate_module_id']==4){
           // đăng nhập
           $this->page_user_login();
       }

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
        $this->view('web/user-login');
        $this->page_footer();
    }
    public function page_user_reset(){
        $data['title']='Quyên mật khẩu';
        $this->page_header($data);
        $this->view('web/user-reset');
    }
    public function page_user_register(){
        $data['title']='Đăng ký tài khoản';
        $this->page_header($data);
        $this->view('web/user-register');
        $this->page_footer();
    }
    public function page_chudautu_list($alias=null){
        $this->page_header();
        $data['list_investor']=$this->Investor_M->all(['investor_active'=>1]);
        $this->view('web/chudautu-list',$data);
        $this->page_footer();
    }
    public function page_project_detail($alias=null){
        $duan_id = getID($alias);
        $data['duan']=$this->Project_M->find_row(['project_id'=>$duan_id]);
        $id_loai = $data['duan']['project_category'];
        $data['duan_lancan']= $this->Project_M->getDuAnLanCan($duan_id,$id_loai);
        $data['tienich'] = $this->Project_M->getTienich($data['duan']['project_extension']);

        $this->page_header();
        if ($data['duan']['project_kind']==0){
            // dự án
            $this->view('web/duan-detail',$data);
        }else{
            // mua
            $this->view('web/mua-detail',$data);
        }
        $this->page_footer();
    }
    public function page_project_list($cate=null){
        $data['cate_id']=$cate['cate_id'];
        $this->page_header();
        $this->view('web/duan-list',$data);
        //$this->page_footer();
    }
    public function searchApi(){
        $post = $this->input->post('data');
        $project_category=$post['project_category'];
        $project_title=$post['project_title'];

        $info_category = $this->Category_M->find_row(['cate_id'=>$project_category]);

        $cate_parent_id = $info_category['cate_parent_id'];

        $arr_category = array();
        if ($cate_parent_id!=0) {
            array_push($arr_category, $project_category);
        }else{
            array_push($arr_category, $project_category);
            $list_cate_sub = $this->Category_M->all(['cate_parent_id'=>$project_category]);
            foreach ($list_cate_sub as $key => $sub) {
                array_push($arr_category, $sub['cate_id']);
            }
        }
        

        $search=array(
            'project_category'=>$project_category,
            'arr_category'=>$arr_category,
            'project_title'=>$project_title
        );


        $arr_project= $this->Project_M->searchApi($search);

        $project_locate=array();
        foreach ($arr_project as $item){
            $project_locate []=array(
                'title'=>$item['project_title'],
                'lat'=>$item['project_lat'],
                'lng'=>$item['project_lng']
            );
        }
        $data['arr_project']=$arr_project;
        $data['project_locate']=$project_locate;
        $data['data_html']= $this->load->view('web/duan-item-h', $data,true);
        echo json_encode($data);
    }
    public function page_chudautu_detail($alias=null){

        $cdt_id = getID($alias);
        $data['cdt']=$this->Investor_M->find_row(['investor_id'=>$cdt_id]);
        $data['list_investor'] = $this->Investor_M->getListInvestor();
        $data['arr_project']   = $this->Project_M->all(['project_investor'=>$cdt_id,'project_kind'=>'0']);
        $this->page_header();
        $this->view('web/chudautu-detail',$data);
        $this->page_footer();
    }


    public function addContact()
    {
        $post = $this->input->post();

        $data_insert = array(
            'contact_name' => $post['contact_name'],
            'contact_phone' => $post['contact_phone'], 
            'contact_email' => $post['contact_email'], 
            'contact_info' => $post['contact_info'], 
            'contact_title' => $post['contact_title'], 
            'contact_status' => 0, 
            
        );

        $this->Contact_M->create($data_insert);
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
    public function livesearch(){
        $query = $this->input->post('query');
        $data['data_html']='';
        $result = $this->Project_M->livesearch($query);
        $html='';
        if (!empty($result)){
            foreach ($result as $item){
                $info_province = $this->Province_M->find_row(['province_id'=>$item['project_province_id']]);
                $info_district = $this->District_M->find_row(['district_id'=>$item['project_district_id']]);
                $info_ward = $this->Ward_M->find_row(['ward_id'=>$item['project_ward_id']]);
                $address = $info_ward['ward_prefix'].'&nbsp;'.$info_ward['ward_name'].', '.$info_district['district_name'].', '.$info_province['province_name'];
                $html.='<li>
                            <a style="text-decoration:none" title="'.$item['project_title'].'" 
                                href="'.base_url().'chi-tiet-du-an/'.$item['project_alias'].'-'.$item['project_id'].'">'.$item['project_title'].' - <i class="font_small">'.$address.'</i>
                            </a>
                        </li>';
            }
        }
        $data['data_html']=$html;
        echo json_encode($data);

    }
}