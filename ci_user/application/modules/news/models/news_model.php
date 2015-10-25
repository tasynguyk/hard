<?php
 
class news_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    
    public function get_list_news($page, $lang)
    {
        $this->db->where('language_code',$lang);
        $q = $this->db->get('news_info',3,$page);
        return $q->result();
    }
    
    public function get_row_news($lang)
    {
        $this->db->where('language_code',$lang);
        $q = $this->db->get('news_info');
        return $q->num_rows();
    }
    
    public function search_list_news($page, $lang, $search)
    {
        $this->db->where('language_code',$lang);
        $this->db->like('title',$search);
        $this->db->limit(3,$page);
        $q = $this->db->get('news_info');
        return $q->result();
    }
    
    public function search_row_news($lang, $search)
    {
        
        $this->db->where('language_code',$lang);
        $this->db->like('title',$search);
        $q = $this->db->get('news_info');
        return $q->num_rows();
    }
    
    public function get_lang()
    {
        $q = $this->db->get('language');
        return $q->result();
    }
    
    public function check_news($title, $lang)
    {
        $this->db->where('language_code',$lang);
        $this->db->where('title',$title);
        $q = $this->db->get('news_info');
        return ($q->num_rows()>0)?FALSE:TRUE;
    }
    
    public function update_news($id, $info, $lang)
    {
        $this->db->where('new_id',$id);
        $this->db->where('language_code',$lang);
        $q = $this->db->get('news_info')->num_rows();
        if($q==0)
        {
            $info['language_code'] = $lang;
            $info['new_id'] = $id;
            $this->db->insert('news_info',$info);
        }
        else
        {
            $this->db->where('new_id',$id);
            $this->db->where('language_code', $lang);
            $this->db->update('news_info',$info); 
        }
        
    }
    
    public function get_news($id)
    {
        $this->db->where('id',$id);
        $q = $this->db->get('news');
        return $q->row();
    }
    
    public function delete_news($id)
    {
        $this->db->where('new_id',$id);
        $this->db->delete('news_info');
        
        $this->db->where('id',$id);
        $this->db->delete('news');
    }
    
    public function update_img_news($id, $image)
    {
        $new = $this->get_news($id);
        $update = array('image' => $image);
        $this->db->where('id',$id);
        $this->db->update('news',$update);
        return $new->image;
    }

        public function check_edit_news($title, $lang, $id)
    {
        $this->db->where('language_code',$lang);
        $this->db->where('title',$title);
        $this->db->where('new_id <>',$id);
        $q = $this->db->get('news_info');
        return ($q->num_rows()>0)?FALSE:TRUE;
    }
    
    public function insert_news($image, $info)
    {
        $new_add = array('image'=>$image);
        $this->db->insert('news',$new_add);
        
        $id = $this->db->insert_id();
        $info['new_id'] = $id;
        $this->db->insert('news_info', $info);
    }
    
    public function check_news_byid($id)
    {
        $this->db->where('id',$id);
        $q = $this->db->get('news');
        return ($q->num_rows()>0)?TRUE:FALSE;
    }
    
    public function get_news_byid($id)
    {
        $this->db->where('new_id',$id);
        $q = $this->db->get('news_info');
        return $q->row();
    }
    
    public function get_image_news($id)
    {
        $this->db->where('id',$id);
        $q = $this->db->get('news');
        return $q->row()->image;
    }
    
    public function get_news_lang($id, $lang)
    {
        $this->db->where('new_id',$id);
        $this->db->where('language_code', $lang);
        $q = $this->db->get('news_info');
        return $q->row();
    }

    public function get_code_byname($name)
    {
        $this->db->where("name",$name);
        $q = $this->db->get("language")->row()->code;
        return $q;
    }
}
 
?>