<?php
 
class user_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    
    function check_user($username, $email)
    {
        $this->db->where("username",$username);
        $this->db->or_where("email",$email);
        $q = $this->db->get("user");
        
        if($q->num_rows()> 0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    function add_user($add)
    {
        $this->db->insert('user', $add);
    }
}
 
?>