<?php
 
class lang_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    
    public function get_name($code)
    {
        $this->db->where('code',$code);
        $q = $this->db->get("language");
        
        return $q->row()->name;
    }
    
}
 
?>