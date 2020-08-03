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
        switch($page)
        {
            case "about": 
            {
                $this->data['about'] = $this->admin_model->getPage('about');  
                $sbm = $this->input->post('sbm');
                if ($sbm)
                {
                    $this->editAbout($this->data['about']->id);
                }
                 
                $this->loadViews('admin/about', $this->data);
            }
            break;
            case "projects": 
            {
                $this->data['act'] = 'view'; 
                $this->data['project'] = $this->admin_model->getPage('projects');
                $parentId = $this->data['project']->id;
                $this->data['editRow'] = (object) array('id'=>null, 'name' => null ,'short_text' => null, 'full_text' => null);
                
                // edit main text
                $sbm = $this->input->post('sbm');
                if ($sbm)
                {
                    $this->editDescription($parentId, $page);
                }
                
                // add/edit service icon
                $editProject = $this->input->post('editProject');
                if ($editService)
                {
                    $rowId = $this->input->post('rowId');
                    if ($rowId > 0)
                        $this->updateProjectIcon($rowId);
                    else
                        $this->addProjectIcon($parentId);
                }
                $this->data['projectImgs'] = $this->admin_model->getPage('projects', $parentId, 100 );
                
                $this->loadViews('admin/projects', $this->data);
            }
            break;
            case "services": 
            {
                // delete row
                if ($subpage == 'deleteRow')
                {
                    $this->deleteRow($id);
                    return;
                }
             
                // edit row
                $this->data['act'] = 'view'; 
                $this->data['editRow'] = (object) array('id'=>null, 'name' => null ,'short_text' => null, 'full_text' => null);
                if ($subpage == 'edit')
                {
                    $this->data['act'] = 'edit'; 
                    $this->data['editRow'] = $this->admin_model->getPageById($id);
                }
                    
                $this->data['service'] = $this->admin_model->getPage('services');
                $parentId = $this->data['service']->id;
                
                // edit main text
                $sbm = $this->input->post('sbm');
                if ($sbm)
                {
                    $this->editDescription($parentId, $page);
                    return;
                }
               
                // add/edit service icon
                $editService = $this->input->post('editService');
                if ($editService)
                {
                    $rowId = $this->input->post('rowId');
                    if ($rowId > 0)
                        $this->updateServiceIcon($rowId);
                    else
                        $this->addServiceIcon($parentId);
                }
                $this->data['serviceIcons'] = $this->admin_model->getPage('services', $parentId, 100 );
              
                $this->loadViews('admin/services', $this->data);
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
    
  
    
    private function updateServiceIcon($rowId)
    {
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required|min_length[3]');
        $this->form_validation->set_rules('short_text','Short Text','trim|required|min_length[3]');
        $this->form_validation->set_rules('full_text','Full Text','trim|required|min_length[10]');
        
        if($this->form_validation->run() != FALSE)
        {
            $short_text = $this->input->post('short_text');
            $name = $this->input->post('name');
            $full_text = $this->input->post('full_text');
            
            $data = array( 'name'=>$name, 'short_text'=>$short_text, 'full_text'=>$full_text,  'updateDT'=>date('Y-m-d H:i:s'));
            $this->admin_model->updatePage($rowId, $data);
            
            $this->session->set_flashdata('success', 'Icon added');
         }
    }
    
    private function addServiceIcon($parentId)
    {
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required|min_length[3]');
        $this->form_validation->set_rules('short_text','Short Text','trim|required|min_length[3]');
        $this->form_validation->set_rules('full_text','Full Text','trim|required|min_length[10]');
        
        if($this->form_validation->run() != FALSE)
        {
            $short_text = $this->input->post('short_text');
            $name = $this->input->post('name');
            $full_text = $this->input->post('full_text');
            
            $data = array( 'pageType' => 'services', 'parent'=> $parentId, 'name'=>$name, 'short_text'=>$short_text, 'full_text'=>$full_text,  'updateDT'=>date('Y-m-d H:i:s'));
            $this->admin_model->insertPage('services', $data);
            
            $this->session->set_flashdata('success', 'Icon added');
         }
    }
    
   
    
   
    
   
    
    private function editDescription($parentId, $back)
    {
  
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('short_text','Short Text','trim|required|min_length[20]');
        
        if($this->form_validation->run() != FALSE)
        {
            $short_text = $this->input->post('short_text');
            $data = array('short_text'=>$short_text, 'updateDT'=>date('Y-m-d H:i:s'));
            $this->admin_model->updatePage($parentId, $data);
            
            $this->session->set_flashdata('success', 'Text updated');
            
            redirect( adminPath . '/'. $back);
         }
    }
    
    private function editAbout($id)
    {
        $variables = array(
            'name' => array('Specialization', 'trim|required|min_length[20]'),
            'full_text' => array('Full Text', 'trim|required|min_length[20]'),
            'short_text' => array('Short Text', 'trim|required|min_length[20]'),
            
        );
        
        $this->updateFields($variables, $id, 'about');
            
        /*
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('spec','Full Name','trim|required|min_length[10]');
        $this->form_validation->set_rules('full_text','Full Text','trim|required|min_length[20]');
        $this->form_validation->set_rules('short_text','Short Text','trim|required|min_length[20]');
        
        if($this->form_validation->run() != FALSE)
        {
            $spec = $this->input->post('spec');
            $full_text = $this->input->post('full_text');
            $short_text = $this->input->post('short_text');

            $data = array('name'=>$spec, 'full_text'=>$full_text, 'short_text'=>$short_text, 'updateDT'=>date('Y-m-d H:i:s'));
            $this->admin_model->updatePage($parentId, $data);

            $this->session->set_flashdata('success', 'About updated');

            redirect( adminPath . '/about');
        }
        */
        
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