<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_login extends CI_Controller {
 
function __construct()
 {
  parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('home_loginmodel');
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
    $this->load->library('email'); 
    //$this->load->model('common/Common_model', 'common');
     $this->load->helper('cookie');
	 
 }
 
 function index()
 {
     $error['err']='';
     $this->form_validation->set_rules('username', 'user name', 'required');
     $this->form_validation->set_rules('password', 'password', 'required');
  
    if($this->form_validation->run()==false)
    {       
        $this->load->view('login/home_login',$error);
    }
    else 
    { 
       $username = $this->input->post('username');
       $password = base64_encode($this->input->post('password'));
      
       if($this->home_loginmodel->checklogin($username,$password)==TRUE)
       {
         if($this->input->post("remember")=="1")
           {
                $this->rememberme($username,$password);
           }
          
          $data=array('cnt'=>0);
        
          $this->session->set_userdata('cnt',$data);
           //print_r($data);exit;
            redirect('dashboard/dashboard',$module);
       }
       else
       {
            $error['err']='Username or password is wrong or verify your registred email';
            $this->load->view('login/login_view',$error);
       }      
   
        $username = $this->input->post('username');
        $password = base64_encode($this->input->post('password'));

        if($this->home_loginmodel->checklogin($username,$password)==TRUE)
        {
             $module['modulename'] = 'Dashboard';
             $module['message'] = "";//$this->session->flashdata('companyupdated');
             $module["module"]="dashboard/dashboard";
             $this->load->view('dashboard/templates/default/header.php', $module);
        }
        
      }
 }
 
 
    
 
 function forgotpassword()
 {
    $error['err']='';
    $this->form_validation->set_rules('useremail','useremail','required|email');
    if($this->form_validation->run()==false)
    {
       $this->load->view('login/forgotpassword',$error);
    }
    else 
    {                   
        $email=  $this->input->post('useremail');
       
       if($this->loginmodel->check_email($email)==TRUE)
       {   
           $message='';
           $headers='';
           
           $password=  base64_decode($this->loginmodel->getpassword($email));
          
           $to       = $email;
            
            $subject  = 'This mail from bluecheck ';
            
            $message .= 'Bluecheck'."\r\n";
            
            $message .= 'Your password is : '.$password;// \r\n';
           
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $headers .= 'From: noreplay@vestigo.in' . "\r\n" ;

            $send = mail($to, $subject, $message, $headers);
            
            $error['err']='Password has been sent';
            $this->load->view('login/login_view',$error);
       }
       else
       {
            $error['err']='Email ID is not registered';
            $this->load->view('login/forgotpassword',$error);
       }
    }
    
 }
 
    public function verifyByEmail()
    {
       $user_id = $this->uri->segment(3,'0');

        $data = array(
            'status' => 'YES',
            
            'email_verify' => '1'

        );

        if($this->loginmodel->emailVerification($user_id,$data)==TRUE)
        {                
           $error['err']='Your account is verified'; 

           $this->load->view('login/login_view',$error);

        }  else {

            echo 'Your Account activation Fail ';

     }   
     
 }
 
 public function randomPassword() {
     
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    
    $pass = '';                           //password is a string
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = mt_rand(0, $alphaLength);    
        $pass = $pass.$alphabet[$n];      //append a random character
    }
    return $pass; 
}

function addRemerberme($insertData=array(),$expire)
    {
             $this->common->setUserCookie('uname',$insertData['email'], $expire);
             $this->common->setUserCookie('pwd',$insertData['password'], $expire);

    }
        
    function rememberme($username,$password)
    {
        if($username!=NULL)
        {
            $insertData=array();
            $insertData['email']=$username;
            $insertData['password']=$password;
            $expire=60*60*24*100;
                $this->addRemerberme($insertData,$expire); 
        }
        else
        {
            $this->common->removeRemeberme(); 
        }
    }
    
    
}
?>
               
