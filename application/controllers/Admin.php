<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/controllers/BaseAdminController.php';
require APPPATH . '/controllers/AdminUsers.php';

class Admin extends BaseAdminController
{
    /**
     * This is default constructor of the class
     */
   // protected $isLogged = false;
    
    protected $mainTpl = "dashboard";
    
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->data['isLogged'] = true;
        $this->data['userinfo'] = $this -> global;
        $this->load->model('admin_model');
    }


    
    /**
     * Index Page for this controller.
     */
    public function index($page = '', $subpage = '', $id = 0)
    {
        $this->data['topPage'] = $page;
        
        // delete row
        if ($subpage == 'deleteRow')
        {
            $this->deleteRow($id);
            return;
        }

        switch($page)
        {
            case "contact": 
            {
                $this->data['pageTitle'] = 'Contact';
                $variables = array(
                    'header' => array('Header', 'trim|required|min_length[3]', 'text'),
                    'short_text' => array('Short Text', 'trim|required|min_length[20]', 'textarea'),
                );
                
                $this->SetupPage($page, $variables);
                 
                $this->loadViews('admin/builder', $this->data);
            }
            break;
            case "about": 
            {
                $this->data['pageTitle'] = 'About';
                $variables = array(
                    'header' => array('Header', 'trim|required|min_length[3]', 'text'),
                    'short_text' => array('Short Text', 'trim|required|min_length[20]', 'textarea'),
                    'name' => array('Specialization', 'trim|required|min_length[5]', 'text'),
                    'full_text' => array('Full Text', 'trim|required|min_length[20]', 'textarea'),
                );
                
                $this->SetupPage($page, $variables);
                 
                $this->loadViews('admin/builder', $this->data);
            }
            break;
            case "projects": 
            {
                // project desc
                $this->data['pageTitle'] = 'Projects';
                $variables = array(
                    'header' => array('Header', 'trim|required|min_length[3]', 'text'),
                    'short_text' => array('Project short text', 'trim|required|min_length[10]', 'textarea'),
                );
                $parentId = $this->SetupPage($page, $variables);
                
                // projects rows
                $this->data['pageSubTitle'] = 'Project Images';
                $this->data['act'] = 'view'; 
                $this->data['editRow'] = (object) array('id'=>null, 'name' => null, 'short_text' => null, 'image' => null, 'createDT' => date("Y-m-d") );
                
                if ($subpage == 'edit')
                {
                    $this->data['act'] = 'edit'; 
                    $this->data['editRow'] = $this->admin_model->getPageById($id);
                }
                
                $subFields = array(
                   'image' => array('Img', 'trim|xss_clean', 'img'),
                   'short_text' => array('Category', 'trim|required|min_length[3]', 'text'),
                   'name' => array('Title', 'trim|required|min_length[3]', 'text'),
                   'createDT' => array('Created On', 'trim|required|min_length[3]', 'date'),
                   );
                
                $imgSetting = array('fileName'=>'proj_', 'width' => 1000, 'height' => 600, 'folder' => 'projects/');
                $this->SetupRows($page, $subFields, $parentId, $imgSetting);
                
                $this->loadViews('admin/multiBuilder', $this->data);
            }
            break;
            case "services": 
            {
                // project desc
                $this->data['pageTitle'] = 'Services';
                $variables = array(
                    'header' => array('Header', 'trim|required|min_length[3]', 'text'),
                    'short_text' => array('Project short text', 'trim|required|min_length[10]', 'textarea'),
                );
                $parentId = $this->SetupPage($page, $variables);
                
                // service rows
                $this->data['pageSubTitle'] = 'Service row';
                $this->data['act'] = 'view'; 
                $this->data['editRow'] = (object) array('id'=>null, 'short_text' => null, 'name' => null, 'full_text' => null, 'createDT' => date("Y-m-d") );
                
                if ($subpage == 'edit')
                {
                    $this->data['act'] = 'edit'; 
                    $this->data['editRow'] = $this->admin_model->getPageById($id);
                }
                
                $subFields = array(
                   'short_text' => array('Icon class', 'trim|required|min_length[3]', 'text'),
                   'name' => array('Title', 'trim|required|min_length[3]', 'text'),
                   'full_text' => array('Short desc ', 'trim|xss_clean', 'text'),
                   'createDT' => array('Created On', 'trim|required|min_length[3]', 'date'),
                   );
                
                $this->SetupRows($page, $subFields, $parentId);
                
                $this->loadViews('admin/multiBuilder', $this->data);
            }
            break;
            case "reviews": 
            {
                // project desc
                $this->data['pageTitle'] = 'Reviews';
                $variables = array(
                    'header' => array('Header', 'trim|required|min_length[3]', 'text'),
                    'short_text' => array('Project short text', 'trim|required|min_length[10]', 'textarea'),
                );
                $parentId = $this->SetupPage($page, $variables);
                
                // service rows
                $this->data['pageSubTitle'] = 'Clients Review ';
                $this->data['act'] = 'view'; 
                $this->data['editRow'] = (object) array('id'=>null, 'short_text' => null, 'name' => null, 'header' => null, 'image' => null,  'createDT' => date("Y-m-d") );
                
                if ($subpage == 'edit')
                {
                    $this->data['act'] = 'edit'; 
                    $this->data['editRow'] = $this->admin_model->getPageById($id);
                }
                
                $subFields = array(
                   'short_text' => array('Client review', 'trim|required|min_length[10]', 'text'),
                   'name' => array('Client Name', 'trim|required|min_length[3]', 'text'),
                   'header' => array('Position', 'trim|required|min_length[3]', 'text'),
                   'image' => array('Client Pic', 'trim|xss_clean', 'img'),
                   'createDT' => array('Created On', 'trim|required|min_length[3]', 'date'),
                   );
                
                $imgSetting = array('fileName'=>'review_', 'width' => 100, 'height' => 80, 'folder' => 'review/');
                $this->SetupRows($page, $subFields, $parentId, $imgSetting);
                
                $this->loadViews('admin/multiBuilder', $this->data);
            }
            break;
            case "news": 
            {
                // project desc
                $this->data['pageTitle'] = 'News';
                $variables = array(
                    'header' => array('Header', 'trim|required|min_length[3]', 'text'),
                    'short_text' => array('Project short text', 'trim|required|min_length[10]', 'textarea'),
                );
                $parentId = $this->SetupPage($page, $variables);
                
                // service rows
                $this->data['pageSubTitle'] = 'News blocks';
                $this->data['act'] = 'view'; 
                $this->data['editRow'] = (object) array('id'=>null, 'short_text' => null, 'name' => null, 'image' => null,  'createDT' => date("Y-m-d") );
                
                if ($subpage == 'edit')
                {
                    $this->data['act'] = 'edit'; 
                    $this->data['editRow'] = $this->admin_model->getPageById($id);
                }
                
                $subFields = array(
                   'short_text' => array('Short text', 'trim|required|min_length[10]', 'text'),
                   'name' => array('Title', 'trim|required|min_length[3]', 'text'),
                   'image' => array('Pic', 'trim|xss_clean', 'img'),
                   'createDT' => array('Created On', 'trim|required|min_length[3]', 'date'),
                   );
                
                $imgSetting = array('fileName'=>'review_', 'width' => 100, 'height' => 80, 'folder' => 'review/');
                $this->SetupRows($page, $subFields, $parentId, $imgSetting);
                
                $this->loadViews('admin/multiBuilder', $this->data);
            }
            break;
            case "freelance": 
            {
                $this->data['pageTitle'] = 'Freelance';
                $variables = array(
                    'header' => array('Header', 'trim|required|min_length[3]', 'text'),
                    'short_text' => array('Short Text', 'trim|required|min_length[20]', 'textarea'),
                );
                
                $this->SetupPage($page, $variables);
                 
                $this->loadViews('admin/builder', $this->data);
            }
            break;
            case "profile": 
            {
                $this->profile($subpage);
            }
            break;
            default:
            {
                // $this->main();
                $this->loadViews('admin', $this->data);
            }
        }
    }
    
    private function SetupRows($page, $subFields, $parentId, $imgSetting = null)
    {
        $this->data['subFields'] = $subFields;
                
        // add/edit service icon
        $editRecord = $this->input->post('editRecord');
        if ($editRecord)
        {
            $rowId = $this->input->post('rowId');
            if ($rowId > 0)
                $this->updateFields($subFields, $rowId);
            else
                $rowId = $this->insertFields($subFields, $parentId, $page);
           
            if ($imgSetting && !empty($_FILES['image']['name']))
            {
                $src = $this->UploadImage($imgSetting['fileName'] . $rowId, $imgSetting['width'], $imgSetting['height'], $imgSetting['folder'] );
                $this->admin_model->updatePage($rowId, array('image'=> $src));
            }

            redirect( adminPath . '/'. $page);
        }
        $this->data['recordList'] = $this->admin_model->getPage($page, $parentId, 100 );
    }
    
    private function SetupPage($page, $variables)
    {
        $this->data['row'] = $this->admin_model->getPage($page);  
        $id = $this->data['row']->id;

        $this->data['fields'] = $variables;

        $sbm = $this->input->post('sbm');
        if ($sbm)
        {
            if ($this->updateFields($variables, $id, $page))
                redirect( adminPath . '/'. $page);
        }
        
        return $id;
    }
    
    
    private function profile($subpage = '')
    {
        $this->mainTpl = "profile";
        $this->load->model('user_model');
        
        switch($subpage)
        {
            case "profileUpdate": 
            {
                $this->profileUpdate();
                $this->loadViews('admin/profile', $this->data);
            }
            break;
            case "changePassword": 
            {
                $this->changePassword();
            }
            break;   
                   
            default:
            {
                $this->data["active"] = "details"; 
                $this->data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
                $this->loadViews('admin/profile', $this->data);
            }
        }
 
    }
    
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');        
  
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            
            $userInfo = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->editUser($userInfo, $this->vendorId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect( adminPath . '/profile/'.$active);
        }
    }
   
     /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/'.$active);
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect( adminPath . '/profile/'.$active);
            }
        }
    }
   
}

?>