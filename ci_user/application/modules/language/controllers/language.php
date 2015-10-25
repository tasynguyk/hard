<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends MX_Controller {

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
            $this->lang->load('form','z');
        }
         
	public function index($page = 1)
	{
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 5;
                if(!$this->acl->can_view($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    $curpage = $page;
                    $page = (($page-1)*3);
                    $this->load->library('my_page');
                    $this->load->model('language_model');
                    if($this->input->post('btncancel'))
                    {
                        $this->session->unset_userdata('language_search');
                    }
                    if($this->input->post('btnsearch') and $this->input->post('txtsearch')!='')
                    {
                        $search = $this->input->post('txtsearch');
                        $this->session->set_userdata('language_search', $search);
                        $list = $this->language_model->search_show_language($page, $search);
                        $num_rows = $this->language_model->search_num_language($search);
                    }
                    else
                    {
                        if($this->session->userdata('language_search'))
                        {
                            $search = $this->session->userdata('language_search');
                            $list = $this->language_model->search_show_language($page, $search);
                            $num_rows = $this->language_model->search_num_language($search);
                        }
                        else
                        {
                            $list = $this->language_model->get_show_language($page);
                            $num_rows = $this->language_model->get_num_language();
                        }
                    }
                    
                    $z['total_row'] = $num_rows;
                    $z['item_per_page'] = 3;
                    $z['curpage'] = $curpage;
                    $z['url'] = base_url().'index.php/language/language/index';
                    
                    $data['pagination'] = $this->my_page->create_page($z);
                    $data['list'] = $list;
                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('manage_language');
                    $data['page_sub_title'] = $this->lang->line('manage_language');
                    $data['page_content'] = $this->load->view('list_language_view',$data,true);
                    $this->load->view('master_layout',$data);
                }
            }
	}



        public function create()
        {
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 5;
                if(!$this->acl->can_create($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    
                    $this->load->model('language_model');
                    if($this->input->post('btncancel'))
                    {
                        redirect(base_url().'index.php/language/language','location');
                    }
                    if($this->input->post('btncreate'))
                    {
                        $this->form_validation->set_rules('name',$this->lang->line('language_name'),'trim|required');
                        $this->load->model('language_model');          
                        $this->form_validation->set_rules('code',$this->lang->line('language_code'),'trim|required');
                        if($this->form_validation->run()!=FALSE)
                        {
                            $name = $this->input->post('name');
                            $code = $this->input->post('code');
                            
                            
                            
                            $add = array(
                              'name' => $name,
                              'code' => $code
                            );
                            
                            
                            $username = $this->input->post('username');
                            $password = $this->input->post('password');
                            $repassword = $this->input->post('repassword');
                            $email = $this->input->post('email'); 
                            $status = $this->input->post('status'); 
                            $gender = $this->input->post('gender');
                            $dob = $this->input->post('dob');
                            $permission = $this->input->post('permission');
                            $male = $this->input->post('male');
                            $famale = $this->input->post('famale'); 
                            $day = $this->input->post('day');
                            $month = $this->input->post('month'); 
                            $year = $this->input->post('year');
                            $public = $this->input->post('public');
                            $private = $this->input->post('private');
                            $create = $this->input->post('create'); 
                            $cancel = $this->input->post('cancel'); 
                            $user_id = $this->input->post('user_id'); 
                            $edit = $this->input->post('edit'); 
                            $delete = $this->input->post('delete'); 
                            $dob_valid = $this->input->post('dob_valid');
                            $company = $this->input->post('company'); 
                            $edit_user = $this->input->post('edit_user'); 

                            $username_email_use = $this->input->post('username_email_use'); 
                            $username_pass_valid = $this->input->post('username_pass_valid');

                            $up_img = $this->input->post('up_img');
                            $upload = $this->input->post('upload');
                            $no_img = $this->input->post('no_img');
                            $file_input = $this->input->post('file_input');


                            $login = $this->input->post('login');
                            $systemlogin = $this->input->post('systemlogin');


                            $avatar = $this->input->post('avatar');
                            $dashboard = $this->input->post('dashboard');
                            $update_profile = $this->input->post('update_profile');
                            $admin_dashboard = $this->input->post('admin_dashboard'); 
                            $create_user = $this->input->post('create_user');
                            $manage_user = $this->input->post('manage_user');
                            $profile = $this->input->post('profile');
                            $logout = $this->input->post('logout');

                            $lang = $this->input->post('lang');
                            $compele = $this->input->post('compele'); 

                            $birthday = $this->input->post('birthday'); 
                            $sort = $this->input->post('sort');
                            $search = $this->input->post('search');
                            $sort_by = $this->input->post('sort_by');
                            $search_for = $this->input->post('search_for');
                            $manage_user = $this->input->post('manage_user');

                            $theme = $this->input->post('theme');
                            $theme_default = $this->input->post('theme_default');
                            $theme_green = $this->input->post('theme_green');
                            $theme_pink = $this->input->post('theme_pink');
                            $theme_gray = $this->input->post('theme_gray');

                            $company_name = $this->input->post('company_name');
                            $manage_company = $this->input->post('manage_company'); 
                            $create_company = $this->input->post('create_company');
                            $company_name_use = $this->input->post('company_name_use');
                            $edit_company = $this->input->post('edit_company');
                            $unname_company = $this->input->post('unname_company');

                            $groupname = $this->input->post('groupname');
                            $description = $this->input->post('description');
                            $manage_group = $this->input->post('manage_group');
                            $create_group = $this->input->post('create_group');
                            $groupname_use = $this->input->post('groupname_use');
                            $edit_group = $this->input->post('edit_group');

                            $manage_member = $this->input->post('manage_member');
                            $manage_permission = $this->input->post('manage_permission');
                            $delete_from_group = $this->input->post('delete_from_group');
                            $free_user = $this->input->post('free_user');
                            $add_to_group = $this->input->post('add_to_group');
                            $delete_permission = $this->input->post('delete_permission');
                            $edit_permission = $this->input->post('edit_permission');
                            $resource = $this->input->post('resource');

                            $manage_language = $this->input->post('manage_language');
                            $edit_language = $this->input->post('edit_language');
                            $language_code = $this->input->post('language_code');
                            $language_name = $this->input->post('language_name');
                            $create_language = $this->input->post('create_language');
                            $language_code_use = $this->input->post('language_code_use');

                            $new_title = $this->input->post('new_title');
                            $new_description = $this->input->post('new_description');
                            $new_image = $this->input->post('new_image'); 
                            $new_content = $this->input->post('new_content'); 
                            $title_use = $this->input->post('title_use'); 
                            $translate = $this->input->post('translate'); 
                            $no_translate = $this->input->post('no_translate'); 
                            $read = $this->input->post('read'); 
                            $edit_trans = $this->input->post('edit_trans'); 
                            $update_img = $this->input->post('update_img'); 
                            $manage_news = $this->input->post('manage_news'); 
                            $create_new = $this->input->post('create_new'); 
                            $new_cmt = $this->input->post('new_cmt');
                            $content = $this->input->post('content');

                            $notification_new = $this->input->post('notification_new');
                            $notification = $this->input->post('notification');
                            $news = $this->input->post('news');
                            if(!$this->language_model->check_language($name, $code))
                            {
                                $data['error'] = $this->lang->line('language_code_use');
                            }
                            else
                            {
                                $this->language_model->create_language($add);
                                $old_umask = umask(0);
                                mkdir("./application/language/".$name,0777);
                                umask($old_umask);
                                $src = './application/language/english';
                                $dst = './application/language/'.$name;
                                $files = glob("./application/language/english/*.*");
                                  foreach($files as $file){
                                  $file_to_go = str_replace($src,$dst,$file);
                                  copy($file, $file_to_go);
                                  chmod($file_to_go, 0777);
                                  }
                                $info = "<?php \n";
                                
                                $info .= "\$lang['username'] =  '".$username."';\n";
                                $info .= "\$lang['password'] =  '".$password."';\n";
                                $info .= "\$lang['repassword'] =  '".$repassword."';\n";
                                $info .= "\$lang['email'] =  '".$email."';\n";
                                $info .= "\$lang['status'] =  '".$status."';\n";
                                $info .= "\$lang['gender'] =  '".$gender."';\n";
                                $info .= "\$lang['dob'] =  '".$dob."';\n";
                                $info .= "\$lang['permission'] =  '".$permission."';\n";
                                $info .= "\$lang['male'] =  '".$male."';\n";
                                $info .= "\$lang['famale'] =  '".$male."';\n";
                                $info .= "\$lang['day'] =  '".$day."';\n";
                                $info .= "\$lang['month'] =  '".$month."';\n";
                                $info .= "\$lang['year'] =  '".$year."';\n";
                                $info .= "\$lang['public'] =  '".$public."';\n";
                                $info .= "\$lang['private'] =  '".$private."';\n";
                                $info .= "\$lang['create'] =  '".$create."';\n";
                                $info .= "\$lang['cancel'] =  '".$cancel."';\n";
                                $info .= "\$lang['user_id'] =  '" .$user_id."';\n";
                                $info .= "\$lang['edit'] =  '".$edit."';\n";
                                $info .= "\$lang['delete'] =  '".$delete."';\n";
                                $info .= "\$lang['dob_valid'] =  '".$dob_valid."';\n";
                                $info .= "\$lang['company'] =  '".$company."';\n";
                                $info .= "\$lang['edit_user'] =  '".$edit_user."';\n";

                                $info .= "\$lang['username_email_use'] =  '".$username_email_use."';\n";
                                $info .= "\$lang['username_pass_valid'] =  '".$username_pass_valid."';\n";

                                $info .= "\$lang['up_img'] =  '".$up_img."';\n";
                                $info .= "\$lang['upload'] =  '".$upload."';\n";
                                $info .= "\$lang['no_img'] =  '".$no_img."';\n";
                                $info .= "\$lang['file_input'] =  '".$file_input."';\n";


                                $info .= "\$lang['login'] =  '".$login."';\n";
                                $info .= "\$lang['systemlogin'] =  '".$systemlogin."';\n";


                                $info .= "\$lang['avatar'] =  '".$avatar."';\n";
                                $info .= "\$lang['dashboard'] =  '".$dashboard."';\n";
                                $info .= "\$lang['update_profile'] =  '".$update_profile."';\n";
                                $info .= "\$lang['admin_dashboard'] =  '".$admin_dashboard."';\n";
                                $info .= "\$lang['create_user'] =  '".$create_user."';\n";
                                $info .= "\$lang['manage_user'] =  '".$manage_user."';\n";
                                $info .= "\$lang['profile'] =  '".$profile."';\n";
                                $info .= "\$lang['logout'] =  '".$logout."';\n";

                                $info .= "\$lang['lang'] =  '".$lang."';\n";
                                $info .= "\$lang['compele'] =  '" .$compele."';\n";

                                $info .= "\$lang['birthday'] =  '".$birthday."';\n";
                                $info .= "\$lang['sort'] =  '".$sort."';\n";
                                $info .= "\$lang['search'] =  '".$search."';\n";
                                $info .= "\$lang['sort_by'] =  '".$sort_by."';\n";
                                $info .= "\$lang['search_for'] =  '".$search_for."';\n";
                                $info .= "\$lang['manage_user'] =  '".$manage_user."';\n";

                                $info .= "\$lang['theme'] =  '".$theme."';\n";
                                $info .= "\$lang['theme_default'] =  '".$theme_default."';\n";
                                $info .= "\$lang['theme_green'] =  '".$theme_green."';\n";
                                $info .= "\$lang['theme_pink'] =  '".$theme_pink."';\n";
                                $info .= "\$lang['theme_gray'] =  '".$theme_gray."';\n";

                                $info .= "\$lang['company_name'] =  '".$company_name."';\n";
                                $info .= "\$lang['manage_company'] =  '".$manage_company."';\n";
                                $info .= "\$lang['create_company'] =  '".$create_company."';\n";
                                $info .= "\$lang['company_name_use'] =  '".$company_name_use."';\n";
                                $info .= "\$lang['edit_company'] =  '".$edit_company."';\n";
                                $info .= "\$lang['unname_company'] =  '".$unname_company."';\n";

                                $info .= "\$lang['groupname'] =  '".$groupname."';\n";
                                $info .= "\$lang['description'] =  '".$description."';\n";
                                $info .= "\$lang['manage_group'] =  '".$manage_group."';\n";
                                $info .= "\$lang['create_group'] =  '".$create_group."';\n";
                                $info .= "\$lang['groupname_use'] =  '".$groupname_use."';\n";
                                $info .= "\$lang['edit_group'] =  '".$edit_group."';\n";

                                $info .= "\$lang['manage_member'] =  '".$manage_member."';\n";
                                $info .= "\$lang['manage_permission'] =  '".$manage_permission."';\n";
                                $info .= "\$lang['delete_from_group'] =  '".$delete_from_group."';\n";
                                $info .= "\$lang['free_user'] =  '".$free_user."';\n";
                                $info .= "\$lang['add_to_group'] =  '".$add_to_group."';\n";
                                $info .= "\$lang['delete_permission'] =  '".$delete_permission."';\n";
                                $info .= "\$lang['edit_permission'] =  '".$edit_permission."';\n";
                                $info .= "\$lang['resource'] =  '".$resource."';\n";

                                $info .= "\$lang['manage_language'] =  '".$manage_language."';\n";
                                $info .= "\$lang['edit_language'] =  '".$edit_language."';\n";
                                $info .= "\$lang['language_code'] =  '".$language_code."';\n";
                                $info .= "\$lang['language_name'] =  '".$language_name."';\n";
                                $info .= "\$lang['create_language'] =  '".$create_language."';\n";
                                $info .= "\$lang['language_code_use'] =  '".$language_code_use."';\n";

                                $info .= "\$lang['new_title'] =  '".$new_title."';\n";
                                $info .= "\$lang['new_description'] =  '".$new_description."';\n";
                                $info .= "\$lang['new_image'] =  '".$new_image."';\n";
                                $info .= "\$lang['new_content'] =  '".$new_content."';\n";
                                $info .= "\$lang['title_use'] =  '".$title_use."';\n";
                                $info .= "\$lang['translate'] =  '".$translate."';\n";
                                $info .= "\$lang['no_translate'] =  '".$no_translate."';\n";
                                $info .= "\$lang['read'] =  '".$read."';\n";
                                $info .= "\$lang['edit_trans'] =  '".$edit_trans."';\n";
                                $info .= "\$lang['update_img'] =  '".$update_img."';\n";
                                $info .= "\$lang['manage_news'] =  '".$manage_news."';\n";
                                $info .= "\$lang['create_new'] =  '".$create_new."';\n";
                                $info .= "\$lang['new_cmt'] =  '".$new_cmt."';\n";
                                $info .= "\$lang['content'] =  '".$content."';\n";

                                $info .= "\$lang['notification_new'] =  '".$notification_new."';\n";
                                $info .= "\$lang['notification'] =  '".$notification."';\n";
                                $info .= "\$lang['news'] =  '".$news."';\n";
                                $info .= "?>";
                                $file_path = './application/language/'.$name.'/form_lang.php';
                                file_put_contents($file_path, $info);
                                $data['error'] = $this->lang->line('compele');
                            }
                            
                        }
                    }
                    $data['page_title'] = 'Sutrix media | '.$this->lang->line('create_language');
                    $data['page_sub_title'] = $this->lang->line('create_language');
                    $data['page_content'] = $this->load->view('create_view',$data,true);
                    $this->load->view('master_layout',$data);
                }
            }
        }
        
        public function edit($langid=-1)
        {
            if(!$this->session->userdata('islogin'))
            {
                redirect(base_url().'index.php/login/log','location');
            }
            else
            {
                $id = $this->session->userdata('id');
                $resource = 5;
                if(!$this->acl->can_delete($id, $resource) && !$this->acl->can_edit($id, $resource))
                {
                    redirect(base_url().'index.php/login/log/profile', 'location');
                }
                else
                {
                    $this->load->model('language_model');
                    if($this->language_model->check_language_byid($langid))
                    {
                        $name_lang = $this->language_model->get_name_byid($langid);
                        echo $name_lang;
                       // $this->lang->load('form','z');
                        $z = $this->lang->line('edit');
                        echo $z;
                       // $this->lang->load('form','English');
                        if($this->input->post('cancel'))
                        {
                            redirect(base_url().'index.php/language/language','location');
                        }
                        if($this->input->post('delete'))
                        {
                            // delete news............
                            
                            
                            $name_del = $this->language_model->get_name_byid($langid);
                            
                            $files = glob("./application/language/".$name_del."/*.*");
                                  foreach($files as $file){
                                  unlink($file);
                            }
                            rmdir("./application/language/".$name_del);
                            $this->language_model->delete_language($langid);
                            redirect(base_url().'index.php/language/language','location');
                        }
                        if($this->input->post('edit'))
                        {
                            $this->form_validation->set_rules('name',$this->lang->line('language_name'),'trim|required');
                            $this->form_validation->set_rules('code',$this->lang->line('language_code'),'trim|required');
                            if($this->form_validation->run()!=FALSE)
                            {
                                $name = $this->input->post('name');
                                $code = $this->input->post('code');
                                
                                $add = array(
                                  'name' => $name,
                                  'code' => $code
                                );

                                
                                if(!$this->language_model->check_edit_language($code, $name ,$langid))
                                {
                                    $data['error'] = $this->lang->line('language_code_use');
                                }
                                else
                                {
                                    $this->language_model->update_language($add, $langid);
                                    $data['error'] = $this->lang->line('compele');
                                }

                            }
                        }
                        $lang = $this->language_model->get_language_byid($langid);
                        $data['lang'] = $lang;
                        $data['page_title'] = 'Sutrix media | '.$this->lang->line('edit_language');
                        $data['page_sub_title'] = $this->lang->line('edit_language');
                        $data['page_content'] = $this->load->view('edit_view',$data,true);
                        $this->load->view('master_layout',$data);
                    }
                    else
                    {
                        redirect(base_url().'index.php/language/language','location');
                    }
                }
            }
        }
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
