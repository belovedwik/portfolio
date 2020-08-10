<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/controllers/BaseContentController.php';

class main extends BaseContentController
{ 
    protected $page_segmetns = array();
    
    public function __construct()
    {
        parent::__construct();
        $this->data['template_name'] = 'main.php';
        $this->data['page_title'] = '';
    }

    /**
     * Index Page for this controller.
     */
    public function index($lang = '')
    {
       /*
            $page_info = (object) ['id' => 0, 'catType' => ''];  
            $this->data['page_title'] = $page_info->title;
            $this->breadcrumbs->push('На главную', '/');
            $this->breadcrumbs->push($page_info->title, '/'.$page);
            $this->page_segmetns[] = $page_info->link;
        */
        
        $base_lang = 'en';
            
        $lang_arr = array("en", 'ua', 'ru');
        if (in_array($lang, $lang_arr))
            $base_lang = $lang;
        
        $this->lang->load('content',$base_lang);
        $this->session->set_userdata('lng', $base_lang);
        
        $this->data['about'] = $this->content_model->getPage('about');
        $this->data['services'] = $this->content_model->getPage('services');
        $this->data['servicesIcons'] = $this->content_model->getPage('services', $this->data['services']->id, 30);
        $this->data['project'] = $this->content_model->getPage('projects');
        $this->data['projectsImg'] = $this->content_model->getPage('projects', $this->data['project']->id, 30);
        $this->data['freelance'] = $this->content_model->getPage('freelance');
        $this->data['review'] = $this->content_model->getPage('reviews');
        $this->data['reviewsList'] = $this->content_model->getPage('reviews', $this->data['review']->id, 30);
        $this->data['news'] = $this->content_model->getPage('news');
        $this->data['newsList'] = $this->content_model->getPage('news', $this->data['news']->id, 30);
        $this->data['contact'] = $this->content_model->getPage('contact');

      
        $this->load->view('index', $this->data);
    }
    

   
}

?>