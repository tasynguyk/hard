<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends MX_Controller {

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
            $this->load->library('form_validation','database');   
            $this->load->helper(array('form', 'url'));
        }
         
	public function index()
	{
		$this->load->view('welcome_message');
                
	}
        
        public function login()
        {
            
            $this->form_validation->set_rules('username','Username','trim|required|min_lenght[6]');
            $this->form_validation->set_rules('password','Password','trim|required|min_lenght[6]');
            if($this->form_validation->run() != FALSE)
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $q = $this->db->query('select * from user where username = $usename and password = $password');
                if($q->num_rows() == 1)
                {
                    $user = $q->row();
                    $this->session->set_userdata('islogin',1);
                    $this->session->set_userdata('username',$user->username);
                    $this->session->set_userdata('permission',$use->permission);
                   // $this->load->view('profile');
                    $this->load->view('welcome_message');
                }
                else {
                    $this->load->view('welcome_message');
                }
            }
            else
            {
                
            }
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
