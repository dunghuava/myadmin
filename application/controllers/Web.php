<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index($alias=null){
        $this->page_home();
    }

    public function page_home($alias=null){
        $this->page_header();
        $this->view('web/index');
        $this->page_footer();
    }
}