<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Frontend extends CI_Controller {


    
    function __construct() {
        
        parent::__construct();
          $this->load->library('form_validation');
            $this->load->database();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('frontendmodel');
			$this->load->helper('file');
    }

    public function search()
	{
		$this->form_validation->set_rules('firm_name', 'Category Name', '');			
		//$this->form_validation->set_rules('ads_sub_category_name', ' Sub Category Name','');			
		//$firmname =$this->input->post('firm_name');
		$module1["data"]       = $this->frontendmodel->display_category();
		$arrData = $this->input->post("search_val");
		  $module1["module1"]     = "frontend/SearchProduct";
		//$firmname = a;
				$ads_sub_category_id    = $this->uri->segment(4,'0');
				$module1["subcat"]    = $this->uri->segment(5,'0');
				$module1["subcatid"]    = $this->uri->segment(4,'0');
		$module1["sfunction"]       = $this->frontendmodel->search_function($arrData);	
		$this->load->view('frontend/header.php',$module1);
		//
	}
	
    
	public function index()
	{
				$module1['modulename'] = 'display_category';
                $module1['message']    = "";//$this->session->flashdata('companyupdated');
                $module1["module1"]     = "frontend/display_category";
                $module1["data"]       = $this->frontendmodel->display_category();
				$module1["popular"]       = $this->frontendmodel->populardisplay_category();	
				//$module1["popular"]       = $this->frontendmodel->populardisplay_category_under_subcat();	
				$module1["ourservice"]       = $this->frontendmodel->display_sub_category();
				//print_r($module1["popular"]);exit;
				//$module1["undersubcat"]       = $this->frontendmodel->populardisplay_category_under_subcat();
				$module1["buservices"]       = $this->frontendmodel->business_services();	
				
				$module1["slider"]       = $this->frontendmodel->slider();	
				//$ads_category_id   =6; 
				//	$arrData["firm_name"] = $this->input->post("firm_name");
					//print_r($arrData);
				//$module1["sfunction"]       = $this->frontendmodel->search_function($arrData);	
				//$module1["moreoption"]       = $this->frontendmodel->display_sub_category_more($ads_category_id);	
				$this->load->view('frontend/header.php',$module1);
	    	
	}
	
	
	
	
        
      public  function display_category()
	{	      
				$module1["data"]       = $this->frontendmodel->display_category();
                $module1['modulename'] = 'display_sub_category_more';
                $module1['message']    = "";//$this->session->flashdata('companyupdated');
                $module1["module1"]     = "frontend/CategoryList";
				//$ads_category_id   =6;
				$ads_category_id    = $this->uri->segment(4,'0');
				$cat    = $this->uri->segment(5,'0');
				$module1["catname"]= str_replace("%20"," ",$cat);
				$module1['catids']    = $this->uri->segment(4,'0');
				
				//print_r($module1['catids']);exit;
				$module1["moreoption"]       = $this->frontendmodel->display_sub_category_more($ads_category_id);			  
                $this->load->view('frontend/header.php', $module1);  // or whatever logic needs to occur
		
	} 
	
	 public  function clickable_more_option_productlist()
	{	      
				$module1["data"]       = $this->frontendmodel->display_category();
                $module1['modulename'] = 'clickable_more_option_productlist';
                $module1['message']    = "";//$this->session->flashdata('companyupdated');
                $module1["module1"]     = "frontend/MoreProduct";
				//$ads_sub_category_id  =6;
				$ads_sub_category_id    = $this->uri->segment(4,'0');
				$catname    = $this->uri->segment(5,'0');
				$module1["cat"]= str_replace("%20"," ",$catname);
				$subcategory    = $this->uri->segment(6,'0');
				$module1["subcat"]= str_replace("%20"," ",$subcategory);
				$module1["subcatid"]    = $this->uri->segment(7,'0');
				$module1["clickallproductlist"]       = $this->frontendmodel->clickable_more_option_productlist($ads_sub_category_id);	
				//print_r( $module1["clickallproductlist"]);exit;			  
                $this->load->view('frontend/header.php', $module1);  // or whatever logic needs to occur
		
	} 
	
         
        function about_us()
	{	      
		$module1['modulename'] = 'display_pages';
		$module1["module1"]     = "frontend/AboutUs";
		//$module1['message'] = "";
		$module1["pages"]       = $this->frontendmodel->display_pages();	
		//print_r( $module1["pages"]);exit;			  
		$this->load->view('frontend/header.php' ,$module1);
		
	}  
            
			
			

  public function getFunction()
    {

if ( !isset($_GET['term']) )
  //  exit;
    $term = $_REQUEST['term'];
        $data = array();	
        $rows = $this->frontendmodel->getData($term); // Model called here
	//
            foreach( $rows as $row )
            {
                $data[] = array(
                 // 'label' => $row->username,
                  'value' => $row->firm_city);   // here i am taking name as value so it will display name in text field, you can change it as per your choice.
            }//print_r($data);exit;
        echo json_encode($data);
        flush();

}




         
}

?>


