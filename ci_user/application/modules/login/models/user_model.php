<?php
 
class user_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    function check_user($username, $password)
    {
        $q = $this->db->query("select * from user where "
                . "username = '$username' and password='$password'");
        if($q->num_rows()>0)
        {
            return TRUE;
        }
        else
        {
           return FALSE;
        }
    }
    
    public function get_user($username)
    {
        $q = $this->db->query("select * from user where "
                . "username = '$username'");
        return $q->row();
    }
    
}
 
?>