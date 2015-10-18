<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends MX_Controller {

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
                $this->lang->load('form','vietnamese');
            }
        }
         
	public function index($page = '1')
	{
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 3;
                if($this->acl->can_view($id, $resource))
                {
                    $curpage = $page;
                    $page = (($page-1)*3);
                    $this->load->model('group_model');
                    if($this->input->post('groupid'))
                    {
                        $this->session->set_userdata('groupid',$this->input->post('groupid'));
                        $this->session->set_userdata('groupchoose',$this->input->post('groupchoose'));
                        redirect(base_url().'index.php/acl/group/edit', 'location');
                        
                    }
                    if($this->input->post('btncancel'))
                    {
                        $this->session->unset_userdata('search_group');
                        redirect(base_url().'index.php/acl/group/index','location');
                    }
                    if($this->input->post('btnsearch') && $this->input->post('txtsearch')!='')
                    {
                        $search = $this->input->post('txtsearch');
                        $this->session->set_userdata('search_group',$search);
                    }
                    if($this->session->userdata('search_group'))
                    {
                        $search = $this->session->userdata('search_group');
                        $list = $this->group_model->search_group($page, $search);
                        $num_rows = $this->group_model->search_numrow_group($search);
                    }
                    else
                    {
                        $list = $this->group_model->list_group($page);
                        $num_rows = $this->group_model->numrows_group();
                    }
                        
                    
                        
                    $this->load->library('My_page');
                    $z['total_row'] = $num_rows;
                    $z['item_per_page'] = 3;
                    $z['curpage'] = $curpage;
                    $z['url'] = base_url().'index.php/acl/group/index';
                    
                    $data['pagination'] = $this->my_page->create_page($z);
                    
                    $data['page_js'] = $this->load->view('js/group_js_view','',true);
                    $data['list'] = $list;
                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('manage_group');
                    $data['page_sub_title'] = $this->lang->line('manage_group');
                   // echo 'ok';
                    $data['page_content'] = $this->load->view('listgroup_view',$data,true);
                    $this->load->view('master_layout',$data);
                }
                else
                {
                    redirect(base_url().'index.php/login/log/profile','location');
                }
            }
	}

        public function create()
	{
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 3;
                if($this->acl->can_create($id, $resource))
                {
                    $this->load->model('group_model');
                    if($this->input->post('create'))
                    {
                        
                        $this->form_validation->set_rules('group_name',$this->lang->line('groupname'),'trim|required');
                        if($this->form_validation->run()!=FALSE)
                        {
                            $group_name = $this->input->post('group_name');
                            $group_description = $this->input->post('group_description');
                            if(!$this->group_model->check_create_group($group_name))
                            {
                                $data['error'] = $this->lang->line('groupname_use');
                            }
                            else
                            {
                                $add = array(
                                    'name' => $group_name,
                                    'description' => $group_description
                                );
                                $this->group_model->create_group($add);
                                $data['error'] = $this->lang->line('compele');
                            }
                        }
                    }
                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('create_group');
                    $data['page_sub_title'] = $this->lang->line('create_group');
                    $data['page_content'] = $this->load->view('create_group_view',$data,true);
                    $this->load->view('master_layout',$data);
                }
                else {
                    redirect(base_url().'index.php/login/log/profile','location');
                }
            }
        }

        public function edit()
        {
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                if($this->session->userdata('groupid'))
                {
                    $this->load->model('group_model');
                    $id = $this->session->userdata('groupid');
                    if($this->session->userdata('groupchoose')=='edit')
                    {
                        if($this->input->post('edit'))
                        {
                            $this->form_validation->set_rules('group_name',$this->lang->line('groupname'),'trim|required');
                            if($this->form_validation->run()!=FALSE)
                            {
                                $group_name = $this->input->post('group_name');
                                $group_description = $this->input->post('group_description');
                                if(!$this->group_model->check_edit_group($id, $group_name))
                                {
                                    $data['error'] = $this->lang->line('groupname_use');
                                }
                                else
                                {
                                    $info = array (
                                      'name' => $group_name,
                                      'description' => $group_description
                                    );
                                    $this->group_model->edit_group($id, $info);
                                    $data['error'] = $this->lang->line('compele');
                                }
                            }
                        }
                        
                        $data['group'] = $this->group_model->get_group_byid($id);
                        
                        $data['page_title'] = 'Sutrix media | '.$this->lang->line('edit_group');
                        $data['page_sub_title'] = $this->lang->line('edit_group');
                        $data['page_content'] = $this->load->view('edit_group_view',$data,true);
                        $this->load->view('master_layout',$data);
                        
                    }
                    else
                    {
                        if($this->session->userdata('groupchoose')=='delete')
                        {
                            $this->group_model->delete_group($id);
                            redirect(base_url().'index.php/acl/group','location');
                        }
                    }
                }
            }
        }
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
