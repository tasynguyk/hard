<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends MX_Controller {

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
            $this->load->library('form_validation');
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
                $this->lang->load('form_validation','english');
            }
        }
        
        
        
	public function index()
	{
            $this->session->set_userdata("lang","english");
            if($this->session->userdata("islogin"))
            {
                redirect(base_url().'index.php/login/log/profile', 'location');
            }
            else
            {
                if($this->input->post('login'))
                {
                    $this->form_validation->set_rules('username','Username','trim|required');
                    $this->form_validation->set_rules('password','Password','trim|required');
                    if($this->form_validation->run()!=FALSE)
                    {
                        $username = $this->input->post('username');
                        $password = md5($this->input->post('password'));
                        $this->load->model('user_model');
                        if($this->user_model->check_user($username, $password))
                        {
                            $user = $this->user_model->get_user($username);
                            $this->session->set_userdata('islogin',1);
                            $this->session->set_userdata('id',$user->id);
                            $this->session->set_userdata('username',$user->username);
                            $this->session->set_userdata('permission',$user->permission);
                            $this->session->set_userdata("lang","english");
                            redirect(base_url().'index.php/login/log/profile', 'location');
                        }
                        else
                        {//sua error
                            $data['error'] = $this->lang->line('username_pass_valid');
                            $this->load->view('login_view',$data);
                        }
                    }
                    else
                    {
                        $this->load->view('login_view');
                    }
                }
                else
                {
                    $this->load->view('login_view');
                }
            }
	}
        
        public function profile()
        {
            if($this->session->userdata('islogin')==1)
            {
                $id = $this->session->userdata('id');
                $this->load->model("user_model");
                $data['group'] = $this->user_model->get_group($id);
                $data['username'] = $this->session->userdata('username');
                $data['page_sub_title'] = $this->lang->line('profile');
                $data['page_title'] = 'Sutrixmedia | '.$this->lang->line('profile');
                $data['page_content'] = $this->load->view('profile_view',$data,true);
                $this->load->view('master_layout', $data);
            }
            else
            {
                redirect(base_url().'index.php/login/log', 'location');
            }
        }
        
        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url().'index.php/login/log', 'location');
        }
        
        public function z()
        {
          //  $this->load->helper("captcha");
          //  $vals = array(
          //      'img_path' => './uploads/',
           //     'img_url' => base_url().'/uploads/',
        //        );
$this->load->view('t');
              /* Generate the captcha */
          //  $captcha = create_captcha($vals);
         //   echo 'gdffd';
       //     echo $captcha['image'];
        }
        
        public function capt()
        {
            $this->load->helper("captcha");
            $vals = array(
                'img_path' => './uploads/',
                'img_url' => base_url().'/uploads/',
                );
              /* Generate the captcha */
            $captcha = create_captcha($vals);
            echo $captcha['image'];
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
