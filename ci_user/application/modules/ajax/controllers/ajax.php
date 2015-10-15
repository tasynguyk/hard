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
            if($this->session->userdata('lang'))
            {
                $lang_use = $this->session->userdata('lang');
                $this->lang->load('form',$lang_use);
            }
            else
            {
                $this->lang->load('form','english');
            }

        }
         
	public function index()
	{
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','locacion');
            }
            else
            {
                $data['page_sub_title'] = $this->lang->line('up_img');
                $data['page_title'] = 'Sutrixmedia | '.$this->lang->line('up_img');
                $data['page_content'] = $this->load->view('index_view','',true);
                $data['page_js'] = $this->load->view('js/ajax_js_view','',true);
                $this->load->view('master_layout',$data);
            }
	}
        
        public function xuly()
        {
           /* if(is_array($_FILES)) {
                if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                    $sourcePath = $_FILES['userImage']['tmp_name'];
                    $targetPath = "uploads/".$_FILES['userImage']['name'];
                    if(move_uploaded_file($sourcePath,$targetPath)) {
                        $ret = "<img src='".base_url().$targetPath."' width='100px' height='100px' />";
                        echo $ret;
                    }
                }
            }*/
            
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg';
                $config['max_size'] = '6000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                echo $this->input->post('userImage');
                if(!$this->upload->do_upload('userImage'))
                {
                    $data['error'] = $this->upload->display_errors();

                }
                else
                {
                    $res = $this->upload->data();
                    if(!$this->session->userdata('imgcur'))
                    {
                        $this->session->set_userdata('imgcur', $res['file_name']);
                    }
                    else
                    {
                        $oldfile = $this->session->userdata('imgcur');
                        if(file_exists('./uploads/'.$oldfile))
                        {
                            unlink('./uploads/'.$oldfile);
                        }
                        $this->session->set_userdata('imgcur', $res['file_name']);
                    }
                  //  echo $res['file_name'];
                    $id = $this->session->userdata('id');
                    $ret = "<img src='".base_url().'uploads/'.$res['file_name']."' width='100px' height='100px' />";
                    echo    $ret;
                }
            
        }

        public function upload_img()
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

                echo $this->input->post('userImage');
                if(!$this->upload->do_upload('userImage'))
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
                    $oldfile = $this->session->userdata('imgcur');
                    if(file_exists('./uploads/'.$oldfile))
                    {
                        unlink('./uploads/'.$oldfile);
                    }
                    $data['error'] = $this->lang->line('compele');
                }
                $data['page_content'] = $this->load->view('index_view',$data,true);
                $this->load->view('master_layout',$data);
            }
            else
            {
                redirect(base_url().'index.php/ajax/ajax', 'location');
            }
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
