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


class Dashboard extends CI_Controller {


    
    function __construct() {
        
        parent::__construct();
          $this->load->library('form_validation');
            $this->load->database();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('dashboardmodel');
    }

    
    
	public function index()
	{
	    	$cnt=  $this->session->userdata['cnt']['cnt']+1;
            $data=array('cnt'=>$cnt);
            $this->session->set_userdata('cnt',$data);
            $cnt=  $this->session->userdata['cnt']['cnt'];
            if($cnt==1)
            $module['message'] = 'You have sucessfully loggin';
            else
            $module['message'] = '';
            $user_data = $this->session->userdata('logged_in');

            $module['modulename'] = 'Dashboard';
           
            $module["module"] = "data/addData";
    
             redirect('data/addData');          
	}
        
        
	function addsite()
        {
            $module['message'] = '';
            $module['modulename'] = 'Dashboard';
            $module['actionname'] = 'Dashboard';
            $module["module"]="modules/addsite";
            $this->load->view('templates/default/header.php',$module);
        }
        
        function managesite()
        {
            $module['message'] = '';
            $module['modulename'] = 'Dashboard';
            $module['actionname'] = 'Dashboard';
            $module["module"]="modules/managesite";
            $this->load->view('templates/default/header.php',$module);
        }
        
	function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	  $this->session->unset_userdata('cnt');
		if(isset($_SESSION)){
			session_destroy();
		}
	   redirect('login', 'refresh');
	 }
          
         
         function changepwd()
         {   
             $user_data = $this->session->userdata('logged_in');
             $superadmin_data = $this->session->userdata('superadmin');
             $this->form_validation->set_rules('old_pwd', 'old password', 'required|callback_alias_exist_check[blue_users.password]');
             $this->form_validation->set_rules('new_pwd', 'new password', 'required|min_length[6]');
             $this->form_validation->set_rules('cn_pwd', 'confirm password', 'required|matches[new_pwd]');
            $module['message'] = '';
            $module['modulename'] = 'Change Password';
            $module['actionname'] = 'Dashboard';
            
            $module["error"]="";
            
            if($this->form_validation->run() == FALSE)
            {
                $module["module"]="dashboard/changepwd";
            $this->load->view('templates/default/header.php', $module);
            }
            else
            {
                if($user_data['id']!="")
                {
                    $user_id= $user_data['id'];
                    $tbl_nm="user_data";
                }
                else
                {
                    $user_id= $superadmin_data['id'];
                    $tbl_nm="tbl_superadmin";
                }
                $form_data=array(
                    'old_pwd'=>  $this->input->post ('old_pwd'),
                    'new_pwd'=>  $this->input->post('new_pwd'),
                    'cn_pwd'=>  $this->input->post('cn_pwd'),
                    'user_id'=>$user_id
                );
                
                if($this->dashboardmodel->check_oldpwd($form_data,$tbl_nm)==false)
                {
                    $module["module"]="dashboard/changepwd";
                     $module["error"]="old password is wrong";
                    $this->load->view('templates/default/header.php', $module);
                }
                else
                {
                    
                     $data=array('msg'=>'Password changed successfully');
                     $this->session->set_userdata('msg',$data);
                    redirect('dashboard/dashboard');
                }
            }
         }
         
         
         
                 function profile()
         {
             $user_data = $this->session->userdata('logged_in');
             $user_id= $user_data['id'];
            $module['message'] = 'Profile has been changed';
            $module['modulename'] = 'Change Profile';
            $module['actionname'] = 'Dashboard';
            $module["error"]="";
            
            $this->form_validation->set_rules('fname', 'first name', 'required');
            
            if($this->form_validation->run() == FALSE)
            {
                $module["module"]="dashboard/changeprofile";
                $module['records'] = $this->dashboardmodel->geteditProfile($user_id);
              $this->load->view('templates/default/header.php', $module);  
            }
            else
            {   $module["module"]="dashboard/dashboard";
                $form_data = array(
                                'fname' =>$this->input->post('fname'),
                                'lname'=> $this->input->post('lname'),
                                'email'=> $this->input->post('useremail'),
                                'phone'=> $this->input->post('contact'),
                                'address'=> $this->input->post('address'),
                                'id'=> $this->input->post('user_id')
                                 );
            
                if($this->dashboardmodel->check_email($form_data['email'],$form_data['id'])==true)
                {
                      if ($this->dashboardmodel->UpdateProfile($form_data) == TRUE) 
                    {
                            $this->session->set_flashdata('companyupdated', 'Category Updated Successfully!');
                            redirect('dashboard/dashboard');
                    }
                    
                } 
                else 
                {
                    
                    echo 'Email id is already exist.';
                   //echo "<script>window.location.href='javascript:history.back(-1);'</script>";
                     //
                }
            }
         }
         
        
}




