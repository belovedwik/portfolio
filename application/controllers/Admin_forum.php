<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/controllers/BaseAdminController.php';

class Admin_forum extends BaseAdminController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn(); 
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->load->view('admin', $this->data);
    }
    
    public function add(){
            
        $this->form_validation->set_rules('forum_title','Title','trim|required|max_length[128]');
        $this->form_validation->set_rules('forum_text','Text','trim|required|min_length[3]');
        
        echo validation_errors();
        
        if($this->form_validation->run() == FALSE)
        {  
           // $this->load->view('admin', $this->data);
        }
        else
        {
            $autorId = $this->global['userId'];
            $title = ucwords(strtolower($this->security->xss_clean($this->input->post('forum_title'))));
            $title_en = $this->base_model->rus2translit($title);
            $text = $this->security->xss_clean($this->input->post('forum_text'));
            $catId = $this->input->post('forum_section');
            $image = $this->input->post('forum_img');
            $this->admin_model->forum_add($autorId, $title, $title_en, $text, $image, $catId, date("Y-m-d H:i:s"));
        }
        
    }
    
    public function del($id)
    {
        $this->admin_model->forum_del($id);
        redirect(adminPath);
    }
   
}

?>