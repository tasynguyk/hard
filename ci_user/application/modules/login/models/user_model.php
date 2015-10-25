<?php
 
class user_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    function check_user($username, $password)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $q = $this->db->get('user');
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
        $this->db->where('username',$username);
        $q = $this->db->get('user');
        return $q->row();
    }
    
    public function get_group($id)
    {
        $this->db->select("group.name as 'name'");
        $this->db->from('user');
        $this->db->join("user_group","user_group.ID = user.id");
        $this->db->join("group",'group.ID = user_group.groupid');
        $this->db->where("user.id",$id);
        $q = $this->db->get();
        if($q->num_rows()!=0)
        {
            return $q->row()->name;
        }
        else
        {
            return $this->lang->line('free_user');
        }
    }
}
 
?>