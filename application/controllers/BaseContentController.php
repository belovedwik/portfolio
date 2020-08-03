<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

require_once APPPATH . '/controllers/BaseController.php';


class BaseContentController extends BaseController {
	
     public function __construct(){
        parent::__construct();
        $this->load->model('content_model');
        $this->load->library('breadcrumbs');
     }
}