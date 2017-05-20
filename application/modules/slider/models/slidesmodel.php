<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slidesmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	function SaveForm($form_data)
	{
		$this->db->insert('ht_slider', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	
	 public function slider()
        {
				$this->db->select('*');
				$this->db->from('ht_slider');
				$this->db->where('is_deleted', 0);
				$query = $this->db->get();
				//print_r($this->db->last_query());exit;
                if($query->num_rows() >= 0)
                {
                    return $query->result();
                }
                return false;
        }
	
	public function view_post()
        {           
        $this->db->select('*');
		$this->db->from('ht_product');
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();
	///	print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
	{
		return $query->result();
	}
		return false; 
    }
	
	
		public function subcatedit($slide_id)
        {           
        $this->db->select('*');
		$this->db->from('ht_slider');
		$this->db->where('is_deleted', 0);
		$this->db->where('slide_id', $slide_id);
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
					//
                    if($q->num_rows() > 1)
                    {
                        return $q->result_array();
                    }
                    return false;
            }
			
	 public function deleteUser($slide_id)
        {
        $this->db->where('slide_id', $slide_id);
	    $this->db->update('ht_slider',array('is_deleted'=>1)); 
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
	
	public function imge($slide_id)
        {           
        $this->db->select('*');
		$this->db->from('ht_slider');
		$this->db->where('is_deleted', 0);
		$this->db->where('slide_id', $slide_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
	{
		return $query->result();
	}
		return false; 
    }
	
		function UpdateSlider($form_data,$slide_id)
        {
		$this->db->where('slide_id', $slide_id);
	    $this->db->update('ht_slider', $form_data); 
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
		
		function UpdteAds($form_data,$ads_category_id)
        { 
		//print_r($form_data);
			$this->db->where('ads_category_id', $ads_category_id);
			$this->db->update('ht_product', $form_data); 
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
		
			public function view_post_category()
        {           
			$this->db->select('*');
			$this->db->from('ht_ads_category');
			//$this->db->join('ht_ads_category AS C', 'C.ads_category_id = A.ads_category_id', 'INNER');
		//	$this->db->where('A.is_deleted', 0);
			//$this->db->limit(5);
			$query = $this->db->get();
			$tt[] = $query->result();
			$allItems = array();
			foreach ($tt as $tt) 
			{
				$allItems = ($tt);
			}
			//print_r($this->db->last_query());exit;
		if($query->num_rows() >= 1) 
		{
			arsort($allItems);  
			return $allItems;	
		}
		else
		{
			return false;
		} 
	}
		
	
		
		
}
?>
