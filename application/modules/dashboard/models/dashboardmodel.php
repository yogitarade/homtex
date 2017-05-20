<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboardmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	function check_oldpwd($form_data,$tbl_nm)
	{
            $q = $this->db->query("select * from ". $tbl_nm ." where id=".$form_data['user_id']." and password='".  base64_encode($form_data['old_pwd'])."'");
            if($q->num_rows() ==1)
            {
                 $query=$this->db->query("update ". $tbl_nm ." set password='".base64_encode($form_data['new_pwd'])."' where id=".$form_data['user_id']);
                 return true;
            }
            return false;
        }
        
        
        function UpdateProfile($form_data)
        {
        $query=$this->db->query("update tbl_admin set fname='".$form_data['fname']."',lname='".$form_data['lname']."',phone='".$form_data['phone']."',email='".$form_data['email']."',address='".$form_data['address']."'  where id=".$form_data['id']);
        
            if ($this->db->affected_rows() >=0)
            {   
                    return TRUE;
            }
                return FALSE;	
        }
        
            public function geteditProfile($user_id)
        {
                $q = $this->db->query("select * from user_data where id=".$user_id);
                if($q->num_rows() > 0)
                {
                    return $q->result_array();
                }
                return false;
        }
        
      
        function check_email($email,$user_id)
     {
        $this->db->select('email');
        $this->db->from('tbl_admin');
        $this->db->where('email', $email);
        $this->db->where('id <>', $user_id);
        
      $query = $this->db->get();
        if($query->num_rows() >= 1) {
            return false;
        }
        return true; 
    }
    
    
        /*
        function alias_exist_check($value, $str)
        {
           $parts = explode('.', $str);
           $this->db->from($parts[0]);
           $this->db->where($parts[1], md5($value));
           $result = $this->db->get();
           echo $this->db->last_query();

           if($result->num_rows() > 0) {
              $this->form_validation->set_message('alias_exist_check', 'Already exists.');
              return FALSE;
           } else {
              return TRUE;
           }
        } */ 
}
?>
