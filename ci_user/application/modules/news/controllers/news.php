<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
         public function __construct() {
            parent::__construct();
            $this->load->library(array('form_validation','Acl'));
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            if($this->session->userdata('lang'))
            {
                $lang_use = $this->session->userdata('lang');
                $this->lang->load('form',$lang_use);
                $this->lang->load('form_validation',$lang_use);
            }
            else
            {
                $this->lang->load('form','english');
            }
        }
         
	public function index($page = 1)
	{
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 6;
                if(!$this->acl->can_view($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    $curpage = $page;
                    $page = (($page-1)*3);
                    $this->load->library('my_page');
                    $this->load->model('news_model');
                    if($this->input->post("cancel"))
                    {
                        $this->session->unset_userdata("search_new");
                        redirect(base_url().'index.php/news/news', 'location');
                    }
                    if($this->input->post("btnsearch") && $this->input->post("search")!='')
                    {
                        $this->session->set_userdata("search_new",$this->input->post("search"));
                        redirect(base_url().'index.php/news/news', 'location');
                    }
                    $lang = $this->session->userdata("lang");
                    $lang_list = $this->news_model->get_code_byname($lang);
                    if(!$this->session->userdata('search_new'))
                    {
                        $list = $this->news_model->get_list_news($page, $lang_list);
                        $num_rows = $this->news_model->get_row_news($lang_list);
                    }
                    else
                    {
                        $search = $this->session->userdata('search_new');
                        $list = $this->news_model->search_list_news($page, $lang_list, $search );
                     
                        $num_rows = $this->news_model->search_row_news($lang_list, $search);
                    }
                    
                    $z['total_row'] = $num_rows;
                    $z['item_per_page'] = 3;
                    $z['curpage'] = $curpage;
                    $z['url'] = base_url().'index.php/news/news/index';
                    
                    $data['pagination'] = $this->my_page->create_page($z);
                    $data['lang'] = $this->news_model->get_lang();
                    $data['list'] = $list;
                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('manage_news');
                    $data['page_sub_title'] = $this->lang->line('manage_news');
                    $data['page_content'] = $this->load->view('list_news_view',$data,true);
                    $this->load->view('master_layout',$data);
                }
            }
	}
        
        public function fulledit($newid)
        {
            if($this->session->userdata('islogin')!=1)
            {
                redirect(base_url().'index.php/login/log/profile', 'location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 6;
                if(!$this->acl->can_edit($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else 
                {
                    $this->load->model('news_model');
                    if(!$this->news_model->check_news_byid($newid))
                    {
                        redirect(base_url().'index.php/news/news', 'location');
                    }
                    else
                    {
                        if($this->input->post('delete'))
                        {
                            $this->news_model->delete_news($newid);
                            redirect(base_url().'index.php/news/news', 'location');
                        }
                        if($this->input->post('edit'))
                        {
                            $config['upload_path'] = './uploads/';
                            $config['allowed_types'] = 'jpg|png';
                            $config['max_size'] = '6000';
                            $config['max_width'] = '1024';
                            $config['max_height'] = '768';
                            $config['encrypt_name'] = TRUE;
                            $this->load->library('upload', $config);
                            if(!$this->upload->do_upload('userImage'))
                            {
                                $data['error'] = $this->upload->display_errors();
                            }
                            else
                            {
                                $res = $this->upload->data();
                                $image = $res['file_name'];
                                $del = $this->news_model->update_img_news($newid, $image);
                                unlink('./uploads/'.$del);
                                $data['error'] = $this->lang->line('complete');
                            }
                        }
                        $data['page_sub_title'] = $this->lang->line('update_img');
                        $data['page_title'] = 'Sutrix media | '.$this->lang->line('update_img');
                        $data['news'] = $this->news_model->get_news($newid);
                        $data['page_content'] = $this->load->view('edit_img_view',$data,true);
                        $this->load->view('master_layout',$data);
                    }
                }
            }
        }
        
        public function create()
        {
            if($this->session->userdata('islogin')!=1)
            {
                redirect(base_url().'index.php/login/log/profile', 'location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 6;
                if(!$this->acl->can_create($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                $this->load->model('news_model');
                if($this->input->post('create'))
                {
                    $this->form_validation->set_rules('title',$this->lang->line('new_title'),'trim|required');
                    $this->form_validation->set_rules('des',$this->lang->line('new_description'),'trim|required');
                    $this->form_validation->set_rules('content',$this->lang->line('new_content'),'trim|required');
                    if($this->form_validation->run()!=FALSE)
                    {
                        $title = $this->input->post('title');
                        $des = $this->input->post('des');
                        $content = $this->input->post('content');
                        $lang = $this->input->post('lang');
                        if($this->news_model->check_news($title, $lang))
                        {
                            $add = array(
                              'language_code' => $lang,
                              'title' => $title,
                              'description' => $des,
                              'content' => $content
                            );
                            
                            $config['upload_path'] = './uploads/';
                            $config['allowed_types'] = 'jpg|png';
                            $config['max_size'] = '6000';
                            $config['max_width'] = '1024';
                            $config['max_height'] = '768';
                            $config['encrypt_name'] = TRUE;
                            $this->load->library('upload', $config);
                            if(!$this->upload->do_upload('userImage'))
                            {
                                $data['error'] = $this->upload->display_errors();
                            }
                            else
                            {
                                $res = $this->upload->data();
                                $image = $res['file_name'];
                                $this->news_model->insert_news($image, $add);
                            }
                        }
                        else 
                        {
                            $data['error'] = $this->lang->line('title_use');
                        }
                    }
                    
                }
                $this->load->model('news_model');
                $data['lang'] = $this->news_model->get_lang();
                $data['page_title'] = $this->lang->line('create_new');
                $data['page_sub_title'] = $this->lang->line('create_new');
                $data['page_content'] = $this->load->view('create_view',$data,true);
                $this->load->view('master_layout',$data);
            }
        }
        
        public function read($newid)
        {
            if($this->session->userdata('islogin')!=1)
            {
                redirect(base_url().'index.php/login/log/profile', 'location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 6;
                if(!$this->acl->can_view($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                $this->load->model('news_model');
                if(!$this->news_model->check_news_byid($newid))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                if($this->input->post('trans'))
                {
                    $lang = $this->input->post('lang');
                    $news = $this->news_model->get_news_lang($newid, $lang);
                }
                else {
                    $news = $this->news_model->get_news_byid($newid);
                    $lang = 'en';
                }
                $data['lang_use'] = $lang;
                $data['news'] = $news;
                $data['image'] = $this->news_model->get_image_news($newid);
                $data['lang'] = $this->news_model->get_lang();
                $data['page_title'] = 'Sutrix media | '.$this->lang->line('read');
                $data['page_sub_title'] = $this->lang->line('read');
                $data['page_content'] = $this->load->view('read_view',$data,true);
                $this->load->view('master_layout',$data);
            }
        }
     
        public function edit($newid)
        {
            if($this->session->userdata('islogin')!=1)
            {
                redirect(base_url().'index.php/login/log/profile', 'location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 6;
                if(!$this->acl->can_edit($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                $this->load->model('news_model');
                
                if(!$this->news_model->check_news_byid($newid))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                if($this->input->post('edit'))
                {
                    $lang = $this->session->userdata('lang_edit');
                    $this->form_validation->set_rules('title',$this->lang->line('new_title'),'trim|required');
                    $this->form_validation->set_rules('des',$this->lang->line('new_description'),'trim|required');
                    $this->form_validation->set_rules('content',$this->lang->line('new_content'),'trim|required');
                    if($this->form_validation->run()!=FALSE)
                    {
                        $title = $this->input->post('title');
                        $des = $this->input->post('des');
                        $content = $this->input->post('content');
                        $lang = $this->session->userdata('lang_edit');
                        if($this->news_model->check_edit_news($title, $lang, $newid))
                        {
                            $add = array(
                              'title' => $title,
                              'description' => $des,
                              'content' => $content
                            );
                            $this->news_model->update_news($newid, $add, $lang);
                        }
                        else 
                        {
                            $data['error'] = $this->lang->line('title_use');
                        }
                    }
                }
                if($this->input->post('trans'))
                {
                    $lang = $this->input->post('lang');
                    $this->session->set_userdata('lang_edit', $lang);
                    $news = $news = $this->news_model->get_news_lang($newid, $lang);
                    
                }
                else {
                    if($this->session->userdata('lang_edit'))
                    {
                        $lang = $this->session->userdata('lang_edit');
                        $news = $news = $this->news_model->get_news_lang($newid, $lang);
                    }
                    else {
                        $news = $this->news_model->get_news_byid($newid);
                    }
                    
                }
                $lang = $this->session->userdata('lang_edit');
                $data['lang_use'] = $lang;
                $data['news'] = $news;
                $data['image'] = $this->news_model->get_image_news($newid);
                $data['lang'] = $this->news_model->get_lang();
                $data['page_title'] = 'Sutrix media | '.$this->lang->line('edit_trans');
                $data['page_sub_title'] = $this->lang->line('edit_trans');
                $data['page_content'] = $this->load->view('edit_view',$data,true);
                $this->load->view('master_layout',$data);
             }
                
        }
    }


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
