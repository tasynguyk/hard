<?php
 
class mail_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create_mail($data)
    {
        $this->db->insert('mail',$data);
    }

    public function get_my_mail($id, $page)
    {
    	$q = $this->db->query("select m.subject as 'subject', u.username as 'username', m.id as 'id', m.time as 'time', m.seen as 'seen'  ".
    	 " from mail m, user u where m.idsend=$id and m.del_to=0 and u.id=m.idfrom ".
    	 " order by m.id DESC limit $page,3");
    	return $q->result();
    }

    public function num_my_mail($id)
    {
    	$q = $this->db->query("select m.subject as 'subject', u.username as 'username', m.id as 'id', m.time as 'time' ".
    	 " from mail m, user u where m.idsend=$id and m.del_to=0 and u.id=m.idfrom ");
    	return $q->num_rows();
    }
    
     public function num_unseen_mail($id)
    {
    	$q = $this->db->query("select m.subject as 'subject', u.username as 'username', m.id as 'id', m.time as 'time' ".
    	 " from mail m, user u where m.idsend=$id and m.del_to=0 and u.id=m.idfrom and m.seen=0 ");
    	return $q->num_rows();
    }	

    public function get_send_mail($id, $page)
    {
    	$q = $this->db->query("select m.subject as 'subject', u.username as 'username', m.id as 'id', m.time as 'time' ".
    	 " from mail m, user u where m.idfrom=$id and m.del_from=0 and u.id=m.idsend ".
    	 " order by m.id DESC limit $page,3");
    	return $q->result();
    }

    public function num_send_mail($id)
    {
    	$q = $this->db->query("select m.subject as 'subject', u.username as 'username', m.id as 'id', m.time as 'time' ".
    	 " from mail m, user u where m.idfrom=$id and m.del_from=0 and u.id=m.idsend ");
    	return $q->num_rows();
    }

    public function check_my_mail($id, $idmail)
    {
    	$q = $this->db->query("select * from mail where id=$idmail and idsend=$id and del_to=0");
    	if($q->num_rows()>0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    public function check_send_mail($id, $idmail)
    {
    	$q = $this->db->query("select * from mail where id=$idmail and idfrom=$id and del_from=0");
    	if($q->num_rows()>0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    public function get_mail_byid($id)
    {
    	$q = $this->db->query("select m.subject as 'subject', m.message as 'message', "
                . " m.time as 'time', u.username as 'username'" 
    		." from mail m, user u where m.id=$id and m.idfrom=u.id");
    	return $q->row();
    }

    public function send_mail_byid($id)
    {
    	$q = $this->db->query("select m.subject as 'subject', m.message as 'message', m.time as 'time', u.username as 'username' " 
    		." from mail m, user u where m.id=$id and m.idsend=u.id");
    	return $q->row();
    }

    public function delete_my_mail($id, $data)
    {
    	$this->db->where('id', $id);
	$this->db->update('mail', $data); 
    }

    public function delete_send_mail($id, $data)
    {
    	$this->db->where('id', $id);
	$this->db->update('mail', $data); 
    }
    
    public function seen_mail($id)
    {
        $data = array ('seen' => '1');
        $this->db->where('id',$id);
        $this->db->update('mail',$data);
    }
}
 
?>