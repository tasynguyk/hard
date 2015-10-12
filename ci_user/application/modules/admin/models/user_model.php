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
       // echo $q->num_rows();
        if($q->num_rows()> 0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    function t()
    {
        echo 'ok';
    }
    
    function add_user($add)
    {
        $this->db->insert('user', $add);
    }
}
 
?>