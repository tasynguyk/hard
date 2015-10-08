<?php
 
class user_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function check_user($username, $email)
    {
        $q = $this->db->query("select * from user where "
                . "username='$username' or email='$email'");
        return $q->num_rows();
    }
     
}
 
?>