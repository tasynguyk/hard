<?php
 
class notification_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    
    public function get($page)
    {
        $this->db->select("notification.newsid as 'newsid' ,notification.id as 'id', notification.time as 'time', user.username as 'username'");
        $this->db->from("notification");
        $this->db->join("user","user.id = notification.userid");
        $this->db->order_by("notification.id","desc");
        $this->db->limit(3,$page);
        $q = $this->db->get();
        
        
        return $q->result();
    }
    
    public function num()
    {
        $q = $this->db->get("notification");
        return $q->num_rows();
    }
    
    public function read()
    {
        $this->db->update("notification",array('status'=>1));
    }
    
}
 
?>