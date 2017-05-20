<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class VerifyLogin extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
	   $this->load->model('user','',TRUE);
	   $this->load->library('session');
	 }
	 
	 function index()
	 {
         
	 }
	 
	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');
	 
	   //query the database
	   $result = $this->user->login($username, $password);
	 
	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
                'user_id' => $row->user_id,
                'first_name' => $row->first_name
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
               
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Invalid username or password');
	     return false;
	   }
	 }
	}
	?>