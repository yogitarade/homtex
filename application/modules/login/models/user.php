<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('user_id,email,first_name, password');
   $this -> db -> from('inv_users');
   $this -> db -> where('email = ' . "'" . $username . "'");
   $this -> db -> where('password = ' . "'" . $password . "'");
   $this -> db -> limit(1);
	 
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>