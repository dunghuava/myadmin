<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index($alias=null){
        $this->page_post_detail();
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
}