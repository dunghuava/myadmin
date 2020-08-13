<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_M');
        $this->load->model('Slide_M');
        
    }
    public function page_post_list($alias=null){
        $this->page_header();
        $this->view('web/tintuc-list');
        $this->page_footer();
    }
    public function page_index(){
        $this->page_header();
        $this->view('web/index');
        $this->page_footer();
    }
    public function page_post_detail($alias=null){
        $this->page_header();
        $this->view('web/tintuc-detail');
        $this->page_footer();
    }
    public function page_khudancu_detail($alias=null){
        $this->page_header();
        $this->view('web/khudancu-detail');
        $this->page_footer();
    }
    public function page_khudancu_all($alias=null){
        $this->page_header();
        $this->view('web/khudancu-all');
        $this->page_footer();
    }
    public function page_categories($alias=null){
        $this->page_header();
        $this->view('web/tintuc-list');
        $this->page_footer();
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
}