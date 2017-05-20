<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class  Frontendmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
            public function search_function($arrData)
        {
             $this->db->select('*');
			 $this->db->from('ht_product');
			 $this->db->like('firm_name', $arrData);
			 $this->db->or_like('firm_contact', $arrData);
			 $this->db->or_like('firm_area', $arrData);
			 $query = $this->db->get();
			//print_r($this->db->last_query());exit;
			if($query->num_rows() >= 0)
			{
				return $query->result();
			}
			return false;
        }
        
            public function display_category()
        {
                $q = $this->db->query("select * from ht_ads_category where leftbar='1' ");
				//
                if($q->num_rows() >= 0)
                {
                    return $q->result();
                }
                return false;
        }
        
		  public function populardisplay_category_under_subcat()
        {
				$this->db->select('*');
				$this->db->from('ht_ads_category AS a');
				$this->db->join('ht_ads_sub_category AS b', 'b.ads_category_id = a.ads_category_id', 'INNER');
				$this->db->where('a.is_popular', 1);
			//	$this->db->where('a.ads_category_id', $ads_category_id);
				$query = $this->db->get();
				//print_r($this->db->last_query());exit;
                if($query->num_rows() >= 0)
                {
                    return $query->result();
                }
                return false;
        }
		
		
              public function populardisplay_category()
        {
			$this->db->select('*');
			$this->db->from('ht_ads_category');
			$this->db->where('is_popular', 1);
			$query = $this->db->get();
			if($query->num_rows() >= 0)
			{
				return $query->result();
			}
			return false;
        }
		
		
		public function business_services ()
        {
			$this->db->select('*');
			$this->db->from('ht_ads_category');
			$this->db->where('is_service',  1);
			
			$query = $this->db->get();
          //  print_r($this->db->last_query());exit;
			if($query->num_rows() >= 0)
			{
				return $query->result();
			}
				return false;
        }
		
		
		  public function display_sub_category()
        {
				$this->db->select('*');
				$this->db->from('ht_ads_category');
				$this->db->where('emg_popular', 1);
				$this->db->where('is_deleted', 0);
				$query = $this->db->get();
				//print_r($this->db->last_query());exit;
                if($query->num_rows() >= 0)
                {
                    return $query->result();
                }
                return false;
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
		
        public function display_sub_category_more($ads_category_id)
        {
				$this->db->select('*');
				$this->db->from('ht_ads_sub_category AS a');
				$this->db->join('ht_ads_category AS b', 'b.ads_category_id = a.ads_category_id', 'INNER');
				$this->db->where('a.ads_category_id', $ads_category_id);
				$query = $this->db->get();
				//print_r($this->db->last_query());exit;
                if($query->num_rows() >= 0)
                {
                    return $query->result();
                }
                return false;
        }
		
		  public function clickable_more_option_productlist($ads_sub_category_id)
        {
				$this->db->select('*');
				$this->db->from('ht_product AS a');
				$this->db->join('ht_ads_sub_category AS b', 'b.ads_sub_category_id = a.ads_sub_category_id', 'INNER');
				$this->db->where('a.ads_sub_category_id', $ads_sub_category_id);
				$query = $this->db->get();
				//print_r($this->db->last_query());exit;
                if($query->num_rows() >= 0)
                {
                    return $query->result();
                }
                return false;
        }
		
		
		
    
	
	public function display_pages()
        {
                $q = $this->db->query("select * from ht_content_mgt");
				//print_r($this->db->last_query());exit;
                if($q->num_rows() >= 0)
                {
                    return $q->result();
                }
                return false;
        }
		
		public function GetRow1($keyword)
        {
              $query= $this->db->query("SELECT firm_city FROM ht_product");
		//print_r($this->db->last_query());exit;
			    
					
                    $a= $query->result_array(); //print_r($a);exit;
					if($a){
                foreach($a as $b)
				{
					 print_r($b);
						$data= $c->firm_city;
					//	print_r($data);
					
				}
				
                }
				
                
        }
		
		
function getData($term) // function called in controller
    {
        $sql = $this->db->query('select * from ht_product where firm_city like "'.  mysql_real_escape_string($term) .'%" order by firm_city asc limit 0,10');
		//print_r($this->db->last_query());exit;
return $sql ->result();
    }


        
}
?>
