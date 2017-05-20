<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Datamodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	function SaveForm($form_data)
	{
		$this->db->insert('ht_product', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	

			public function checkduplicate($form_data)
        {           
				$this->db->select('*');
				$this->db->from('ht_product');
				$this->db->where('firm_name', $form_data['firm_name']);
				$this->db->or_where('firm_contact', $form_data['firm_contact']);
				$this->db->or_where('firm_area', $form_data['firm_area']);
				$this->db->or_where('firm_address', $form_data['firm_address']);
				$this->db->or_where('products', $form_data['products']);
				$this->db->or_where('specialty', $form_data['specialty']);
				$query = $this->db->get();
			//print_r($this->db->last_query());exit;
				  if($query->num_rows() >= 1) 
				{
					return true;
				}
				else
				{
					return false; 
				}
				
        }
	


	public function view_post()
        {           
        $this->db->select('A.*,B.*,C.*');
		$this->db->from('ht_product AS A');
		$this->db->join('ht_ads_category AS C', 'C.ads_category_id = A.ads_category_id', 'INNER');
		$this->db->join('ht_ads_sub_category AS B', 'B.ads_sub_category_id = A.ads_sub_category_id', 'INNER');
		$this->db->where('A.is_deleted', 0);
		$this->db->order_by("A.firm_name", "asc");
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
	{
		return $query->result();
	}
		return false; 
    }
	
	public function edit_ads($ads_id)
        {           
        $this->db->select('*');
		$this->db->from('ht_product');
		$this->db->where('is_deleted', 0);
		$this->db->where('ads_id', $ads_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
	{
		return $query->result();
	}
		return false; 
    }
	
	public function ProductEdit($ads_id)
        {           
        $this->db->select('*');
		$this->db->from('ht_product');
		$this->db->where('is_deleted', 0);
		$this->db->where('ads_id', $ads_id);
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
			
 public function deleteUser($ads_id)
        {
        $this->db->where('ads_id', $ads_id);
	    $this->db->delete('ht_product'); 
		
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
		$this->db->from('ht_ads_category');
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
        if($query->num_rows() >= 1) 
		{
			return $query->result();
		}
		return false; 
        }
		
		function UpdteAds($form_data,$ads_category_id)
        { 
		//print_r($form_data);
			$this->db->where('ads_category_id', $ads_category_id);
			$this->db->where('ads_id', $form_data['ads_id']);
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
		
		public function view_sub_category()
        {           
			$this->db->select('*');
			$this->db->from('ht_ads_sub_category');
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
		
		
		      public function search_function($arrData)
        {
		    $this->db->select('A.*,B.*,C.*');
			$this->db->from('ht_product AS A');
			$this->db->join('ht_ads_category AS C', 'C.ads_category_id = A.ads_category_id', 'INNER');
			$this->db->join('ht_ads_sub_category AS B', 'B.ads_sub_category_id = A.ads_sub_category_id', 'INNER');
			 $this->db->like('A.products', $arrData);
			 $this->db->or_like('A.specialty', $arrData);
			 $this->db->or_like('C.category_name', $arrData);
			 $this->db->or_like('B.ads_sub_category_name', $arrData);
			 $this->db->or_like('A.firm_area', $arrData);
			 $this->db->or_like('A.firm_name', $arrData);
			 $query = $this->db->get();
			//print_r($this->db->last_query());exit;
			if($query->num_rows() >= 0)
			{
				return $query->result();
			}
			return false;
        }
		
}
?>
