<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Base_model extends CI_Model
{
    function getPage($pageType = '', $parentID = 0, $limit = 1)
    {
        $this->db->select("*");
        $this->db->from('tbl_pages');
        $this->db->where('pageType', $pageType);
        $this->db->where('parent', $parentID);
        $this->db->where('Language', $this->session->userdata('lng'));
        
        $this->db->limit($limit);
        $res = $this->db->get()->result();
        
        return ($limit == 1) ? ($res != null ? $res[0] : null) : $res;
    }
    
    function getPageById($rowId)
    {
        $this->db->select("*");
        $this->db->from('tbl_pages');
        $this->db->where('id', $rowId);
        $this->db->where('Language', $this->session->userdata('lng'));
        $this->db->limit(1);
        $res = $this->db->get()->result();
        
        return $res != null ? $res[0] : null;
    }
    
    function getForums($limit = 3, $orderBy = '', $parentId = 0)
    {
        $this->db->select("*");
        $this->db->from('tbl_forum');
        if ($parentId > 0)
            $this->db->where('parentId', $parentId);
        if ($orderBy)
            $this->db->order_by($orderBy);
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }
    
    function getTopMenu()
    {
        $this->db->select("*");
        $this->db->from('tbl_Category');
        $this->db->where('parentId', 0);
        $this->db->where('catType <>', 'fLink');
        $this->db->order_by('ord ASC');
        $result = $this->db->get()->result();
        
        $fMenu = array();
        foreach ($result as $row){
            $fMenu[] = $row;
    	}
       return $fMenu;
    }
	
    function get_pageType($page)
	{
        $this->db->select('*')->from('tbl_Category')->where('link', $page)->limit(1);
        $result = $this->db->get()->row();
      	return $result;
	}
    
    function get_parent_name($id)
	{
		$this->db->select('parent')->from('tbl_Category')->where('id', $id)->limit(1);
		$query = $this->db->get();
		$parent = $query->row('parent');

		if ($parent != '0')
		{
            $this->db->select('title')->from('tbl_Category')->where('id', $parent)->limit(1);
            $query = $this->db->get();
            $result = $query->row('title');
		}
		else
		  $result ='';

		return $result;
	}
    
    function rus2translit($string)
	{
		$converter = array(
		'а' => 'a',   'б' => 'b',   'в' => 'v', 'г' => 'g',   'д' => 'd',   'е' => 'e',
		'ё' => 'e',   'ж' => 'zh',  'з' => 'z',	'и' => 'i',   'й' => 'y',   'к' => 'k',
		'л' => 'l',   'м' => 'm',   'н' => 'n',	'о' => 'o',   'п' => 'p',   'р' => 'r',
		'с' => 's',   'т' => 't',   'у' => 'u',	'ф' => 'f',   'х' => 'h',   'ц' => 'c',
		'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch','ь' => "",  'ы' => 'y',   'ъ' => "",
		'э' => 'e',   'ю' => 'yu',  'я' => 'ya', ' '=>'-','('=>'',')'=>'-','.'=>'',

		'А' => 'a',   'Б' => 'b',   'В' => 'v',	'Г' => 'g',   'Д' => 'd',   'Е' => 'e',
		'Ё' => 'e',   'Ж' => 'zh',  'З' => 'z',	'И' => 'i',   'Й' => 'y',   'К' => 'k',
		'Л' => 'l',   'М' => 'm',   'Н' => 'n',	'О' => 'o',   'П' => 'p',   'Р' => 'r',
		'С' => 's',   'Т' => 't',   'У' => 'u',	'Ф' => 'f',   'Х' => 'h',   'Ц' => 'c',
		'Ч' => 'ch',  'Ш' => 'sh',  'Щ' => 'sch','Ь' => "",  'Ы' => 'y',   'Ъ' => "",
		'Э' => 'e',   'Ю' => 'yu',  'Я' => 'ya',
		);
		return strtr($string, $converter);
	}
}

  