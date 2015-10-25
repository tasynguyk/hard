<?php
 
class language_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    
    public function get_show_language($page)
    {
        $this->db->where('code <>','en');
        $this->db->limit(3,$page);
        $q = $this->db->get('language');
        return $q->result();
    }

    public function get_num_language()
    {
        $this->db->where('code <>','en');
        $q = $this->db->get('language');
        return $q->num_rows();
    }
    
    public function search_show_language($page, $search)
    {
        $this->db->where('code <>','en');
        $this->db->like('name',$search);
        $this->db->limit(3,$page);
        $q = $this->db->get('language');
        return $q->result();
    }

    public function search_num_language($search)
    {
        $this->db->where('code <>','en');
        $this->db->like('name',$search);
        $q = $this->db->get('language');
        return $q->num_rows();
    }
    
    public function check_language($name, $code)
    {   
        $this->db->where('name',$name);
        $this->db->or_where('code',$code);
        $q = $this->db->get('language');
        return ($q->num_rows()>0)?FALSE:TRUE;
    }
    
    public function create_language($data)
    {
        $this->db->insert('language',$data);
    }
    
    public function check_language_byid($id)
    {
        $this->db->where('id',$id);
        $this->db->where('code <>','en');
        $q = $this->db->get('language');
        return ($q->num_rows()>0)?TRUE:FALSE;
    }
    
    public function get_language_byid($id)
    {
        $this->db->where('id',$id);
        $this->db->where('code <>','en');
        $q = $this->db->get('language');
        return $q->row();
    }
    
    public function check_edit_language($code, $name, $id)
    {
        $this->db->where('name',$name);
        $this->db->where('id <>',$id);
        $q1 = $this->db->get('language')->num_rows();
        
        $this->db->where('code',$code);
        $this->db->where('id <>',$id);
        $q2 = $this->db->get('language')->num_rows();
        return ($q1+$q2>0)?FALSE:TRUE;
    }
    
    public function update_language($info, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('language', $info);
    }
    
    public function delete_language($id)
    {
        $this->db->where('id',$id);
        $q = $this->db->get('language');
        
        $old = $q->row()->code;
        
        $this->db->where('id',$id);
        $this->db->delete('language');
        
        $this->db->where('language_code',$old);
        $this->db->delete('news_info');
    }
    
    public function get_name_byid($id)
    {
        $this->db->where("id",$id);
        $q = $this->db->get("language")->row()->name;
        return $q;
    }
}
 
?>