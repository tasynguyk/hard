<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmt extends MX_Controller {

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
            if($this->session->userdata("islogin")!=1)
            {
                redirect(base_url().'index.php/login/log/','location');
            }
            else
            {
                if($this->session->userdata("permission")!=2)
                {
                    redirect(base_url().'index.php/login/log/profile','location');
                }
                else
                {
                    $this->load->model("cmt_model");
                    $this->load->library("my_page");
                    $curpage = $page;
                    $page =($page-1)*3;
                    
                    $list = $this->cmt_model->get_cmt($page);
                    $num_rows = $this->cmt_model->num_cmt();
                    
                    $z['total_row'] = $num_rows;
                    $z['item_per_page'] = 3;
                    $z['url'] = base_url()."index.php/back/cmt/index";
                    $z['curpage'] = $curpage;

                    $data['pagination'] = $this->my_page->create_page($z);
                    $data['list'] = $list;
                    
                    $data['page_content'] = $this->load->view("list_cmt_view",$data,true);
                    $this->load->view('master_layout',$data);
                }
            }
            
	}
        
        public function edit($cmtid = -1)
	{
            if($this->session->userdata("islogin")!=1)
            {
                redirect(base_url().'index.php/login/log/','location');
            }
            else
            {
                if($this->session->userdata("permission")!=2)
                {
                    redirect(base_url().'index.php/login/log/profile','location');
                }
                else
                {
                    $this->load->model("cmt_model");
                    if(!$this->cmt_model->check_cmt_byid($cmtid))
                    {
                        redirect(base_url().'index.php/back/cmt/index','location');
                    }
                    else
                    {
                        if($this->input->post("delete"))
                        {
                            $this->cmt_model->delete_cmt($cmtid);
                            redirect(base_url().'index.php/back/cmt/index','location');
                        }
                        
                        if($this->input->post("edit") && $this->input->post("content")!="")
                        {
                                
                            $content = $this->input->post("content");
                            $this->cmt_model->edit_cmt($cmtid, $content);
                        }
                        
                        $data['cmt'] = $this->cmt_model->get_cmt_byid($cmtid);
                        $data['page_content'] = $this->load->view("edit_view",$data,true);
                        $this->load->view("master_layout",$data);
                    }
                }
            }
            
	}
        
        
    }


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
