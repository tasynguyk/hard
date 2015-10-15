<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme extends MX_Controller {

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
        }
         
	public function index($theme='')
	{
            //echo 'ok';
            if($theme!='')
            {
                if($theme=='default')
                {
                    $this->session->set_userdata('theme','default');
                }
                if($theme=='green')
                {
                    $this->session->set_userdata('theme','green');
                }
                if($theme=='gray')
                {
                    $this->session->set_userdata('theme','gray');
                }
                if($theme=='pink')
                {
                    $this->session->set_userdata('theme','pink');
                }
            }
            if($this->session->userdata('cur_url'))
            {
                $cur_url = $this->session->userdata('cur_url');
                redirect($cur_url,'location');
            }
            else
            {
                redirect(base_url().'index.php/login/log/profile','location');
            }
	}
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
