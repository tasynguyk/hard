<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends MX_Controller {

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
        
        public function z()
        {
            mkdir("./application/language/z",0777);
            $src = './application/language/english';
            $dst = './application/language/z';
            $files = glob("./application/language/english/*.*");
                  foreach($files as $file){
                  $file_to_go = str_replace($src,$dst,$file);
                  copy($file, $file_to_go);
                  }

        }
         
	public function index()
	{
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log', 'location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 1;
                if(!$this->acl->can_create($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    $this->load->model('user_model');
                    $this->load->model('company_model');
                    
                  //  $data[]
                    if($this->input->post('cancel'))
                    {
                        redirect(base_url().'index.php/login/log/profile','location');
                    }   
                    if($this->input->post('create'))
                    {
                        $this->form_validation->set_rules('username',$this->lang->line('username'),'trim|required');
                        $this->form_validation->set_rules('password',$this->lang->line('password'),'trim|required');
                        $this->form_validation->set_rules('repassword',$this->lang->line('repassword'),'trim|required|matches[password]');
                        $this->form_validation->set_rules('email',$this->lang->line('email'),'trim|required|valid_email');
                        if($this->form_validation->run()==FALSE)
                        {
                            $data['page_content'] = $this->load->view('create_view','',true);
                        }
                        else
                        {
                            $this->load->model('user_model');
                            $this->load->model('time_model');
                            $day = $this->input->post('day');
                            $month = $this->input->post('month');
                            $year = $this->input->post('year');
                            
                            if(!$this->time_model->check_time($day,$month,$year))
                            {
                                $data['error'] = $this->lang->line('dob_valid');
                            }
                            else
                            {
                                $username = $this->input->post('username');
                                $password = md5($this->input->post('password'));
                                $email = $this->input->post('email');
                                $gender = $this->input->post('gender');
                                $permission = $this->input->post('permisson');
                                $status = $this->input->post('status');
                                $companyid = $this->input->post('companyid');
                                if(!$this->user_model->check_user($username, $email))
                                {
                                    $data['error'] = $this->lang->line('username_email_use');
                                }
                                else 
                                {
                                    $dob = $year.'-'.$month.'-'.$day;
                                    $create = array(
                                        'username' => $username,
                                        'password' => $password,
                                        'email' => $email,
                                        'gender' => $gender,
                                        'permission' => $permission,
                                        'status' => $status,
                                        'dob' => $dob,
                                        'companyid' => $companyid
                                    );
                                    $this->user_model->add_user($create);
                                    $data['error'] = 'Complete.';
                                }
                                //data['page_title'] =  
                                $data['page_sub_title'] = $this->lang->line('create_user');
                            }
                        }
                        
                    }
                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('create_user');
                    $data['list_company'] = $this->company_model->get_company();
                    $data['page_sub_title'] = $this->lang->line('create_user');
                    $data['page_content'] = $this->load->view('create_view',$data,true);
                    $this->load->view('master_layout',$data);
                }
            }
	}



        public function company()
        {
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 2;
                if(!$this->acl->can_create($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    $this->load->model('company_model');
                    if($this->input->post('cancel'))
                    {
                        redirect(base_url().'index.php/login/log/profile','location');
                    }
                    if($this->input->post('create'))
                    {
                        $this->form_validation->set_rules('name',$this->lang->line('company_name'),'trim|required');
                        if($this->form_validation->run()!=FALSE)
                        {
                            $name = $this->input->post('name');
                            $language = $this->session->userdata('lang');
                            
                            $add = array(
                              'name' => $name,
                              'language' => $language
                            );
                            
                            
                            if(!$this->company_model->check_name_company($name, $language))
                            {
                                $data['error'] = $this->lang->line('company_name_use');
                            }
                            else
                            {
                                $this->company_model->insert_company($add);
                                $data['error'] = $this->lang->line('compele');
                            }
                            
                        }
                    }
                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('create_company');
                    $data['page_sub_title'] = $this->lang->line('create_company');
                    $data['page_content'] = $this->load->view('create_company_view',$data,true);
                    $this->load->view('master_layout',$data);
                }
            }
        }
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
