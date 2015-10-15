<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lang extends MX_Controller {

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
         
	public function index($lang='')
	{
            if($lang!='')
            {
                if($lang=='en')
                {
                    $this->session->set_userdata('lang','english');
                }
                if($lang=='vi')
                {
                    $this->session->set_userdata('lang','vietnamese');
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
