<?php
 
class user_model extends MX_Model
{
     
    function check_user($username, $email)
    {
        $q = $this->db->query("select * from user where"
                . "username='$username' or email='$email'");
        //return $q->num_rows();
       // echo 'gdfgdf'
       // return 'fdsfs';
    }
     
}
 
?>