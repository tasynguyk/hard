<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends MX_Controller {

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
         
	public function index($page = '1')
	{
            if($this->session->userdata('islogin')!='1')
            {
            	redirect(base_url().'index.php/login/log','location');
            }
            else
            {
            	$id = $this->session->userdata('id');
            	$this->load->model('mail_model');
            	$this->load->library('my_page');

            	$curpage = $page;
                $page = (($page-1)*3);
                $data['list_mail'] = $this->mail_model->get_my_mail($id, $page);

                $num_rows = $this->mail_model->num_my_mail($id);
                $z['total_row'] = $num_rows;
                $z['item_per_page'] = 3;
                $z['curpage'] = $curpage;
                $z['url'] = base_url().'index.php/mail/mail/index';
                    
                $data['pagination'] = $this->my_page->create_page($z);
                $data['num_unseen'] = $this->mail_model->num_unseen_mail($id);
            	$data['page_sub_title'] = $this->lang->line('my_message');
            	$data['page_title'] = 'Sutrix media | '.$this->lang->line('message');
            	$data['page_content'] = $this->load->view('mymail_view',$data,true);
            	$this->load->view('master_layout',$data);
            }
	}

	public function send($page = '1')
	{
            if($this->session->userdata('islogin')!='1')
            {
            	redirect(base_url().'index.php/login/log','location');
            }
            else
            {
            	$id = $this->session->userdata('id');
            	$this->load->model('mail_model');
            	$this->load->library('my_page');

            	$curpage = $page;
                $page = (($page-1)*3);
                $data['list_mail'] = $this->mail_model->get_send_mail($id, $page);

                $num_rows = $this->mail_model->num_send_mail($id);
                $z['total_row'] = $num_rows;
                $z['item_per_page'] = 3;
                $z['curpage'] = $curpage;
                $z['url'] = base_url().'index.php/mail/mail/send';
                    
                $data['pagination'] = $this->my_page->create_page($z);
                
            	$data['page_sub_title'] = $this->lang->line('send_message');
            	$data['page_title'] = 'Sutrix media | '.$this->lang->line('message');
            	$data['page_content'] = $this->load->view('sendmail_view',$data,true);
            	$this->load->view('master_layout',$data);
            }
	}

	public function create()
	{
            if($this->session->userdata('islogin')!='1')
            {
            	redirect(base_url().'index.php/login/log','location');
            }
            else
            {
            	$this->load->helper('date');
            	$id = $this->session->userdata('id');
            	$this->load->model('user_model');
            	$this->load->model('mail_model');
            	if($this->input->post('send'))
            	{
            		$this->form_validation->set_rules('subject',$this->lang->line('subject'),'trim|required');
            		$this->form_validation->set_rules('message',$this->lang->line('message'),'trim|required');
            		if($this->form_validation->run()!=False)
            		{
            			$idto = $this->input->post('userid');
            			$subject = $this->input->post('subject');
            			$message = $this->input->post('message');
            			$add = array(
            					'idsend' => $idto,
            					'subject' => $subject,
            					'message' => $message,
            					'idfrom' => $id,
            					'del_to' => 0,
            					'del_from' => 0,
            					'time' => date('Y-m-d H:i:s'),
            					'seen' => 0
            				);
            			$this->mail_model->create_mail($add);
            			redirect(base_url().'index.php/mail/mail/send','location');
            		}
            	}
                $data['page_sub_title'] = $this->lang->line('create').' '.$this->lang->line('message');
            	$data['user_list'] = $this->user_model->get_user($id);
            	$data['page_title'] = 'Sutrix media | '.$this->lang->line('message');
            	$data['page_content'] = $this->load->view('create_view',$data,true);
            	$this->load->view('master_layout',$data);	
            }
	}

	public function see($idmail = '-1')
	{
            if($this->session->userdata('islogin')!='1')
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                    $this->load->helper('date');
                    $this->load->model('mail_model');
                    $id = $this->session->userdata('id');
                    if($this->mail_model->check_my_mail($id, $idmail))
                    {
                            if($this->input->post('delete'))
                            {
                                    $update = array(
                                                    'del_to' => '1'
                                            );
                                    $this->mail_model->delete_my_mail($idmail, $update);
                                    redirect(base_url().'index.php/mail/mail','location');
                            }
                            else
                            {
                                    $this->mail_model->seen_mail($idmail);
                                    $data['page_sub_title']  = $this->lang->line('message');
                                    $data['type'] = 'user_send';
                                    $data['mail'] = $this->mail_model->get_mail_byid($idmail);
                                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('message');
                                    $data['page_content'] = $this->load->view('mail_view',$data,true);
                                    $this->load->view('master_layout',$data);
                            }

                    }
                    else
                    {
                            redirect(base_url().'index.php/mail/mail','location');
                    }
            }
	}

	public function seesend($idmail = '-1')
	{
            if($this->session->userdata('islogin')!='1')
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                    $this->load->helper('date');
                    $this->load->model('mail_model');
                    $id = $this->session->userdata('id');
                    if($this->mail_model->check_send_mail($id, $idmail))
                    {
                            if($this->input->post('delete'))
                            {
                                    $update = array(
                                                    'del_from' => '1'
                                            );
                                    $this->mail_model->delete_send_mail($idmail, $update);
                                    redirect(base_url().'index.php/mail/mail/send','location');
                            }
                            else
                            {
                                    $data['page_sub_title']  = $this->lang->line('message');
                                    $data['type'] = 'user_from';
                                    $data['mail'] = $this->mail_model->send_mail_byid($idmail);
                                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('message');
                                    $data['page_content'] = $this->load->view('mail_view',$data,true);
                                    $this->load->view('master_layout',$data);
                            }

                    }
                    else
                    {
                            redirect(base_url().'index.php/mail/mail/send','location');
                    }
            }
	}
            
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
