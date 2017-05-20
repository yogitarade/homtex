<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Home_loginmodel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');        
    }
    
    function checklogin($username, $password) 
    {
        $this->db->select('id,fname, email, password, role_id');
        $this->db->from('user_data');
        $this->db->where('email', $username);
        $this->db->where('password',$password);
        $this->db->where('status','YES');
        $query = $this->db->get();
    
        if($query->num_rows() == 1) {
          foreach($query->result() as $rec)
          {
              $data = array(
                  'id'=>$rec->id,
                  'fname'=>$rec->fname,
                  'role_id'=>$rec->role_id,
                  'logged'=>'true'
              );
              //print_r($this->db->last_query());exit;
            $this->session->set_userdata('logged_in',$data);           
            return true;
          }          
        }
        return false; 
    }
    
    function check_role()
    {           
        $q = $this->db->query("select role from user_data where is_deleted=0");

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return false;
        } 
    
    function check_email($email)
    {
        $this->db->select('email');
        $this->db->from('user_data');
        $this->db->where('email', $email);
       
        $query = $this->db->get();
      
        if($query->num_rows() >= 1) {
            return true;
        }
        return false; 
    }
    
    function register($formdata=array())
    {
        $this->db->insert('user_data',$formdata);
        
        if ($this->db->affected_rows() == 1)
        {
            $this->db->select('id,fname, email');
            $this->db->from('user_data');
            $this->db->where('email', $formdata['email']);
            $this->db->limit(1);
            $query = $this->db->get();    
           // print_r($this->db->last_query());
            if($query->num_rows() == 1) 
            {
              foreach($query->result() as $rec)
              {
                  $data = array(
                      'id'=>$rec->id,
                      'fname'=>$rec->fname,
                      'logged'=>'true'
                  );
                $this->session->set_userdata('logged_in',$data);
                return true;
              }
            }   
        }
        return FALSE;	
    }
    
    public function emailVerification($user_id,$data)
    {
        if($user_id != NUll)
        {
            $this->db->where('id',$user_id);            
            $this->db->update('user_data',$data);
            return TRUE;
            
        }
        
        return FALSE;
    }   
    
    function getpassword($email)
    {
        $pwd='';
            $this->db->select('email,password');
            $this->db->from('user_data');
            $this->db->where('email', $email);
            $this->db->limit(1);
            $query = $this->db->get();    
            foreach ($query->result() as $rec)
            {
                $pwd=$rec->password;
            }
            return $pwd;;
    } 
    
	function getallrole()
        {
            $query = $this->db->query("select * from user_role where is_deleted=0");
			
            if($query->num_rows() > 0)
            {
                return $query->result();
            }
            return false;
        } 
    
}
?>
