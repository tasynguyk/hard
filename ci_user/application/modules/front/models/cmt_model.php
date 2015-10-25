<?php
 
class cmt_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    
    public function get_cmt($id, $page)
    {
        $this->db->select("comment.content as 'content', user.username as 'username', comment.time as 'time'");
        $this->db->from("comment");
        $this->db->join("user","comment.userid=user.id");
        $this->db->where("comment.newsid",$id);
        $this->db->order_by("comment.id","desc");
        $this->db->limit(3,$page);
        $q = $this->db->get();
        
        
        return $q->result();
    }
    
    public function num_cmt($id)
    {
        $this->db->select("comment.content as 'content', user.username as 'username', comment.time as 'time'");
        $this->db->from("comment");
        $this->db->join("user","comment.userid=user.id");
        $this->db->where("comment.newsid",$id);
        $q = $this->db->get();
        
        
        return $q->num_rows();
    }
    
    public function create_cmt($data)
    {
        $this->db->insert("comment",$data);
        
        $id = $this->db->insert_id();
        
        $add = array(
          'userid' => $data['userid'],
          'newsid' => $data['newsid'],
          'time'  => $data['time'],
          'status' => 0,
          'cmtid' => $id  
        );
        
        $this->db->insert("notification",$add);
    }
    
}
 
?>