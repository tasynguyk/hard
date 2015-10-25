<?php
 
class cmt_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    
    public function get_cmt($page)
    {
        $this->db->select("comment.content as 'content', user.username as 'username', comment.time as 'time', comment.newsid as 'id', comment.id as 'cmt_id'");
        $this->db->from("comment");
        $this->db->join("user","comment.userid=user.id");
        $this->db->order_by("comment.id","desc");
        $this->db->limit(3,$page);
        $q = $this->db->get();
        
        
        return $q->result();
    }
    
    public function num_cmt()
    {
        $this->db->select("comment.content as 'content', user.username as 'username', comment.time as 'time'");
        $this->db->from("comment");
        $this->db->join("user","comment.userid=user.id");
        $q = $this->db->get();
        
        
        return $q->num_rows();
    }
    
    public function get_cmt_byid($id)
    {
        $this->db->where("id",$id);
        $q = $this->db->get("comment");
        return $q->row();
    }
    
    public function check_cmt_byid($id)
    {
        $this->db->where("id",$id);
        $q = $this->db->get("comment");
        
        return ($q->num_rows()>0)?TRUE:FALSE;
    }
    
    public function delete_cmt($id)
    {
        $this->db->where("id",$id);
        $this->db->delete("comment");
        
        $this->db->where("cmtid",$id);
        $this->db->delete("notification");
    }
    
    public function edit_cmt($id, $content)
    {
        $data = array('content' => $content);
        
        $this->db->where("id",$id);
        $this->db->update("comment",$data);
    }
    
}
 
?>