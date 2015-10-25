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
            $curpage = $page;
            $page = ($page-1)*3;
            $this->load->model("news_model");
            $this->load->library("my_page");
            // change l
            $lang_use = $this->session->userdata("lang");
            $lang = $this->news_model->get_code_byname($lang_use);
            $list = $this->news_model->get_list_news($page, $lang);
            $num_rows = $this->news_model->get_row_news($lang);
            
            $z['total_row'] = $num_rows;
            $z['item_per_page'] = 3;
            $z['url'] = base_url()."index.php/front/news/index";
            $z['curpage'] = $curpage;
            
            $data['pagination'] = $this->my_page->create_page($z);
            $data['list'] = $list;
            $data['page_title'] = 'Sutrix media | '.$this->lang->line('manage_language');
            $data['page_sub_title'] = $this->lang->line('manage_language');
            $data['page_content'] = $this->load->view('list_news_view',$data,true);
            if($this->session->userdata("islogin")!=1)
            {
                $this->load->view('master_nologin',$data);
            }
            else
            {
                $this->load->view('master_layout',$data);
            }
            
	}
        
        public function read($newid = -1, $page = 1)
        {
            $this->load->helper('date');
            $this->load->library("my_page");
            $this->load->model("news_model");
            $this->load->model("cmt_model");
            if(!$this->session->userdata('lang'))
            {
                $name = "English";
            }
            else
            {
               $name = $this->session->userdata('lang'); 
            }
            $lang = $this->news_model->get_code_byname($name);
            $news = $this->news_model->get_news_lang($newid, $lang);
            if(!$this->news_model->check_news_byid($newid))
            {
                redirect(base_url().'index.php/front/news','location');
            }
            $curpage = $page;
            $page = ($page-1)*3;
            
            if($this->input->post("cmt") && $this->input->post("txtcmt")!="")
            {
                $id = $this->session->userdata("id");
                $cmt = $this->input->post("txtcmt");
                $add = array(
                  'userid' => $id,
                  'newsid' => $newid,
                  'content' => $cmt,
                  'status' => '0',
                  'time' => date('Y-m-d H:i:s')
                ); 
                $this->cmt_model->create_cmt($add);
            }
            
            $list = $this->cmt_model->get_cmt($newid, $page);
            $num_rows = $this->cmt_model->num_cmt($newid);
            
            $z['total_row'] = $num_rows;
            $z['item_per_page'] = 3;
            $z['url'] = base_url()."index.php/front/news/read/".$newid;
            $z['curpage'] = $curpage;
            
            $data['pagination'] = $this->my_page->create_page($z);
            
            $data['list'] = $list;
            $data['lang_use'] = $lang;
            $data['news'] = $news;
            $data['image'] = $this->news_model->get_image_news($newid);
            $data['page_content'] = $this->load->view('read_view',$data,true);
            $list = $this->cmt_model->get_cmt($newid, $page);
            
            
            if($this->session->userdata("islogin")!=1)
            {
                $this->load->view('master_nologin',$data);
            }
            else
            {
                $this->load->view('master_layout',$data);
            }
        }
        
        
    }


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
