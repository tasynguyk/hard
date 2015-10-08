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

    function check_user_edit($id, $username, $email)
    {
        $q1 = $this->db->query("select * from user where username='$username' and id <>'$id'");
        $q2 = $this->db->query("select * from user where email='$email' and id <>'$id'");
        if($q1->num_rows()+$q2->num_rows()>0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function edit_user_byid($data, $id)
    {
        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }
}
 
?>