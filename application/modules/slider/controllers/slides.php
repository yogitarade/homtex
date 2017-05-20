<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Slides extends CI_Controller {


    
    function __construct() {
        
        parent::__construct();
          $this->load->library('form_validation');
            $this->load->database();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('slidesmodel');
	    $this->load->helper('file');
			


    }

    
    
	public function AddNewSlide()
	{
			$user_data = $this->session->userdata('logged_in');
           
            if(!isset($user_data['username'])){
                redirect('login',$error);
            }
			$user_data = $this->session->userdata('logged_in');
			$this->form_validation->set_rules('slider_path', 'Slider Path', '');
			
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
			$module['modulename'] 	= 'slider ';
			$module["module"]     		= "slides/slider";    //folder name/controller name
			$module["sliderimg"]       	= $this->slidesmodel->slider(); 
		
		if ($this->form_validation->run() == FALSE) 
		{
			$module['modulename'] = 'Post Ads';
			$module['message'] = "";
			$module["module"]="slider/addslide";
		    $this->load->view('dashboard/templates/default/header.php', $module);
		}
		else 
		{
			$target_path1 = "uploads/uploads/";
			$server_ip = base_url();	
			$file_upload_url = $server_ip . $target_path1;
			list($width, $height, $type, $attr) = getimagesize($_FILES['userfile']['tmp_name']); 
			$min_width = "900";	
			$min_height = "400";
				
			if (isset($_FILES['userfile']['name'])&&($width >= $min_width) && ($height >= $min_height) ) 
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
						echo '<script>
			alert("Please Select the (900) height and (400) width");
			document.location ="http://hometex.integrationsolution.in/index.php/slider/slides/AddNewSlide";
			</script>';
				}
			$form_data = array(
				'slider_path'      => $file_path,		
				);		
				//print_r($form_data);exit;
			if ($this->slidesmodel->SaveForm($form_data) == TRUE) 
			{
			$module['modulename'] = 'Post Ads';
			$module['message'] = "Post Successfully";
			$module["module"]="slider/AddNewSlide";
			redirect("slider/slides/AddNewSlide");
		    //$this->load->view('dashboard/templates/default/header.php', $module); 
			}
			else
			{
				echo 'An error occurred saving your information. Please try again later';
			}
		}
	}
	

		
	 function deleteads()
	{              
           
		$module['modulename']   = 'Manage All Users';
                
		$module['message']      = "";
		
                $slide_id    = $this->uri->segment(4,'0');
              
		//$module["data"] = $this->postadsmodel->deleteUser($ads_id);
               
		if ($this->slidesmodel->deleteUser($slide_id) == true) 
			{
				redirect("slider/slides/AddNewSlide");
			
			}
	}
	

	public function EditSlider()
    {
			$user_data = $this->session->userdata('logged_in');
           
            if(!isset($user_data['username'])){
                redirect('login',$error);
            }
			$user_data = $this->session->userdata('logged_in');
			$this->form_validation->set_rules('slide_id', 'sub cat id');	
			
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
			$slide_id    = $this->uri->segment(4,'0');		
			
			$target_path1 = "uploads/uploads/";
			$server_ip = base_url();	
			$file_upload_url = $server_ip . $target_path1;
			
			if ($this->form_validation->run() == FALSE) 
			{ 
				$module['data']  = $this->slidesmodel->subcatedit($slide_id);
				$module['modulename'] = 'Edit Ads';
				$module['message'] = "";
				$module["module"]="slider/EditSlider";				
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
					
				$slide_id    = $this->input->post('slide_id');
				$image_path = $this->slidesmodel->imge($slide_id); 
				
				if($image_path)
				{				
					foreach($image_path as $data)
						{
						$file_path = $data->slider_path;						
						}				 
						}else
						{
							$response['success']    = 0;
							$response['message']    = 'image path empty.';
							echo json_encode($response);  
						}	
				}
					$module['data']  = $this->slidesmodel->subcatedit($slide_id);
					
					$form_data = array(
						'slider_path'      => $file_path
												);		
					
						$slide_id    = $this->input->post('slide_id');
						

						if ($this->slidesmodel->UpdateSlider($form_data, $slide_id) == TRUE) 
								{
									$module['modulename'] = 'Edit Ads';
									$module['message'] = "";
									redirect ("slider/slides/AddNewSlide");
									$module["data"]       = $this->categorymodel->getUserData();
									$this->load->view('dashboard/templates/default/header.php', $module);
								}
								else
								{
									echo 'Please Select image And Change. Please try again later';
								}
						}	
	}	
	



}


?>


