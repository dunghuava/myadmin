<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index($alias=null){
        $this->page_chudautu_list();
    }

    public function page_index($alias=null){
        $this->page_header();
        $this->view('web/index');
        $this->page_footer();
    }
    public function page_post_detail($alias=null){
        $this->page_header();
        $this->view('web/post-detail');
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
    public function page_chudautu_list($alias=null){
        $this->page_header();
        $this->view('web/chudautu-list');
        $this->page_footer();
    }
    public function page_project_detail($alias=null){
        $this->page_header();
        $this->view('web/project-detail');
        $this->page_footer();
    }
}