<?php
 
class user_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_list_user($id, $permisson, $page, $order)
    {
        $q = $this->db->query("select * from user where id<>'$id' and "
                . "permission<$permisson order by $order limit $page,3");
        return $q->result();
    }
    
    function  get_user_byid($id)
    {
        $q = $this->db->query("select * from user where id='$id'");
        return $q->row();
    }
            
    function  get_numrows_user($id, $permisson)
    {
        $q = $this->db->query("select * from user where id<>'$id' and "
                . "permission<$permisson");
        return $q->num_rows();
    }
    
    function  delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user'); 
    }
}
 
?>