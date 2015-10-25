<?php
 
class group_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    public function list_group($page)
    {
        //$q = $this->db->query("select * from `group` where id<>1 order by name limit $page,3");
        $this->db->where('id <>','1');
        $this->db->order_by("name","asc");
        $this->db->limit("3",$page);
        $q = $this->db->get("group");
        return $q->result();
    }

    public function search_group($page, $search) 
    {
       // $q = $this->db->query("select * from `group` where name like '%$search%' and id<>1 order by name limit $page,3");
        
        $this->db->where('id <>','1');
        $this->db->like("name",$search);
        $this->db->order_by("name","asc");
        $this->db->limit("3",$page);
        $q = $this->db->get("group");
        
        return $q->result();
    }

    public function search_numrow_group($search)
    {
       // $q = $this->db->query("select * from `group` where name like '%$search%' and id<>1");
        
        $this->db->where('id <>','1');
        $this->db->like("name",$search);
        $q = $this->db->get("group");
        
        return $q->num_rows();
    }
    
    public function numrows_group()
    {
        $q = $this->db->query("select * from `group` where id<>1 order by name");
        return $q->num_rows();
    }
    
    public function check_create_group($name)
    {
        //$q = $this->db->query("select * from `group` where name='$name'");
        
        $this->db->where("name",$name);
        $q = $this->db->get("group");
        
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
        //$q = $this->db->query("select * from `group` where name='$name' and ID<>$id");
        
        $this->db->where("id <>",$id);
        $this->db->where("name",$name);
        $q = $this->db->get("group");
        
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
        $this->db->where("id",$id);
        $q = $this->db->get("group");
        
        return $q->row();
    }

    public function create_group($info)
    {
        $this->db->insert('group', $info);
    }
    
    public function  check_id_group($id)
    {
        $this->db->where("id",$id);
        $this->db->where("id <>",1);
        $q = $this->db->get("group");
        return ($q->num_rows()>0)?TRUE:FALSE;
    }


    public function get_user_group($id, $page)
    {   
        $this->db->select("user.username as 'username', user.email as 'email',user.id as 'id'");
        $this->db->from("user");
        $this->db->join("user_group","user.id=user_group.userid");
        $this->db->where("user_group.groupid",$id);
        $this->db->order_by("user.username","asc");
        $this->db->limit('3',$page);
        $q = $this->db->get();
        
        return $q->result();
    }

    public function search_numrow_member($search, $id)
    {
        
        $this->db->select("user.username as 'username', user.email as 'email',user.id as 'id'");
        $this->db->from("user");
        $this->db->join("user_group","user.id=user_group.userid");
        $this->db->where("user_group.groupid",$id);
        $this->db->like("user.username",$search);
        $q = $this->db->get();
        
        return $q->num_rows();
    }

    public function search_member_group($page, $search, $id)
    {
        $this->db->select("user.username as 'username', user.email as 'email',user.id as 'id'");
        $this->db->from("user");
        $this->db->join("user_group","user.id=user_group.userid");
        $this->db->where("user_group.groupid",$id);
        $this->db->like("user.username",$search);
        $this->db->order_by("user.username","asc");
        $this->db->limit(3,$page);
        $q = $this->db->get();
        
        
        return $q->result();
    }

    public function user_numrows_group($id)
    {
        $this->db->select("user.username as 'username', user.email as 'email',user.id as 'id'");
        $this->db->from("user");
        $this->db->join("user_group","user.id=user_group.userid");
        $this->db->where("user_group.groupid",$id);
        $q = $this->db->get();
        
        return $q->num_rows();
    }
    
    public function free_user_group()
    {
        $this->db->select("*")->from("user");
        $this->db->where("id not in (select userid from user_group)",null,false);
        
        $q = $this->db->get();
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
        $this->db->select("group_resource.ID as 'id', resource.resource_name as 'name',group_resource.create as 'create', group_resource.edit as 'edit', group_resource.delete as 'delete'");
        $this->db->from("group_resource");
        $this->db->join("resource","resource.ID=group_resource.resourceid");
        $this->db->where("groupid",$groupid);
        $q = $this->db->get();
        return $q->result();
    }
    
    public function edit_rs_group($id, $info)
    {
        $this->db->where('ID',$id);
        $this->db->update('group_resource',$info);
    }
    
    public function free_rs_group($id)
    {
        $this->db->select("ID, resource_name")->from("resource");
        $this->db->where("id <>",4);
        $this->db->where("id <>",3);
        $this->db->where("id not in (select resourceID from group_resource where groupID=$id)",null,false);
        $q = $this->db->get();
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
    
    public function  get_name_group($id)
    {
        $this->db->select("*")->from("group")->where("ID",$id);
        $q = $this->db->get();
        return $q->row()->name;
    }
}
 
?>