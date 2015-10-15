<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Acl {
	public function __construct() {
                $this->ci =& get_instance();
                $this->ci->load->database(); 	
	}

	public function can_view($id, $resource)
        {
            //$this->load->database();
            $sql = "select * from `user_group`,`group_resource` "
                    . " where user_group.userID = $id and "
                    . " user_group.groupID = group_resource.groupID and "
                    . " group_resource.resourceID = $resource";
            return $this->ci->db->query($sql)->num_rows()>0?TRUE:FALSE;
        }
        
        public function can_edit($id, $resource)
        {
            //$this->load->database();
            $sql = "select * from `user_group`,`group_resource` "
                    . " where user_group.userID = $id and "
                    . " user_group.groupID = group_resource.groupID and "
                    . " group_resource.resourceID = $resource and "
                    . " group_resource.edit=1";
            return $this->ci->db->query($sql)->num_rows()>0?TRUE:FALSE;
        }
        
        public function can_create($id, $resource)
        {
            //$this->load->database();
            $sql = "select * from `user_group`,`group_resource` "
                    . " where user_group.userID = $id and "
                    . " user_group.groupID = group_resource.groupID and "
                    . " group_resource.resourceID = $resource and "
                    . " group_resource.create=1";
            return $this->ci->db->query($sql)->num_rows()>0?TRUE:FALSE;
        }
            
        public function can_delete($id, $resource)
        {
            //$this->load->database();
            $sql = "select * from `user_group`,`group_resource` "
                    . " where user_group.userID = $id and "
                    . " user_group.groupID = group_resource.groupID and "
                    . " group_resource.resourceID = $resource and "
                    . " group_resource.delete=1";
            return $this->ci->db->query($sql)->num_rows()>0?TRUE:FALSE;
        }
}
