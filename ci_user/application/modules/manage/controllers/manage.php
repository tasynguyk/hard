<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends MX_Controller {

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
            $this->load->helper(array('form', 'url','date','download','file'));
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
         
	public function index($page = "1")
	{
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log', 'location');
            }
            else
            {
                if($this->session->userdata('permission')<1)
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    
                    $curpage = $page;
                    $page = (($page-1)*3);
                    if($this->input->post('userid'))
                    {
                        $this->session->set_userdata('userid',$this->input->post('userid'));
                        $this->session->set_userdata('choose',$this->input->post('choose'));
                        redirect(base_url().'index.php/manage/manage/deleteoredit', 'location');
                        
                    }
                    //echo 'ok';
                    $this->load->model('user_model');
                    $id = $this->session->userdata('id');
                    $permisson = $this->session->userdata('permission');
                    if(file_exists('./'.$id.'.xlsx'))
                    {
                        unlink('./'.$id.'.xlsx');
                    }
                    if(file_exists('./'.$id.'.pdf'))
                    {
                        unlink('./'.$id.'.pdf');
                    }
                    
                    
                    if($this->input->post('btncancel'))
                    {
                        $this->session->unset_userdata('search');
                        $this->session->unset_userdata('sortby');
                        redirect(base_url().'index.php/manage/manage', 'location');
                    }
                    if($this->input->post('btnsearch'))
                    {
                        if($this->input->post('txtsearch')=='')
                        {
                            redirect(base_url().'index.php/manage/manage/manage', 'location');
                        }
                        $search = $this->input->post('txtsearch');
                        
                        $this->session->set_userdata('search',$search);
                      //  echo 'ok';
                        $list = $this->user_model->search_user($id, $permisson, $page, 'id', $search);
                        $num_rows = $this->user_model->search_numrow_user($id, $permisson, $search);
                    }
                    if($this->input->post('sort'))
                    {
                        if($this->input->post('sortby')=='Birthday')
                        {
                            $order = 'dob';
                        }
                        else
                        {
                            $order = $this->input->post('sortby');
                        }
                        $this->session->set_userdata('sortby',$order);
                        if($this->session->userdata('search'))
                        {
                            $search = $this->session->userdata('search');
                            $list = $this->user_model->search_user($id, $permisson, $page, $order, $search);
                            $num_rows = $this->user_model->search_numrow_user($id, $permisson, $search);
                        }
                        else
                        {
                            $list = $this->user_model->get_list_user($id, $permisson, $page, $order);
                            $num_rows = $this->user_model->get_numrows_user($id, $permisson);
                        }
                    }
                    
                    if(!$this->input->post('sort') && !$this->input->post('btnsearch'))
                    {
                        if(!$this->session->userdata('sortby'))
                        {
                            $order = 'id';
                        }
                        else
                        {
                            $order = $this->session->userdata('sortby');
                        }
                        if($this->session->userdata('search'))
                        {
                            $search = $this->session->userdata('search');
                            
                            $list = $this->user_model->search_user($id, $permisson, $page, $order, $search);
                            $num_rows = $this->user_model->search_numrow_user($id, $permisson, $search);
                        }
                        else
                        {
                            $list = $this->user_model->get_list_user($id, $permisson, $page, $order);
                            $num_rows = $this->user_model->get_numrows_user($id, $permisson);
                        }
                        
                    }
                    $this->load->library('pagination');
                    
                    
                    $this->load->model('user_model');
                    $data['list'] = $list;
                    
                    $config['total_rows'] = $num_rows;
                    $config['base_url'] = base_url()."index.php/manage/manage/index";
                    $config['per_page'] = 3;
                    $config['use_page_numbers'] = TRUE;
                    //$config['next_link'] = 'Next';
                    
                    $z['total_row'] = $num_rows;
                    $z['item_per_page'] = 3;
                    $z['url'] = base_url()."index.php/manage/manage/index";
                    $z['curpage'] = $curpage;
                    $this->load->model('page_model');
                    
                    $this->pagination->initialize($config);
                    
                    $data["pagination"] =  $this->page_model->create_page($z);
                  //  $data['sortby'] = $order;
                    
                    $data['page_content'] = $this->load->view('list_view',$data,true);
                    $data['page_sub_title'] = $this->lang->line('manage_user');
                    $data['page_title'] = "Sutrix media | Manage user";
                    $data['page_js'] = $this->load->view('js/edit_js_view');
                    $this->load->view('master_layout', $data);
                    
                }
            }
	}
        
        public function exportexcel()
        {
            if($this->session->userdata('islogin'))
            {
                $this->load->model('user_model');
                $this->load->library('excel');
                $objPHPExcel = new PHPExcel();

                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Username')
                    ->setCellValue('B1', 'Email')
                    ->setCellValue('C1', 'Birthday')
                    ->setCellValue('D1', 'Status')
                    ->setCellValue('E1', 'Gender')
                    ->setCellValue('F1', 'Permission')
                    ->setCellValue('G1', 'Company');

                    $id = $this->session->userdata('id');
                    $permission = $this->session->userdata('permission');

                    if(!$this->session->userdata('sortby'))
                    {
                        $order = 'id';
                    }
                    else
                    {
                        $order = $this->session->userdata('sortby');
                    }

                    if(!$this->session->userdata('search'))
                    {
                        $list = $this->user_model->get_listuser_nopage($id, $permission, $order);
                    }
                    else {
                        $search = $this->session->userdata('search');
                        $list = $this->user_model->search_user_nopage($id, $permission, $order, $search);
                    }

                    $i = 2;
                    foreach ($list as $row)
                    {
                        if($row->status==1)
                        {
                            $status = 'Public';
                        }
                        else
                        {
                            $status = 'Private';
                        }

                        if($row->permission==0)
                        {
                            $permission = 'User';
                        }

                        else
                        {
                            if($row->permission==1)
                            {
                                $permission = 'Admin';
                            }
                            else
                            {
                                $permission = 'Super admin';
                            }
                        }

                        if($row->gender==0)
                        {
                            $gender = "Famale";
                        }
                        else
                        {
                            $gender = "Male";
                        }

                        $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i, $row->username)
                        ->setCellValue('B'.$i, $row->email)
                        ->setCellValue('C'.$i, $row->dob)
                        ->setCellValue('D'.$i, $status)
                        ->setCellValue('E'.$i, $gender)
                        ->setCellValue('F'.$i, $permission)
                        ->setCellValue('G'.$i, $row->name);
                        $i++;
                    }
                    //ghi du lieu vao file,định dạng file excel 2007
                    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                    ignore_user_abort(true);
                    $id = $this->session->userdata('id');
                    $username = $this->session->userdata('username');
                    
                    $full_path = $id.'.xlsx';//duong dan file
                    $objWriter->save($full_path);
                    $data_download =  file_get_contents($id.'.xlsx');
                    unlink($id.'.xlsx');
                    force_download($username.'_manage.xlsx', $data_download);
                    
                    redirect(base_url().'index.php/manage/manage/manage', 'location');
            }
            else
            {
                redirect(base_url().'index.php/login/log', 'location');
            }
        }
        
        public function exportpdf()
        {
            $id = $this->session->userdata('id');
            $permission = $this->session->userdata('permission');
            $username = $this->session->userdata('username');
            
            $this->load->model('user_model');
            
            if(!$this->session->userdata('sortby'))
            {
                 $order = 'id';
            }
            else
            {
               $order = $this->session->userdata('sortby');
            }
                
            if(!$this->session->userdata('search'))
            {
                $list = $this->user_model->get_listuser_nopage($id, $permission, $order);
            }
            else {
                $search = $this->session->userdata('search');
                $list = $this->user_model->search_user_nopage($id, $permission, $order, $search);
            }
            $data['list'] = $list;
            $html = $this->load->view('pdf_view',$data,true);
            
               
            $this->load->library('dompdf_gen');
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $output = $this->dompdf->output();
            file_put_contents('./'.$id.'.pdf',$output);
            $data_download =  file_get_contents($id.'.pdf');
            force_download($username.'_manage.pdf', $data_download);
            redirect(base_url().'index.php/manage/manage/manage', 'location');
        }

        public  function test()
        {
            $data['page_sub_title'] = 'Edit user';
            $data['page_title'] = 'Sutrix media | Edit user';
            $data['page_content'] = $this->load->view('test_edit','',true);
            $this->load->view('master_layout',$data);
        }

        public function deleteoredit()
        {
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log', 'location');
            }
            else
            {
                if($this->session->userdata('permission')<1)
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    if($this->input->post('cancel'))
                    {
                        $this->session->unset_userdata('userid');
                        $this->session->unset_userdata('choose');
                        redirect(base_url().'index.php/manage/manage/manage', 'location');
                    }
                    if($this->session->userdata('userid'))
                    {
                        $this->load->model("user_model");
                        $choose = $this->session->userdata('choose');
                        $id = $this->session->userdata('userid');
                        if($choose == 'delete')
                        {
                            $this->user_model->delete_user($id);
                            $this->session->unset_userdata('choose');
                            $this->session->unset_userdata('userid');
                            redirect(base_url().'index.php/manage/manage/manage', 'location');
                        }
                        else {
                            if(!$this->input->post('edit'))
                            {
                                $this->load->model('user_model');
                                $data['user'] = $this->user_model->get_user_byid($id);
                                $data['page_content'] = $this->load->view('edit_view',$data,true);
                               // $this->load->view('master_layout',$data);
                            }
                            else 
                            {
                                    $this->form_validation->set_rules('username','Username','trim|required');
                                    $this->form_validation->set_rules('password','Password','trim|required');
                                    $this->form_validation->set_rules('repassword','Re-enter password','trim|required|matches[password]');
                                    $this->form_validation->set_rules('email','Email','trim|required|valid_email');
                                    if($this->form_validation->run()==FALSE)
                                    {
                                        $data['page_content'] = $this->load->view('edit_view','',true);
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
                                            $data['error'] = 'Day of birth valid';
                                            $data['page_content'] = $this->load->view('edit_view', $data,true);
                                        }
                                        else
                                        {
                                            $id = $this->session->userdata('userid');
                                            $username = $this->input->post('username');
                                            $password = md5($this->input->post('password'));
                                            $email = $this->input->post('email');
                                            $gender = $this->input->post('gender');
                                            $permission = $this->input->post('permission');
                                            $status = $this->input->post('status');
                                            if(!$this->user_model->check_user_edit($id, $username, $email))
                                            {
                                                $data['error'] = $this->lang->line('username_email_use');
                                                $data['page_content'] = $this->load->view('edit_view',$data,true);
                                            }
                                            else
                                            {
                                                $dob = $year.'-'.$month.'-'.$day;
                                                $update = array(
                                                'username' => $username,
                                                'password' => $password,
                                                'email' => $email,
                                                'gender' => $gender,
                                                'permission' => $permission,
                                                'status' => $status,
                                                'dob' => $dob
                                                );
                                                //print_r($update);
                                                $this->user_model->edit_user_byid($update, $id);
                                                $this->session->unset_userdata('userid');
                                                $this->session->unset_userdata('choose');
                                                redirect(base_url().'index.php/manage/manage/manage', 'location');
                                            }
                                        }
                                    }
                            }
                            $data['page_title'] = '';
                            $data['page_sub_title'] = $this->lang->line('create_user');
                            $this->load->view('master_layout',$data);
                        }
                    }
                    else {
                        redirect(base_url().'index.php/manage/manage/manage', 'location');
                    }
                    
                }
            }
        }
        
        public function edit()
        {
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log', 'location');
            }
            else
            {
                if($this->session->userdata('permission')!=1)
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    if($this->session->userdata('idedit'))
                    {
                        $id = $this->session->userdata('idedit');
                        $q = $this->db->query("select * from user where id='$id'");
                        $user = $q->row();
                        $data['user'] = $user;
                        if($this->input->post('edit'))
                        {
                            $this->form_validation->set_rules('username','Username','trim|required');
                            $this->form_validation->set_rules('password','Password','trim|required');
                            $this->form_validation->set_rules('repassword','Re-enter password','trim|required|matches[password]');
                            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
                            if($this->form_validation->run()==FALSE)
                            {
                                $this->load->view('edit_view',$data);
                            }
                            else
                            {
                                $username = $this->input->post('username');
                                $email = $this->input->post('email');
                                $password = md5($this->input->post('password'));
                                
                                $q1 = $this->db->query("select * from user where username='$username' and id <>'$id'");
                                $q2 = $this->db->query("select * from user where email='$email' and id <>'$id'");
                               // echo $q1->num_row()
                                if($q1->num_rows()+$q2->num_rows()>0)
                                {
                                    $data['error'] = 'Username or email has been used';
                                    $this->load->view('edit_view',$data);
                                }
                                else
                                {
                                    $update = array(
                                    'username' => $username,
                                    'password' => $password,
                                    'email' => $email
                                    );
                                    $this->db->where('id',$id);
                                    $this->db->update('user',$update);
                                    redirect(base_url().'index.php/manage/manage/manage', 'location');
                                }
                                
                            }
                        }
                        else {
                            if($this->input->post('cancel'))
                            {
                                $this->session->unset_userdata('idedit');
                                redirect(base_url().'index.php/manage/manage/manage', 'location');
                            }
                            else
                            {
                                $this->load->view('edit_view',$data);
                                
                            }
                        }
                    }
                    else
                    {
                        redirect(base_url().'index.php/manage/manage/manage', 'location');
                    }
                }
            }
        }
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
