<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

require_once APPPATH . 'controllers/BaseController.php';

class BaseAdminController extends BaseController {
	
     public function __construct(){
       parent::__construct();
       // $this ->load-> library('form_validation');
       // this->load->model('admin_model');
     }
    
    
    protected function deleteRow()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $rowId = $this->input->post('rowId');
         
            $result = $this->admin_model->deleteRow($rowId);
            
            echo(json_encode(array('status'=>$result))); 
        
        }
    }
    
    protected function updateFields($variables, $id, $pageType)
    {
        $this->load->library('form_validation');
    
        foreach ($variables as $k=>$val)
        {
            $this->form_validation->set_rules($k, $val[0], $val[1]);
        }
   
        if($this->form_validation->run() != FALSE)
        {
            $short_text = $this->input->post('short_text');
            
            $data = array('updateDT'=>date('Y-m-d H:i:s'));
            foreach ($variables as $k=>$val)
            {
                $data[$k] = $this->input->post($k); 
            }
            $this->admin_model->updatePage($id, $data);
            
            $this->session->set_flashdata('success', 'Data updated!');
            
            redirect( adminPath . '/'. $pageType);
         }
    }
    
    /*
    public function forum_add()
    {
        $autorId = $this->global['userId'];
        $title = ucwords(strtolower($this->security->xss_clean($this->input->post('title'))));
        $link =$this->input->post('link');
        if (!$link)
            $link = $this->base_model->rus2translit($title);
        $text = $this->security->xss_clean($this->input->post('text'));
        $parentId = $this->input->post('parentId');
        
        $image = UploadImage();
        
        $forumId = $this->admin_model->forum_add($autorId, $title, $link, $text, $image, $parentId, date("Y-m-d H:i:s"));
    }
    */
    
    public function UploadImage($fileName, $width = 350, $height = 350, $folder = '')
    {
        $config['upload_path']      = './images/'.$folder;
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']    = $fileName;
        $this->load->library('upload', $config);
        $imgLink = "";
        
        if($this->upload->do_upload('upload_file', $config)) //load image
        {
            $fInfo = $this->upload->data(); // get all info of uploaded file

            $img_array = array();
            $img_array['image_library'] = 'gd2';
            $img_array['thumb_marker'] = '_s'; 
            $img_array['create_thumb'] = TRUE; // ставим флаг создания эскиза
            $img_array['maintain_ratio'] = TRUE; // сохранять пропорции
            $img_array['width'] = $width; // и задаем размеры
            $img_array['height'] = $height; 
            //you need this setting to tell the image lib which image to process
            $img_array['source_image'] = $fInfo['full_path'];
            $this->load->library('image_lib', $img_array);
            $this->image_lib->resize();

            $imgInfo = $this->upload->data();
            $imgLink = $imgInfo['file_name'];
        }
        return $imgLink;
    }
	
}