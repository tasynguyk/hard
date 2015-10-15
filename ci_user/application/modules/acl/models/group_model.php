<?php
 
class group_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    public function list_group($page)
    {
        $q = $this->db->query("select * from `group` where id<>1 order by name limit $page,3");
        return $q->result();
    }

    public function search_group($page, $search) 
    {
        $q = $this->db->query("select * from `group` where name like '%$search%' and id<>1 order by name limit $page,3");
        return $q->result();
    }

    public function search_numrow_group($search)
    {
        $q = $this->db->query("select * from `group` where name like '%$search%' and id<>1");
        return $q->num_rows();
    }
    
    public function numrows_group()
    {
        $q = $this->db->query("select * from `group` where id<>1 order by name");
        return $q->num_rows();
    }
    
    public function check_create_group($name)
    {
        $q = $this->db->query("select * from `group` where name='$name'");
        if($q->num_rows()>0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function check_edit_group($id, $name)
    {
        $q = $this->db->query("select * from `group` where name='$name' and ID<>$id");
        if($q->num_rows()>0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function edit_group($id, $update)
    {
        $this->db->where('ID',$id);
        $this->db->update('group', $update);
    }
    
    public function get_group_byid($id)
    {
        $q = $this->db->query("select * from `group` where ID=$id");
        return $q->row();
    }

    public function create_group($info)
    {
        $this->db->insert('group', $info);
    }
    
    public function  check_id_group($id)
    {
        $q = $this->db->query("select * from `group` where ID=$id and ID<>1");
        return ($q->num_rows()>0)?TRUE:FALSE;
    }


    public function get_user_group($id, $page)
    {
        $q = $this->db->query("select user.username as 'username', user.email as 'email',user.id as 'id'"
                . " from user, user_group "
                . " where user.id=user_group.userid and "
                . " user_group.groupid=$id order by user.username limit $page,3");
        return $q->result();
    }

    public function search_numrow_member($search, $id)
    {
        $q = $this->db->query("select user.username as 'username', user.email as 'email',user.id as 'id'"
                . " from user, user_group "
                . " where user.id=user_group.userid and user.username like '%$search%' and "
                . " user_group.groupid=$id order by user.username");
        return $q->num_rows();
    }

    public function search_member_group($page, $search, $id)
    {
        $q = $this->db->query("select user.username as 'username', user.email as 'email',user.id as 'id'"
                . " from user, user_group "
                . " where user.id=user_group.userid and user.username like '%$search%' and "
                . " user_group.groupid=$id order by user.username limit $page,3");
        return $q->result();
    }

    public function user_numrows_group($id)
    {
        $q = $this->db->query("select user.username as 'username', user.email as 'email',user.id as 'id'"
                . " from user, user_group "
                . " where user.id=user_group.userid and "
                . " user_group.groupid=$id");
        return $q->num_rows();
    }
    
    public function free_user_group()
    {
        $q = $this->db->query("select * from user where id not in "
                . " (select userid from user_group)");
        return $q->result();
    }
    
    public function add_user_group($userid, $groupid)
    {
        $info = array(
            'userid' => $userid,
            'groupid' => $groupid
            );
        $this->db->insert('user_group', $info);
    }
    
    public function delete_member_group($userid, $groupid)
    {
        $this->db->where('userid',$userid);
        $this->db->where('groupid',$groupid);
        $this->db->delete('user_group');
    }
    
    public function get_resource_group($groupid)
    {
        $q = $this->db->query("select gr.ID as 'id', rc.resource_name as 'name',"
                . " gr.create as 'create', gr.edit as 'edit', gr.delete as 'delete'"
                . " from group_resource gr, resource rc"
                . " where groupid = $groupid and "
                . " gr.resourceid=rc.ID");
        return $q->result();
    }
    
    public function edit_rs_group($id, $info)
    {
        $this->db->where('ID',$id);
        $this->db->update('group_resource',$info);
    }
    
    public function free_rs_group($id)
    {
        $q = $this->db->query("select ID, resource_name from resource rs where"
                . " ID<=2 and ID not in ("
                . " select gr.resourceID from group_resource gr "
                . " where gr.groupID=$id)");
        return $q->result();
    }
    
    public function add_rs_group($info)
    {
        $this->db->insert('group_resource', $info);
    }
    
    public function delete_rs_group($id)
    {
        $this->db->where('ID',$id);
        $this->db->delete('group_resource');
    }
    
    public function delete_group($id)
    {
        $this->db->where('groupid',$id);
        $this->db->delete('group_resource');
        
        $this->db->where('groupid',$id);
        $this->db->delete('user_group');
        
        $this->db->where('ID',$id);
        $this->db->delete('group');
    }
}
 
?>