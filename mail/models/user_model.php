<?php
 
class user_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_user($id)
    {
        $q = $this->db->query("select * from user where id<>$id");
        return $q->result();
    }

}
 
?>