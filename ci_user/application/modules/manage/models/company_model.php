<?php
 
class Company_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_lang()
    {
        if($this->session->userdata('lang'))
        {
            if($this->session->userdata('lang')=='english')
            {
                return 'en_name';
            }
            return 'vi_name';
        }
        return 'en_name';
    }
    
    public function get_company($page)
    {
        $lang = $this->get_lang();
        $q = $this->db->query("select company_id as 'id', $lang as 'name' from company order by $lang limit $page,3");
        return $q->result();
    }
    
    public function get_num_company()
    {
        $q = $this->db->query("select * from company");
        return $q->num_rows();
    }
    
    public function search_company($page, $search)
    {
        $lang = $this->get_lang();
        
        $q = $this->db->query("select company_id as 'id', $lang as 'name' from company where "
                . "$lang like '%$search%' order by $lang limit $page,3");
        return $q->result();
    }
    
    public function search_numrows_company($search)
    {
        $lang = $this->get_lang();
        
        $q = $this->db->query("select * from company where "
                . "$lang like '%$search%'");
        
        return $q->num_rows();
    }
    
    public function get_company_list()
    {
        $lang = $this->get_lang();
        
        $q = $this->db->query("select company_id as 'id', $lang as 'name' from company");
        
        return $q->result();
    }
    
    public function get_company_byid($id)
    {
        $q = $this->db->query("select * from company where company_id = '$id'");
        return $q->row();
    }
    
    public function check_company($en_name, $vi_name, $id)
    {
        $q1 = $this->db->query("select * from company where "
                . " vi_name='$vi_name' and company_id <> $id")->num_rows();
        $q2 = $this->db->query("select * from company where "
                . " en_name='$en_name' and company_id <> $id")->num_rows();
        
        
        if($q1+$q2>0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function update_company($id, $data)
    {
        $this->db->where('company_id', $id);
        $this->db->update('company', $data);
    }
    
    public function check_delete_company($id)
    {
        $q = $this->db->query("select * from user where companyid = $id");
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
        $this->db->where('company_id', $id);
        $this->db->delete('company');
    }
}
 
?>