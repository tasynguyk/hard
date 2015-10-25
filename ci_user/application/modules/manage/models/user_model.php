<?php
 
class user_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_lang()
    {
        return $this->session->userdata('lang');
    }
            
    function get_list_user($id, $permisson, $page, $order)
    {
        $lang = $this->get_lang();
        // 
        $this->db->where("id <>",$id);
        $this->db->where('permission <',$permisson);
        $this->db->order_by($order,'asc');
        $this->db->limit(3,$page);
        $q = $this->db->get('user');
        $ret = $q->result();
        foreach ($ret as $l)
        {
            $this->db->where('company_id',$l->companyid);
            $this->db->where('language',$lang);
            $n = $this->db->get('company_name');
            if($n->num_rows()>0)
            {
                $l->name = $n->row()->name;
            }
            else
            {
                $l->name = '('.$this->lang->line("unname_company").' '.$l->companyid.')';
            }
        }
        return $ret;
    }
    
    function get_listuser_nopage($id, $permisson, $order)
    {
        $lang = $this->session->userdata("lang");
        
        $this->db->select("user.id, user.username, user.email, user.dob, user.status, user.gender, user.permission, company_name.name");
        $this->db->from("user");
        $this->db->join("company","user.companyid=company.id");
        $this->db->join("company_name",'company_name.company_id=company.id');
        $this->db->where('company_name.language',$lang);
        $this->db->where('user.permission   <',$permisson);
        $this->db->where('user.id <>',$id);
        $this->db->order_by($order);
        $q = $this->db->get();
        
        return $q->result();
    }
    
    
    function search_user_nopage($id, $permisson,  $order, $search)
    {
        $lang = $this->session->userdata("lang");
        
        $this->db->select("user.id, user.username, user.email, user.dob, user.status, user.gender, user.permission, company_name.name");
        $this->db->from("user");
        $this->db->join("company","user.companyid=company.id");
        $this->db->join("company_name",'company_name.company_id=company.id');
        $this->db->where('company_name.language',$lang);
        $this->db->where('user.permission   <',$permisson);
        $this->db->where('user.id <>',$id);
        $this->db->like("user.username",$search);
        $this->db->order_by($order);
        $q = $this->db->get();
        return $q->result();
    }
    
    function search_user($id, $permisson, $page, $order, $search)
    {
        $lang = $this->get_lang();
        
        $this->db->where("id <>",$id);
        $this->db->like("username",$search);
        $this->db->where('permission <',$permisson);
        $this->db->order_by($order,'asc');
        $this->db->limit(3,$page);
        $q = $this->db->get('user');
        $ret = $q->result();
        
        
        $ret = $q->result();
        foreach ($ret as $l)
        {
            $this->db->where('company_id',$l->companyid);
            $this->db->where('language',$lang);
            $n = $this->db->get('company_name');  
            if($n->num_rows()>0)
            {
                $l->name = $n->row()->name;
            }
            else
            {
                $l->name = '('.$this->lang->line("unname_company").' '.$l->companyid.')';
            }
        }
        return $ret;
    }
    
    function search_numrow_user($id, $permisson, $search)
    {
        $this->db->where("id <>",$id);
        $this->db->where("permission <",$permisson);
        $this->db->like("username",$search);
        $q = $this->db->get("user");
        return $q->num_rows();
    }
    
    function  get_user_byid($id)
    {
        $this->db->where('id',$id);
        $q = $this->db->get("user");
        return $q->row();
    }
            
    function  get_numrows_user($id, $permisson)
    {
        $this->db->where("id <>",$id);
        $this->db->where("permission <",$permisson);
        $q = $this->db->get("user");
        
        return $q->num_rows();
    }
    
    function  delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user'); 
    }

    function check_user_edit($id, $username, $email)
    {
        $this->db->select("*")->from("user")->where('username',$username)->where('id <>',$id);
        $q1 = $this->db->get();
        $this->db->select("*")->from("user")->where('email',$mail)->where('id <>',$id);
        $q2 = $this->db->get();
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