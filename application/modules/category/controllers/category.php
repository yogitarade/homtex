<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Category extends CI_Controller {


    
    function __construct() {
        
        parent::__construct();
          $this->load->library('form_validation');
            $this->load->database();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('categorymodel');
			$this->load->helper('file');
			

    }
	
	
 
	public function AddCategory()
	{
			$user_data = $this->session->userdata('logged_in');
           
            if(!isset($user_data['username'])){
                redirect('login',$error);
            }
			$user_data = $this->session->userdata('logged_in');
			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			//$this->form_validation->set_rules('category_image_path', 'Please Add Category Image', 'required');
			$this->form_validation->set_rules('is_popular', 'Please Add Category Image', '');
			$this->form_validation->set_rules('leftbar', 'Please Add Category Image', '');
			$this->form_validation->set_rules('emg_popular', 'Please Add Category Image', '');
			$this->form_validation->set_rules('is_service', 'Please Add Category Image', '');
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
				$target_path1 = "uploads/uploads/";
				$server_ip = base_url();	
				$file_upload_url = $server_ip . $target_path1;
		    
				
                $module['modulename'] 		= 'view_post_category';
                $module['message']    		= "";//$this->session->flashdata('companyupdated');
                $module["module"]     		= "category/view_post_category";
                $module["data"]       			= $this->categorymodel->view_post_category();
				//print_r($module["data"]);exit;
                $user_data 						= $this->session->userdata('logged_in');				
				$id 			                        = $user_data['id'];				
				$module['records'] 		    = $this->categorymodel->getuserid($id);
				
		if ($this->form_validation->run() == FALSE) 
		{
			$module['modulename'] = 'Post Category';
			$module['message'] = "";
			$module["module"]="category/add_category";
		    $this->load->view('dashboard/templates/default/header.php', $module);
		}
		else 
		{
			list($width, $height, $type, $attr) = getimagesize($_FILES['userfile']['tmp_name']); 
			$min_width = "200";	
			$min_height = "200";
			if (isset($_FILES['userfile']['name'])&&($width >= $min_width) && ($height >= $min_height)) 
			{
					try 
					{ 
					list($type1, $type) = split('[/]', $_FILES['userfile']['type']);
					$new_file_name=date("Ymdhis").".".$type;
						$config['upload_path'] = 'uploads/uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['file_name'] = $new_file_name;
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload()) 
						{	
							$response['error'] = true;
							$response['message'] = 'Could not move the file!';
						}
						else{
						$response['message'] = 'File uploaded successfully!';						
						$file_path = $file_upload_url . basename($new_file_name);
					
					}
					} catch (Exception $e) 
					{
						$response['error'] = true;
						$response['message'] = $e->getMessage();					
					}
			}else
			{
					echo '<script>
		alert("Please Select the (200) height and (200) width");
		document.location ="http://hometex.integrationsolution.in/index.php/category/category/AddCategory";
		</script>';
			}
			
			$form_data = array(
				'category_name'    => set_value('category_name'),
				'is_popular'      => set_value('is_popular'),
				'is_service'      => set_value('is_service'),
				'leftbar'      		=> set_value('leftbar'),
				'emg_popular'      => set_value('emg_popular'),
				'category_image_path'   => $file_path							
					       			
						);		
					//print_r($form_data);exit;
			if ($this->categorymodel->SaveCategory($form_data) == TRUE) 
			{
				
			$module['modulename'] = 'Post Ads';
			$module['message'] = "Successfully Add Category";
			$module["module"]="category/add_category";
			redirect("category/category/AddCategory");
		    //$this->load->view('dashboard/templates/default/header.php', $module); 
			}
			else
			{
				echo 'An error occurred saving your information. Please try again later';
			}
		}
	}
	
	function view_category()
	{	      
				//print_r('888');exit;
                $module['modulename'] 		= 'view_post_category';
                $module['message']    		= "";//$this->session->flashdata('companyupdated');
                $module["module"]     		= "category/view_post_category";
                $module["data"]       			= $this->categorymodel->view_category();
                $user_data 						= $this->session->userdata('logged_in');				
				$id 									= $user_data['id'];				
				$module['records'] 			= $this->categorymodel->getuserid($id);
				//print_r($module["data"]);
                //$this->load->view("dashboard/templates/default/header.php", $module);  // or whatever logic needs to occur
		
	} 
	
	
	public function AddSubCategory()
	{
			$user_data = $this->session->userdata('logged_in');
           
            if(!isset($user_data['username'])){
                redirect('login',$error);
            }
			$user_data = $this->session->userdata('logged_in');
			$this->form_validation->set_rules('category_name', 'Category Name', '');			
			$this->form_validation->set_rules('ads_sub_category_name', ' Sub Category Name', '');			
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
			
			$target_path1 = "uploads/uploads/";
				$server_ip = base_url();	
				$file_upload_url = $server_ip . $target_path1;
			
				$module['modulename'] 		= 'view_post_category';
                $module['message']    		= "";//$this->session->flashdata('companyupdated');
                $module["module"]     		= "category/view_post_category";
                $module["data"]       			= $this->categorymodel->view_post_sub_category();
				$module["category"]       	= $this->categorymodel->view_category();
                $user_data 						= $this->session->userdata('logged_in');				
				$id 									= $user_data['id'];				
				$module['records'] 			= $this->categorymodel->getuserid($id);
				
		if ($this->form_validation->run() == FALSE) 
		{ 
			$module['modulename'] = 'Post Category';
			$module['message'] = "";
			$module["module"]="category/add_subcategory";
			// redirect("category/add_subcategory");
		  $this->load->view('dashboard/templates/default/header.php', $module);
		}
		else 
		{
			list($width, $height, $type, $attr) = getimagesize($_FILES['userfile']['tmp_name']); 
			$min_width = "200";	
			$min_height = "200";
			if (isset($_FILES['userfile']['name'])&&($width >= $min_width) && ($height >= $min_height)) 
			{
					try 
					{ 
					list($type1, $type) = split('[/]', $_FILES['userfile']['type']);
					$new_file_name=date("Ymdhis").".".$type;
						$config['upload_path'] = 'uploads/uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['file_name'] = $new_file_name;
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload()) 
						{	
							$response['error'] = true;
							$response['message'] = 'Could not move the file!';
						}
						else{
						$response['message'] = 'File uploaded successfully!';						
						$file_path = $file_upload_url . basename($new_file_name);
					
					}
					} catch (Exception $e) 
					{
						$response['error'] = true;
						$response['message'] = $e->getMessage();					
					}
			}else
			{
					echo '<script>
		alert("Please Select the (200) height and (200) width");
		document.location ="http://hometex.integrationsolution.in/index.php/category/category/AddSubCategory";
		</script>';
			}
			//
			$form_data = array(
							'ads_category_id'      => set_value('category_name'),
							'ads_sub_category_name'      => set_value('ads_sub_category_name'),
							'ads_sub_category_image_path'  =>$file_path
					       			
						);		
				
			if ($this->categorymodel->SaveSubCategory($form_data) == TRUE) 
			{
			$module['modulename'] = 'Post Ads';
			$module['message'] = "Post Ads Successfully";
			$module["module"]="category/AddSubCategory";
		    //$this->load->view('dashboard/templates/default/header.php', $module); 
			redirect("category/AddSubCategory");
			}
			else
			{
				echo 'An error occurred saving your information. Please try again later';
			}
		}
	}
	
		 function deletecat()
	{              
           
		$module['modulename']   = 'Manage All Users';
                
		$module['message']      = " Successfully Deleted";
		
                $ads_category_id    = $this->uri->segment(4,'0');
               
       
		if ($this->categorymodel->deletecat($ads_category_id) == true) 
			{
				redirect("category/AddCategory");
			
			}
	}
		
	 function deleteads()
	{              
           
		$module['modulename']   = 'Manage All Users';
                
		$module['message']      = "";
		
                $ads_sub_category_id    = $this->uri->segment(4,'0');
               
       
		if ($this->categorymodel->deleteUser($ads_sub_category_id) == true) 
			{
				redirect("category/AddSubCategory");
			
			}
	}
	
public function catedit()
    {
			$user_data = $this->session->userdata('logged_in');
			$this->form_validation->set_rules('category_name', 'Company Name', 'required');	
			$this->form_validation->set_rules('ads_category_id', 'Company Name', 'required');	
			$this->form_validation->set_rules('is_popular', 'Please Add Category Image', '');
			$this->form_validation->set_rules('leftbar', 'Please Add Category Image', '');
			$this->form_validation->set_rules('emg_popular', 'Please Add Category Image', '');
			$this->form_validation->set_rules('is_service', 'Please Add Category Image', '');
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
			$ads_category_id    = $this->uri->segment(4,'0');
			$target_path1 = "uploads/uploads/";
			$server_ip = base_url();	
			$file_upload_url = $server_ip . $target_path1;
			$module["category"]       	= $this->categorymodel->view_category();
				if ($this->form_validation->run() == FALSE) 
						{
							$ads_category_id    = $this->uri->segment(4,'0');
							$module['data']  = $this->categorymodel->catedit($ads_category_id);
							$module['modulename'] = 'Edit Ads';
							$module['message'] = "";
							$module["module"]="category/EditCat";				
							$this->load->view('dashboard/templates/default/header.php', $module);
						}
				else 
						{   
					if (isset($_FILES['userfile']['name']) != empty($_FILES['userfile']['name'])) 
			{    
					try 
					{ 
					list($type1, $type) = split('[/]', $_FILES['userfile']['type']);
					$new_file_name=date("Ymdhis").".".$type;
						$config['upload_path'] = 'uploads/uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['file_name'] = $new_file_name;
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload()) 
						{	
							$response['error'] = true;
							$response['message'] = 'Could not move the file!';
						}
						else{
						$response['message'] = 'File uploaded successfully!';						
						$file_path = $file_upload_url . basename($new_file_name);
					
					}
					} catch (Exception $e) 
					{
						$response['error'] = true;
						$response['message'] = $e->getMessage();					
					}
			} 
			else
				{
				$ads_category_id    = $this->input->post('ads_category_id');
				$image_path = $this->categorymodel->catedit($ads_category_id); 
				
				if($image_path)
				{				
					foreach($image_path as $data)
						{
						$file_path = $data->category_image_path;						
						}				 
						}else
						{
							$response['success']    = 0;
							$response['message']    = 'image path empty.';
							echo json_encode($response);  
						}	
				}
							$module['data']  = $this->categorymodel->catedit($ads_category_id);
								$form_data = array(
								'category_name'      => set_value('category_name'),
								'is_popular'      => set_value('is_popular'),
								'is_service'      => set_value('is_service'),
								'leftbar'      		=> set_value('leftbar'),
								'emg_popular'      => set_value('emg_popular'),
								'category_image_path'      => $file_path 
																);			
									$ads_category_id    = $this->input->post('ads_category_id');
						if ($this->categorymodel->Updtecat($form_data, $ads_category_id) == TRUE) 
									{
										$module['modulename'] = 'Edit Ads';
										$module['message'] = "";
										redirect ("category/AddCategory");
										$module["data"]       = $this->categorymodel->getUserData();
										$this->load->view('dashboard/templates/default/header.php', $module);
									}
									else
									{
										echo 'An error occurred saving your information. Please try again later';
									}
						}	
	}		

public function subcatedit()
    {
			$user_data = $this->session->userdata('logged_in');
           
            if(!isset($user_data['username'])){
                redirect('login',$error);
            }
			$user_data = $this->session->userdata('logged_in');
			$this->form_validation->set_rules('ads_sub_category_name', 'Company Name', '');		
			$this->form_validation->set_rules('ads_sub_category_id', 'sub cat id');	
			$this->form_validation->set_rules('category_name', 'Category Name', '');
			
			$sbcat  = set_value('ads_sub_category_id');
			
			$ads_sub_category_id    = $this->uri->segment(4,'0');		
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
			$target_path1 = "uploads/uploads/";
			$server_ip = base_url();	
			$file_upload_url = $server_ip . $target_path1;
			$module["category"]       	= $this->categorymodel->view_category();
			if ($this->form_validation->run() == FALSE) 
			{ 
				$module['data']  = $this->categorymodel->subcatedit($ads_sub_category_id);
				$module['modulename'] = 'Edit Ads';
				$module['message'] = "";
				$module["module"]="category/SubEditCat";				
				$this->load->view('dashboard/templates/default/header.php', $module);
			}
			else 
			{  
			if (isset($_FILES['userfile']['name']) != empty($_FILES['userfile']['name'])) 
			{ 
					try 
					{ 
					list($type1, $type) = split('[/]', $_FILES['userfile']['type']);
					$new_file_name=date("Ymdhis").".".$type;
						$config['upload_path'] = 'uploads/uploads/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['file_name'] = $new_file_name;
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload()) 
						{	
							$response['error'] = true;
							$response['message'] = 'Could not move the file!';
						}
						else{
						$response['message'] = 'File uploaded successfully!';						
						$file_path = $file_upload_url . basename($new_file_name);
					
					}
					} catch (Exception $e) 
					{
						$response['error'] = true;
						$response['message'] = $e->getMessage();					
					}
			} 
			else
				{
				$ads_sub_category_id    = $this->input->post('ads_sub_category_id');
				$image_path = $this->categorymodel->imge($ads_sub_category_id); 
				
				if($image_path)
				{				
					foreach($image_path as $data)
						{
						$file_path = $data->ads_sub_category_image_path;						
						}				 
						}else
						{
							$response['success']    = 0;
							$response['message']    = 'image path empty.';
							echo json_encode($response);  
						}	
				}
					$module['data']  = $this->categorymodel->subcatedit($ads_sub_category_id);
					
					$form_data = array(
						'ads_sub_category_name'      => set_value('ads_sub_category_name'),
						'ads_category_id'     				 => set_value('category_name'),
						'ads_sub_category_image_path'      => $file_path
												);		
					
						$ads_sub_category_id    = $this->input->post('ads_sub_category_id');
						if ($this->categorymodel->UpdasubCat($form_data, $ads_sub_category_id) == TRUE) 
								{
									$module['modulename'] = 'Edit Ads';
									$module['message'] = "";
									redirect ("category/AddSubCategory");
									$module["data"]       = $this->categorymodel->getUserData();
									$this->load->view('dashboard/templates/default/header.php', $module);
								}
								else
								{
									echo 'An error occurred saving your information. Please try again later';
								}
						}	
	}	


}
?>


