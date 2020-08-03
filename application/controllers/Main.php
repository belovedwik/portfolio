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
    public function index($page='', $cat = '', $subPage = '')
    {
        $page_info = null; 
        if ($page){
           // $page_info = $this->base_model->get_pageType($page);
        } 
        if ($page_info == null){
            $page_info = (object) ['id' => 0, 'catType' => ''];  
        } else {
            $this->data['page_title'] = $page_info->title;
            $this->breadcrumbs->push('На главную', '/');
            $this->breadcrumbs->push($page_info->title, '/'.$page);
            $this->page_segmetns[] = $page_info->link;
        }
        $this->data['catType'] = $page_info->catType;
        $this->data['parid'] = $page_info->id;
        
        switch($page_info->catType)
        {
            
            case "article": 
            {
                $this->articles();
            }
            break;
            default:
            {
                $this->data['about'] = $this->content_model->getPage('about');
                $this->data['services'] = $this->content_model->getPage('services');
                $this->data['servicesIcons'] = $this->content_model->getPage('services', $this->data['services']->id, 30);
                $this->data['project'] = $this->content_model->getPage('projects');
                $this->data['projectsImg'] = $this->content_model->getPage('services', $this->data['project']->id, 30);
            }
        }
        
        $this->data['page_url'] = $this->page_segmetns;
        $this->load->view('index', $this->data);
    }
    
    public function forum($category = '', $subPage = '')
    {
        $this->data['template_name'] = 'forum.php';
        $this->data['forum_type'] = 'general';
        
        if ($subPage){ // forum single article
            $this->data['forum_type'] = 'forum_article';
            $articleId = explode("-", $subPage)[0];
            $article = $this->content_model->getForumArticle($articleId);
            $catPage = $this->content_model->getForumCategory($category);
            $this->breadcrumbs->push($catPage->title, '/'.$this->page_segmetns[0].'/'.$catPage->link);
            $this->breadcrumbs->push($article->title, '/'.$article->link);
            $this->data['article'] = $article;
           
        }
        else if (!$category) // forum in main
        {
            $this->data['forumCategories'] = $this->base_model->getForumCategories();
            $this->data['topOnAir'] = $this->base_model->getForums(9);
        }
        else // forum categories
        {
            $catPage = $this->content_model->getForumCategory($category);
            $this->data['parid'] = $catPage->id;
            
            $this->breadcrumbs->push($catPage->title, '/'.$catPage->link);
            $this->data['forum_type'] = 'forum_articles';
            $this->data['forums'] = $this->base_model->getForums(9, 'modifyDT DESC', $catPage->id);
            $this->page_segmetns[] = $catPage->link;
        }

    }
    
     public function onNotes()
     {
        $this->data['template_name'] = 'onNotes.php';
        $this->data['topOnAir'] = $this->base_model->getForums(9);
        $this->data['OnNotes'] = $this->content_model->getArticles(null, 8);
        $this->data['noteType'] = 'general';
     }
    
    public function onAir()
    {
        $this->data['template_name'] = 'onAir.php';
        $this->data['onNotes'] = $this->content_model->getArticles(null, 8);
        $this->data['forums'] = $this->base_model->getForums(20);
        
    }
    
    public function articles()
    {
        $this->data['template_name'] = 'articles.php';
        $this->data['articleCategories'] = $this->content_model->getArticleCategories();
        $this->data['newArticles'] = $this->content_model->getArticles(null, 9, true); // $parentId, $articleCount, $orderByLastets
    }
    
    public function links($page)
    {
        $this->data['template_name'] = 'page.php';
        $this->data['page'] = $page;
    }
   
}

?>