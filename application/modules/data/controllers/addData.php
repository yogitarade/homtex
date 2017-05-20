<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Project Name: invitation
 * 
 * Created By: nishant
 * 
 * Date: 10-10-2014 
 * 
 */


class AddData extends CI_Controller {


    
    function __construct() {
        
        parent::__construct();
          $this->load->library('form_validation');
            $this->load->database();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('datamodel');
			$this->load->helper('file');
			

    }

    
    
	public function index()
	{
			$user_data = $this->session->userdata('logged_in');
           
            if(!isset($user_data['username'])){
                redirect('login',$error);
            }
			$user_data = $this->session->userdata('logged_in');
		$this->form_validation->set_rules('firm_name', ' Firm Name', 'required');
			$this->form_validation->set_rules('firm_contact', ' Firm Contact', 'required');
			$this->form_validation->set_rules('firm_area', ' Firm Area', 'required');
			$this->form_validation->set_rules('firm_city', ' Firm City', '');
			$this->form_validation->set_rules('firm_address', ' Firm Address', 'required');
			$this->form_validation->set_rules('person_name', ' person name', '');
			$this->form_validation->set_rules('person_contact', ' person contact', '');
			$this->form_validation->set_rules('person_email_id', ' person email id', '');
			$this->form_validation->set_rules('products', ' products', 'required');
			$this->form_validation->set_rules('specialty', ' specialty', 'required');
			$this->form_validation->set_rules('whatsup_no', ' whatsup no', '');
			$this->form_validation->set_rules('website', ' website', '');
			$this->form_validation->set_rules('ads_category_id', ' Linkedin');
			$this->form_validation->set_rules('ads_sub_category_id', ' Linkedin');
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
			
	
			$module['modulename'] 	= 'view_post_category';
			$module['message']    		= "";//$this->session->flashdata('companyupdated');
			$module["module"]     		= "addData/view_post_category";    //folder name/controller name
			$module["data"]       			= $this->datamodel->view_post_category(); 
			$module["subcat"]       		= $this->datamodel->view_sub_category(); 
			$user_data 						= $this->session->userdata('logged_in');				
			$id 										= $user_data['id'];				
			$module['records'] 			= $this->datamodel->getuserid($id);
					
		if ($this->form_validation->run() == FALSE) 
		{
			$module['modulename'] = 'Post Ads';
			$module['message'] = "";
			$module["module"]="data/AddData";
		    $this->load->view('dashboard/templates/default/header.php', $module);
		}
		else 
		{ 
	
			$form_data = array(
				'ads_category_id'      	=> set_value('ads_category_id'),
				'ads_sub_category_id'   => set_value('ads_sub_category_id'),
				'firm_name'  		=> set_value('firm_name'),
				'firm_contact'      	=> set_value('firm_contact'),
				'firm_area'      	=> set_value('firm_area'),
				'firm_city'     	=> set_value('firm_city'),
				'firm_address'      	=> set_value('firm_address'),
				'person_name'      	=> set_value('person_name'),
				'person_contact'      	=> set_value('person_contact'),
				'person_email_id'      	=> set_value('person_email_id'),
				'products'      	=> set_value('products'),
				'specialty'      	=> set_value('specialty'),
				'whatsup_no'      	=> set_value('whatsup_no'),
				'website'      		=> set_value('website')
					
							
						);		
				//print_r($form_data);exit;
			if ($this->datamodel->checkduplicate($form_data) == TRUE) 
			{
			$module['modulename'] = 'Add Data';
			$module['message'] = "Duplicate Entry ";
		    	redirect("data/addData/DisplayData");
			}
			else	
			if ($this->datamodel->SaveForm($form_data) == TRUE) 
			{
			$module['modulename'] = 'Post Ads';
			$module['message'] = "Post Successfully";
		    redirect("data/addData/DisplayData");
			//$this->load->view('dashboard/templates/default/header.php', $module); 
			}
			else
			{
				echo 'An error occurred saving your information. Please try again later';
			}
		}
	}

 public function subcat()
	{
		 $this->load->view('ajaxsub.php');
	}

	
	function do_upload()
{
$config['upload_path'] = './uploads/';
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$config['max_size']    = '10000000';
$config['max_width']  = '1024';
$config['max_height']  = '768';
 
// You can give video formats if you want to upload any video file.
 
$this->load->library('upload', $config);
 
if ( ! $this->upload->do_upload())
{
//$error = array('error' => $this->upload->display_errors());
print_r("ldsajf");
 
// uploading failed. $error will holds the errors.
}
else
{
//$data = array('upload_data' => $this->upload->data());
 print_r("ldscdsfdsajf");
// uploading successfull, now do your further actions
}
}

	function DisplayData()
	{	      
                $module['modulename'] = 'view_post';
                $module['message']    = "";//$this->session->flashdata('companyupdated');
                $module["module"]     = "data/view_post";
                $module["data"]       = $this->datamodel->view_post();
				//print_r($module["data"]);exit;
                $user_data = $this->session->userdata('logged_in');				
				$id = $user_data['id'];				
				$module['records'] = $this->datamodel->getuserid($id);
				//print_r($module['data']);exit;
                $this->load->view('dashboard/templates/default/header.php', $module);  // or whatever logic needs to occur
		
	} 
		
	 function deleteads()
	{              
           
		$module['modulename']   = 'Manage All Users';
                
		$module['message']      = "";
		
        $ads_id    = $this->uri->segment(4,'0');
              
		//$module["data"] = $this->datamodel->deleteUser($ads_id);
               
		if ($this->datamodel->deleteUser($ads_id) == true) 
			{
				redirect("data/addData/DisplayData");
			
			}
	}
	
public function edit()
    {
			$user_data = $this->session->userdata('logged_in');
			$this->form_validation->set_rules('firm_name', 'Company Name', 'required');			
			$this->form_validation->set_rules('firm_contact', 'Priority', 'required');
			$this->form_validation->set_rules('firm_area', 'from date', 'required');
			$this->form_validation->set_rules('firm_city', 'to date', '');
			$this->form_validation->set_rules('firm_address', 'to date', 'required');
			$this->form_validation->set_rules('person_name', 'to date', '');
			$this->form_validation->set_rules('person_contact', 'to date', '');
			$this->form_validation->set_rules('person_email_id', 'to date', '');
			$this->form_validation->set_rules('whatsup_no', 'image path', '');
			$this->form_validation->set_rules('website', 'link', '');
			$this->form_validation->set_rules('specialty', 'link', '');
			$this->form_validation->set_rules('products', 'link', '');
			$this->form_validation->set_rules('ads_category_id', 'ads_category_id', '');
			$this->form_validation->set_rules('ads_id', 'ads_id', '');
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
			$ads_id    = $this->uri->segment(4,'0');
		
				if ($this->form_validation->run() == FALSE) 
						{
							$module['data']  = $this->datamodel->edit_ads($ads_id);
							$module['modulename'] = 'Edit Ads';
							$module['message'] = "";
							$module["module"]="data/edit_ads_post";		
							$module["cdata"]       			= $this->datamodel->view_post_category(); 
							$module["subcat"]       		= $this->datamodel->view_sub_category(); 							
							$this->load->view('dashboard/templates/default/header.php', $module);
						}
				else 
						{  
							
							$module['data']  = $this->datamodel->edit_ads($ads_id);
									
						$form_data = array(
							'firm_name'              => set_value('firm_name'),
							'firm_contact'           => set_value('firm_contact'),
							'firm_area'               => set_value('firm_area'),
							'firm_city'                 => set_value('firm_city'),
							'firm_address'        => set_value('firm_address'),
							'person_name'       => set_value('person_name'),
							'person_contact'      => set_value('person_contact'),
							'person_email_id'      => set_value('person_email_id'),
							'whatsup_no'      => set_value('whatsup_no'),
							'specialty'      => set_value('specialty'),
							'products'      => set_value('products'),
							'website'      => set_value('website'),
							'ads_id'      => set_value('ads_id'),
							'ads_category_id'      => set_value('ads_category_id')
							
																);			
							$ads_category_id    = $this->input->post('ads_category_id');
					
						if ($this->datamodel->UpdteAds($form_data, $ads_category_id) == TRUE) 
									{
										$module['modulename'] = 'Edit Ads';
										$module['message'] = "Successfully Update";
										redirect ("data/addData/DisplayData");
										$module["data"]       = $this->datamodel->getUserData();
									}
					else
									{
										
										echo 'An error occurred saving your information. Please try again later';
									
									}
						}
						
						
	}		

  public function Search()
	{
		$this->form_validation->set_rules('firm_name', 'Category Name', '');			
		$arrData = $this->input->post("search_val");
		  $module["module"]     = "data/SearchProduct";
		  $module['message'] = "";
		$module["data"]       = $this->datamodel->search_function($arrData);	
		$this->load->view('dashboard/templates/default/header.php',$module);
		//
	}
	
	function bulk_upload()
	{
		$module['modulename'] = 'Post Ads';
		$module['message'] = "";
		$module["module"]="data/bulk_upload";
		$this->load->view('dashboard/templates/default/header.php', $module); 
	}
	function bulk_upload_data()
	{
		$tempFileName = time() . ".csv";
		if (is_uploaded_file($_FILES["userfile"]['tmp_name']))
			{
				$fileUploaded = move_uploaded_file($_FILES["userfile"]['tmp_name'], $tempFileName);

				if ($fileUploaded) {

					if (($handle = fopen($tempFileName, "r")) !== FALSE) {
						while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
									$form_data = array(
									'ads_category_id'      			=> $data[0],
									'ads_sub_category_id'        	=> $data[1],
									'firm_name'      						=> $data[2],
									'firm_contact'      					=> $data[3],
									'firm_area'      						=> $data[4],
									'firm_city'      							=> $data[5],
									'firm_address'      					=> $data[6],
									'person_name'      					=> $data[7],
									'person_contact'      				=> $data[8],
									'person_email_id'      			=> $data[9],
									'whatsup_no'      					=> $data[10],
									'website'      							=> $data[11]
								);		
						
							$this->datamodel->SaveForm($form_data);
							
						}
						
							$module['modulename'] = 'Post Ads';
							$module['message'] = "Data Uploaded Successfully!";
							$module["module"]="data/bulk_upload";
							$this->load->view('dashboard/templates/default/header.php', $module); 
					}
				}
			}
	}


}
?>


