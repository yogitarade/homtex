<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categorymodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	function SaveCategory($form_data)
	{
		$this->db->insert('ht_ads_category', $form_data);
	//	print_r($this->db->last_query());exit;
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function SaveSubCategory($form_data)
	{
		$this->db->insert('ht_ads_sub_category', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	public function view_post_category()
        {           
        $this->db->select('*');
		$this->db->from('ht_ads_category');
		$this->db->where('is_deleted', 0);
		$this->db->order_by("category_name", "asc");
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
	
		//
        if($query->num_rows() >= 1) 
	{
	
		return $query->result();
	}
		return false; 
    }
	
	public function view_category()
        {           
        $this->db->select('category_name,ads_category_id');
		$this->db->from('ht_ads_category');
		$this->db->where('is_deleted', 0);
		$this->db->order_by("category_name", "asc");
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
	{
		return $query->result();
	}
		return false; 
    }
	
	
	
	public function view_post_sub_category()
        {           
			$this->db->select('A.*,C.category_name');
			$this->db->from('ht_ads_sub_category AS A');
			$this->db->join('ht_ads_category AS C', 'C.ads_category_id = A.ads_category_id', 'INNER');
			$this->db->where('A.is_deleted', 0);
			//$this->db->limit(5);
			$this->db->order_by("A.ads_sub_category_name", "asc");
			$query = $this->db->get();
			
		if($query->num_rows() >= 1) 
		{
			return $query->result();
		}
		else
		{
			return false;
		} 
	}
	
	function Updtecat($form_data,$ads_category_id)
        {
		$this->db->where('ads_category_id', $ads_category_id);
	    $this->db->update('ht_ads_category', $form_data); 
		//print_r($this->db->last_query());exit;
		if ($this->db->affected_rows() == 1)
		{
				return true;
		}
		else
		{
			return false;	
		}
           
        }
		
		
			function UpdasubCat($form_data,$ads_sub_category_id)
        {
		$this->db->where('ads_sub_category_id', $ads_sub_category_id);
	    $this->db->update('ht_ads_sub_category', $form_data); 
		//print_r($this->db->last_query());exit;
		if ($this->db->affected_rows() == 1)
		{
				return true;
		}
		else
		{
			return false;	
		}
           
        }
	
	public function catedit($ads_category_id)
        {           
        $this->db->select('*');
		$this->db->from('ht_ads_category');
		$this->db->where('is_deleted', 0);
		$this->db->where('ads_category_id', $ads_category_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
	{
		return $query->result();
	}
		return false; 
    }
	
	
		public function imge($ads_sub_category_id)
        {           
        $this->db->select('*');
		$this->db->from('ht_ads_sub_category');
		$this->db->where('is_deleted', 0);
		$this->db->where('ads_sub_category_id', $ads_sub_category_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
	{
		return $query->result();
	}
		return false; 
    }
		public function subcatedit($ads_sub_category_id)
        {           
        $this->db->select('*');
		$this->db->from('ht_ads_sub_category');
		$this->db->where('is_deleted', 0);
		$this->db->where('ads_sub_category_id', $ads_sub_category_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
	{
		return $query->result();
	}
		return false; 
    }
           
	function getuserid($id)
            {
				
                    $q = $this->db->query("select * from ht_ads_category where ads_category_id='$id'");
					//print_r($this->db->last_query());exit;
                    if($q->num_rows() > 1)
                    {
                        return $q->result_array();
                    }
                    return false;
            }
			
			


			
	 public function deletecat($ads_category_id)
        {
        $this->db->where('ads_category_id', $ads_category_id);
	    $this->db->delete('ht_ads_category'); 
		
		if ($this->db->affected_rows() == 1)
		{
				return true;
		}
		else
		{
			return false;	
		}
        }
			
	 public function deleteUser($ads_sub_category_id)
        {
        $this->db->where('ads_sub_category_id', $ads_sub_category_id);
	    $this->db->delete('ht_ads_sub_category'); 
		
		if ($this->db->affected_rows() == 1)
		{
				return true;
		}
		else
		{
			return false;	
		}
        }
		
		public function getUserData()
        {           
        $this->db->select('*');
		$this->db->from('pk_ads');
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
		{
			return $query->result();
		}
		return false; 
        }
		
		
}
?>
