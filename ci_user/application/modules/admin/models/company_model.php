<?php
 
class company_model extends CI_Model
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
    
    public function get_company()
    {
        $lang = $this->get_lang();
        $q = $this->db->query("select company_id as 'id', $lang as 'name' from company");
        return $q->result();
    }
    
    public function check_name_company($en_name, $vi_name)
    {
        $q = $this->db->query("select * from company where en_name='$en_name' or vi_name='$vi_name'");
        if($q->num_rows()>0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function insert_company($en_name, $vi_name)
    {
        $data = array
                (
                    'vi_name' => $vi_name,
                    'en_name' => $en_name
                );
        $this->db->insert('company',$data);
    }
}
 
?>