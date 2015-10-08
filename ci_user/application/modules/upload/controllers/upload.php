<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends MX_Controller {

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
            if($this->session->userdata('islogin'))
            {
            
                if($this->input->post('upload'))
                {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'jpg';
                        $config['max_size'] = '6000';
                        $config['max_width'] = '1024';
                        $config['max_height'] = '768';
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);


                        if(!$this->upload->do_upload('ifile'))
                        {
                            $data['error'] = $this->upload->display_errors();

                        }
                        else
                        {
                            $res = $this->upload->data();
                            $old = $res['full_path'];

                            $id = $this->session->userdata('id');

                            $new = $res['file_path'].$id.$res['file_ext'];
                            rename($old, $new);
                            $data['error'] = 'Complete';
                        }
                        $this->load->view('upload_view',$data);
                }
                else
                {
                    $this->load->view('upload_view');
                }
            }
            else
            {
                redirect(base_url().'index.php/login/log', 'location');
            }
            
	}
        
        public function upload_img()
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg';
            $config['max_size'] = '6000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);


            if(!$this->upload->do_upload('ifile'))
            {
                $data['error'] = $this->upload->display_errors();

            }
            else
            {
                $res = $this->upload->data();
                $old = $res['full_path'];

                $id = $this->session->userdata('id');

                $new = $res['file_path'].$id.$res['file_ext'];
                rename($old, $new);
                $data['error'] = 'Complete';
            }
            $this->load->view('upload_view',$data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
