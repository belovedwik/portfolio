<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . '/controllers/BaseAdminController.php';

class Admin_editor extends BaseAdminController
{
    
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->data['menu'] = $this->admin_model->getMenu();
    }

    public function up($id)
    { 
        $this->admin_model->move_menu($id, '<');
        redirect('/');
    }
    
    public function down($id)
    { 
        $this->admin_model->move_menu($id, '>');
        redirect('/');
    }
    
    public function add($catType, $parentId = 0)
    {
        $back = @$_SERVER['HTTP_REFERER'];
        $this->data['content'] = (object)[
             "title" => '',
              "text" => '',
              "link" => '',
              "image" => '',
              "catType" => $catType,
              "parentId" => $parentId,
        ];
        
        $view = 'edit';
        switch($catType)
        {
            case "onNotes":
                
                break;
            case "forum":
                
                $this->Admin_forum->add();
                break;
        }
        
        $this->data['back'] =  $back;
        $this->load->view('edit', $this->data); 
            
    }
    
    public function edit($id, $type = '')
    { 
        $save = $this->input->post('action');
        $back = @$_SERVER['HTTP_REFERER'];
        if ($save)
        {
            $link = $this->input->post('link');
            $title = $this->input->post('title');
            $back = $this->input->post('back');
            
            if (!$link)
                $link = $this->base_model->rus2translit($title);
            
            $imgLink = $this->UploadImage('forum_'.$id);
            
            if ($type == 'forum') 
            {
                $saveData = array(
                    "title" => $this->input->post('title'),
                    "text" => $this->input->post('text'),
                    "link" => $link,
                    "parentId" => $this->input->post('parentId'),
                ); 
               
            } 
            else 
            {
                $saveData = array(
                    "title" => $this->input->post('title'),
                    "text" => $this->input->post('text'),
                    "link" => $link,
                    "catType" => $this->input->post('catType'),
                    "parentId" => $this->input->post('parentId'),
                ); 
            }
            
            if ($imgLink)
                $saveData["image"] = $imgLink;
            
            $tableName = $type == 'forum' ? 'tbl_forum' : 'tbl_Category';
            $this->admin_model->updateData($id, $saveData, $tableName);
            redirect($back);
        }
   
        $this->data['back'] =  $back;
        $this->data['type'] =  $type;
        
        if ($type == 'forum')
        {
            $this->data['content'] = $this->admin_model->getMenuById($id, 'tbl_forum');
            $this->load->view('edit.forum.php', $this->data);
        } 
        else
        {
            $this->data['content'] = $this->admin_model->getMenuById($id);
            $this->load->view('edit', $this->data); 
        }
         
    }
    
    public function delete($id, $catType)
    { 
        $back = @$_SERVER['HTTP_REFERER'];
        switch($catType)
        {
            case "forum":
                $this->admin_model->forum_del($id);
                break;
            default:
                echo "delete $id $catType ";
        }
        redirect($back);
        
    }
    
    public function index1()
    {
        $userId = $this->global['userId'];
        $this->data['userStats'] = $this->admin_model->userStats();
        $this->data['userChilds'] = $this->admin_model->getChild($userId);
        $this->data['forums'] = $this->base_model->getForums(3,"createDT DESC"); // order by
        $this->data['forumCategories'] = $this->base_model->getForumCategories();
        $this->data['users'] = $this->admin_model->getUsers();
        $this->load->view('admin', $this->data);
    }
    
   
}

?>