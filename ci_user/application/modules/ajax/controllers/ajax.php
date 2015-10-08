<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MX_Controller {

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
         
	public function index()
	{
            $this->load->view('index_view');
	}
        
        public function xuly()
        {
            /*if(is_array($_FILES))
            {
                $status = array("STATUS"=>"true");
            }
            else
                $status = array("STATUS"=>"fail");*/

            //echo json_encode ($status);
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg';
            $config['max_size'] = '6000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            
            //$this->load->library('upload', $config);
            echo 'ok';
            //echo json_encode ($status);
            if(!$this->upload->do_upload('ifile')){
                $error = $this->upload->display_error();
                echo $error;
               // $status = array("STATUS"=>$error);	
            }
            else
            {
                echo 'fail';
            }
          //  echo json_encode ($status) ;
        }
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
