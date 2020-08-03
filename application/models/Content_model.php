<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class content_model extends Base_model
{
    function getSlides($limit = 8)
    {
        $this->db->select("*");
        $this->db->from('tbl_slide');
        //$this->db->where('isDeleted', 0);
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }
    
    function getArticles($parentId = null, $limit = 8, $orderByLastets = false)
    {
        $this->db->select("*");
        $this->db->from('tbl_articles');
        if ($parentId)
            $this->db->where('parent', $parentId);
        if ($orderByLastets)
            $this->db->order_by('createdOn', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }
    
    function getForumArticle($id)
    {
        $this->db->select("*");
        $this->db->from('tbl_forum');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    
    function getForumCategories()
    {
        $this->db->select("*");
        $this->db->from('tbl_Category');
        $this->db->where('catType', 'forum');
        $this->db->order_by('ord ASC');
        $result = $this->db->get()->result();
        
        $menu = array();
        foreach ($result as $row)
		{
			if ($row->parentId == 0)
				$menu[$row->parentId] = $row;
			else		
				$menu[$row->parentId][] = $row;          
		}
        return $menu;
    }
    
    function getForumCategory($link)
    {
        $this->db->select("*");
        $this->db->from('tbl_Category');
        $this->db->where('catType', 'forum');
        $this->db->where('link', $link);
        $this->db->limit(1);
        
        return $this->db->get()->row();
    }
    
    function getArticleCategories()
    {
        $this->db->select("*");
        $this->db->from('tbl_Category');
        $this->db->where('catType', 'article');
        $this->db->order_by('parentId', 'ASC');
        
        $result = $this->db->get()->result();
        
        $menu = array();
        foreach ($result as $row)
		{
			if ($row->parentId == 0)
				$menu[$row->parentId] = $row;
			else		
				$menu[$row->parentId][] = $row;          
		}
        return $menu;
    }
    
    
}

  