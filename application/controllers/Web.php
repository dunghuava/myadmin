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
        $this->page_header();
        $this->view('web/tintuc-detail',$data);
        $this->page_footer();
    }
    public function page_khudancu_detail($alias=null){
        $kdc_id = getID($alias);
        $data['kdc']= $this->Residential_M->find_row(['residential_id'=>$kdc_id]);

        $data['list_mua']= $this->Project_M->getListProject(['project_residential'=>$data['kdc']['residential_id'],'project_kind'=>1],3);

        $data['list_thue']= $this->Project_M->getListProject(['project_residential'=>$data['kdc']['residential_id'],'project_kind'=>2],3);
        
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
       }

    }
    public function page_chudautu_list($alias=null){
        $this->page_header();
        $this->view('web/chudautu-list');
        $this->page_footer();
    }
    public function page_project_detail($alias=null){
        $this->page_header();
        $this->view('web/duan-detail');
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
        $search=array(
            'project_category'=>$project_category,
            'project_title'=>$project_title
        );
        $data['arr_project']= $this->Project_M->searchApi($search);
        $this->load->view('web/duan-item', $data);
    }
    public function page_chudautu_detail($alias=null){

        $cdt_id = getID($alias);
        $data['cdt']=$this->Investor_M->find_row(['investor_id'=>$cdt_id]);
        $data['list_investor'] = $this->Investor_M->getListInvestor();
        $data['arr_project']   = $this->Project_M->all(['project_investor'=>$cdt_id]);
        $this->page_header();
        $this->view('web/chudautu-detail',$data);
        $this->page_footer();
    }
}