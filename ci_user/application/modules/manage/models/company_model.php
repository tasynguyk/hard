<?php
 
class Company_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_lang()
    {
        return $this->session->userdata('lang');
    }
    
    public function get_company($page)
    {
        $lang = $this->get_lang();
        $this->db->order_by("id","asc");
        $this->db->limit("3",$page);
        $q = $this->db->get("company");
        $ret = array();
        foreach ($q->result() as $l)
        {
            $p = new stdClass();
            $p->id = $l->id;
            
            $this->db->where("company_id",$p->id);
            $this->db->where("language",$lang);
            $n = $this->db->get("company_name");
            
            if($n->num_rows()>0)
            {
                $p->name = $n->row()->name;
            }
            else
            {
                $p->name = '('.$this->lang->line("unname_company").' '.$p->id.')';
            }
            array_push($ret, $p);
        }
        return $ret;
    }
    
    public function get_num_company()
    {
        $q = $this->db->get("company");
        
        return $q->num_rows();
    }
    
    public function search_company($page, $search)
    {
        $lang = $this->get_lang();
        
        $this->db->select("company.id as 'id', company_name.name as 'name'");
        $this->db->from("company");
        $this->db->join("company_name","company.id = company_name.company_id");
        $this->db->where("company_name.language",$lang);
        $this->db->like("company_name.name",$search);
        $this->db->order_by("company_name.name","asc");
        $this->db->limit("3",$page);
        $q = $this->db->get();
        
        return $q->result();
    }
    
    public function search_numrows_company($search)
    {
        $lang = $this->get_lang();
        
        $this->db->select("company.id as 'id', company_name.name as 'name'");
        $this->db->from("company");
        $this->db->join("company_name","company.id = company_name.company_id");
        $this->db->where("company_name.language",$lang);
        $this->db->like("company_name.name",$search);
        $q = $this->db->get();
        
        return $q->num_rows();
    }
    
    public function get_company_list()
    {
        $lang = $this->get_lang();
        $q = $this->db->get("company");
        $ret = array();
        foreach ($q->result() as $l)
        {
            $p = new stdClass();
            $p->id = $l->id;
            
            $this->db->where("company_id",$p->id);
            $this->db->where("language",$lang);
            $n = $this->db->get("company_name");
            
            if($n->num_rows()>0)
            {
                $p->name = $n->row()->name;
            }
            else
            {
                $p->name = '('.$this->lang->line("unname_company").' '.$p->id.')';
            }
            array_push($ret, $p);
        }
        return $ret;
    }
    
    public function get_company_byid($id)
    {
        $this->db->where("id",$id);
        $q = $this->db->get("company");
        
        $lang = $this->get_lang();
        $ret = new stdClass();
        $ret->id = $id;
        
        $this->db->where("company_id",$id);
        $this->db->where("language",$lang);
        $name = $this->db->get("company_name");
        
        if($name->num_rows()>0)
        {
            $ret->name = $name->row()->name;
        }
        else
        {
            $ret->name = '';
        }
        return $ret;
    }
    
    public function check_company($name, $id)
    {
        $lang = $this->get_lang();
        
        $this->db->where("company_id <>",$id);
        $this->db->where("language",$lang);
        $this->db->where("name",$name);
        $q = $this->db->get("company_name");
        
        if($q->num_rows()>0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function update_company($id, $name)
    {
        $info = array('name'=>$name);
        $lang = $this->get_lang();
        //$q = $this->db->query("select * from company_name where company_id=$id and language = '$lang'");
        $this->db->where("company_id",$id);
        $this->db->where("language",$lang);
        $q = $this->db->get("company_name");
        if($q->num_rows()>0)
        {
            $this->db->where('company_id', $id);
            $this->db->where('language',$lang);
            $this->db->update('company_name', $info);
        }
        else
        {
            $add = array (
                'name' => $name,
                'language' => $lang,
                'company_id' => $id
            );
            $this->db->insert('company_name',$add);
        }
    }
    
    public function check_delete_company($id)
    {
        $this->db->where("companyid",$id);
        $q = $this->db->get("user");
        if($q->num_rows()>0)
        {
            return FALSE;
        }
        else
        {
            return true;
        }
    }
    
    public function  delete_company($id)
    {
        $this->db->where('company_id',$id);
        $this->db->delete('company_name');
        
        $this->db->where('id', $id);
        $this->db->delete('company');
    }
}
 
?>