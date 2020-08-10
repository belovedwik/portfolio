<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require_once 

class admin_model extends Base_model
{
    function updatePage($id, $data)
    {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->where('Language', $this->session->userdata('lng'));
        
        $this->db->update('tbl_pages', $data);
       
        $this->db->trans_complete();
    }
    
    function insertPage($pageType, $data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_pages', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function deleteRow($rowId)
    {
        $this->db->trans_start();
        $ok = $this->db->delete('tbl_pages', array('id' => $rowId)); 
        $this->db->trans_complete();
        return $ok;
    }
    
    
    
    function userStats()
    {
        // Query #1
        $this->db->select('roleId, count(1) cnt');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->group_by("roleId");
        $query1 = $this->db->get()->result();

        // Query #2
        $this->db->select("'0' as roleId, count(1) cnt");
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 1);
        $query2 = $this->db->get()->result();
       
        // Merge both query results
        $result = array_merge($query1, $query2);

        $arr = array();
        foreach($result as $k)
            $arr[$k->roleId]  = $k->cnt;
    
        return $arr;
    }

    
    
    /* users */
    function getUsers()
    {
        $this->db->select("*");
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->limit(3);
        
        return $this->db->get()->result();
    }
    
    /* editor */
    function getMenuById($id, $table = 'tbl_Category')
    {
        $this->db->select("*");
        $this->db->from($table );
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    
    function updateData($id, $updData, $table = 'tbl_Category')
    {
        $this->db->where('id', $id);
		$this->db->update($table, $updData);
    }
    
    
    function getMenu()
    {
        $this->db->select("*");
        $this->db->from('tbl_Category');
        $this->db->order_by('parentId asc, ord asc');
        $result = $this->db->get()->result();
        
        $fMenu = array();
        foreach ($result as $row)
        {
            if ($row->parentId == 0)
                $fMenu[$row->parentId][] = $row;
            else
                $fMenu[$row->parentId][] = $row;
		}

        return $fMenu;
    }
    
    function move_menu($id, $znak, $table = 'tbl_Category')
	{
		$this->db->trans_start();

        $this->db->select('*')->from($table)->where('id', $id)->limit(1);
        $curr = $this->db->get()->row();
       
		if ($znak == '>')
		{
			$data = array('ord >' => ($curr->ord ? $curr->ord : 0) ,'parentId'=> $curr->parentId);
			$this->db->select('*')->from($table)->where($data)->order_by("ord", "asc")->limit(1);
		}
		else
		{
			$data = array('ord <' => ($curr->ord ? $curr->ord : 0),'parentId'=> $curr->parentId);
			$this->db->select('*')->from($table)->where($data)->order_by("ord", "desc")->limit(1);
		}
       
		$next = $this->db->get()->row();

        //  change CURR ord
		$sql= array('ord' => '-1');
		$this->db->where('id', $id);
		$this->db->update($table, $sql);

        // change NEXT ord to CURR
		$sql = array('ord' => $curr->ord);
		$this->db->where('id', $next->id);
		$this->db->update($table, $sql);

        // change CURR to NEXT
		$sql = array('id' => $id);
		$this->db->where('ord', $next->ord);
		$this->db->update($table, $sql);

		$this->db->trans_complete();
	}
}

  