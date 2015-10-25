<form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('language_code'); ?></label>
        <div class="controls">
            <input class="span3" name="code" type="text" value="" placeholder="<?php echo $this->lang->line('language_code'); ?>">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('language_name'); ?></label>
        <div class="controls">
            <input class="span3" name="name" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
      
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('username'); ?></label>
        <div class="controls">
            <input class="span3" name="username" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('password'); ?></label>
        <div class="controls">
            <input class="span3" name="password" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('repassword'); ?></label>
        <div class="controls">
            <input class="span3" name="repassword" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('email'); ?></label>
        <div class="controls">
            <input class="span3" name="email" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('status'); ?></label>
        <div class="controls">
            <input class="span3" name="status" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('gender'); ?></label>
        <div class="controls">
            <input class="span3" name="gender" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('dob'); ?></label>
        <div class="controls">
            <input class="span3" name="dob" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('permission'); ?></label>
        <div class="controls">
            <input class="span3" name="permission" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('male'); ?></label>
        <div class="controls">
            <input class="span3" name="male" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('famale'); ?></label>
        <div class="controls">
            <input class="span3" name="famale" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>
    
    <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('day'); ?></label>
        <div class="controls">
            <input class="span3" name="day" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('month'); ?></label>
        <div class="controls">
            <input class="span3" name="month" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('year'); ?></label>
        <div class="controls">
            <input class="span3" name="year" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('public'); ?></label>
        <div class="controls">
            <input class="span3" name="public" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('private'); ?></label>
        <div class="controls">
            <input class="span3" name="private" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('create'); ?></label>
        <div class="controls">
            <input class="span3" name="create" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('cancel'); ?></label>
        <div class="controls">
            <input class="span3" name="cancel" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('user_id'); ?></label>
        <div class="controls">
            <input class="span3" name="user_id" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('edit'); ?></label>
        <div class="controls">
            <input class="span3" name="edit" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('delete'); ?></label>
        <div class="controls">
            <input class="span3" name="delete" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('dob_valid'); ?></label>
        <div class="controls">
            <input class="span3" name="dob_valid" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company'); ?></label>
        <div class="controls">
            <input class="span3" name="company" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('username_email_use'); ?></label>
        <div class="controls">
            <input class="span3" name="username_email_use" type="text" placeholder="<?php echo $this->lang->line('username_email_use'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('username_pass_valid'); ?></label>
        <div class="controls">
            <input class="span3" name="username_pass_valid" type="text" placeholder="<?php echo $this->lang->line('username_pass_valid'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('up_img'); ?></label>
        <div class="controls">
            <input class="span3" name="up_img" type="text" placeholder="<?php echo $this->lang->line('up_img'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('upload'); ?></label>
        <div class="controls">
            <input class="span3" name="upload" type="text" placeholder="<?php echo $this->lang->line('upload'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('no_img'); ?></label>
        <div class="controls">
            <input class="span3" name="no_img" type="text" placeholder="<?php echo $this->lang->line('no_img'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('file_input'); ?></label>
        <div class="controls">
            <input class="span3" name="file_input" type="text" placeholder="<?php echo $this->lang->line('file_input'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('login'); ?></label>
        <div class="controls">
            <input class="span3" name="login" type="text" placeholder="<?php echo $this->lang->line('login'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('systemlogin'); ?></label>
        <div class="controls">
            <input class="span3" name="systemlogin" type="text" placeholder="<?php echo $this->lang->line('systemlogin'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('avatar'); ?></label>
        <div class="controls">
            <input class="span3" name="avatar" type="text" placeholder="<?php echo $this->lang->line('avatar'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('dashboard'); ?></label>
        <div class="controls">
            <input class="span3" name="dashboard" type="text" placeholder="<?php echo $this->lang->line('dashboard'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('update_profile'); ?></label>
        <div class="controls">
            <input class="span3" name="update_profile" type="text" placeholder="<?php echo $this->lang->line('update_profile'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('admin_dashboard'); ?></label>
        <div class="controls">
            <input class="span3" name="admin_dashboard" type="text" placeholder="<?php echo $this->lang->line('admin_dashboard'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('create_user'); ?></label>
        <div class="controls">
            <input class="span3" name="create_user" type="text" placeholder="<?php echo $this->lang->line('create_user'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('manage_user'); ?></label>
        <div class="controls">
            <input class="span3" name="manage_user" type="text" placeholder="<?php echo $this->lang->line('manage_user'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('profile'); ?></label>
        <div class="controls">
            <input class="span3" name="profile" type="text" placeholder="<?php echo $this->lang->line('profile'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('logout'); ?></label>
        <div class="controls">
            <input class="span3" name="logout" type="text" placeholder="<?php echo $this->lang->line('logout'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('lang'); ?></label>
        <div class="controls">
            <input class="span3" name="lang" type="text" placeholder="<?php echo $this->lang->line('lang'); ?>">
        </div>
      </div>
    
<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('compele'); ?></label>
        <div class="controls">
            <input class="span3" name="compele" type="text" placeholder="<?php echo $this->lang->line('compele'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('birthday'); ?></label>
        <div class="controls">
            <input class="span3" name="birthday" type="text" placeholder="<?php echo $this->lang->line('birthday'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('sort'); ?></label>
        <div class="controls">
            <input class="span3" name="sort" type="text" placeholder="<?php echo $this->lang->line('sort'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('search'); ?></label>
        <div class="controls">
            <input class="span3" name="search" type="text" placeholder="<?php echo $this->lang->line('search'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('sort_by'); ?></label>
        <div class="controls">
            <input class="span3" name="sort_by" type="text" placeholder="<?php echo $this->lang->line('sort_by'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('search_for'); ?></label>
        <div class="controls">
            <input class="span3" name="search_for" type="text" placeholder="<?php echo $this->lang->line('search_for'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('manage_user'); ?></label>
        <div class="controls">
            <input class="span3" name="manage_user" type="text" placeholder="<?php echo $this->lang->line('manage_user'); ?>">
        </div>
      </div>
<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('theme'); ?></label>
        <div class="controls">
            <input class="span3" name="theme" type="text" placeholder="<?php echo $this->lang->line('theme'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('theme_default'); ?></label>
        <div class="controls">
            <input class="span3" name="theme_default" type="text" placeholder="<?php echo $this->lang->line('theme_default'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('theme_green'); ?></label>
        <div class="controls">
            <input class="span3" name="theme_green" type="text" placeholder="<?php echo $this->lang->line('theme_green'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('theme_pink'); ?></label>
        <div class="controls">
            <input class="span3" name="theme_pink" type="text" placeholder="<?php echo $this->lang->line('theme_pink'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('theme_gray'); ?></label>
        <div class="controls">
            <input class="span3" name="theme_gray" type="text" placeholder="<?php echo $this->lang->line('theme_gray'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company_name'); ?></label>
        <div class="controls">
            <input class="span3" name="company_name" type="text" placeholder="<?php echo $this->lang->line('company_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('manage_company'); ?></label>
        <div class="controls">
            <input class="span3" name="manage_company" type="text" placeholder="<?php echo $this->lang->line('manage_company'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('create_company'); ?></label>
        <div class="controls">
            <input class="span3" name="create_company" type="text" placeholder="<?php echo $this->lang->line('create_company'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company_name_use'); ?></label>
        <div class="controls">
            <input class="span3" name="company_name_use" type="text" placeholder="<?php echo $this->lang->line('company_name_use'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('edit_company'); ?></label>
        <div class="controls">
            <input class="span3" name="edit_company" type="text" placeholder="<?php echo $this->lang->line('edit_company'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('unname_company'); ?></label>
        <div class="controls">
            <input class="span3" name="unname_company" type="text" placeholder="<?php echo $this->lang->line('unname_company'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('groupname'); ?></label>
        <div class="controls">
            <input class="span3" name="groupname" type="text" placeholder="<?php echo $this->lang->line('groupname'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('description'); ?></label>
        <div class="controls">
            <input class="span3" name="description" type="text" placeholder="<?php echo $this->lang->line('description'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('manage_group'); ?></label>
        <div class="controls">
            <input class="span3" name="manage_group" type="text" placeholder="<?php echo $this->lang->line('manage_group'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('create_group'); ?></label>
        <div class="controls">
            <input class="span3" name="create_group" type="text" placeholder="<?php echo $this->lang->line('create_group'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('groupname_use'); ?></label>
        <div class="controls">
            <input class="span3" name="groupname_use" type="text" placeholder="<?php echo $this->lang->line('groupname_use'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('edit_group'); ?></label>
        <div class="controls">
            <input class="span3" name="edit_group" type="text" placeholder="<?php echo $this->lang->line('edit_group'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('manage_member'); ?></label>
        <div class="controls">
            <input class="span3" name="manage_member" type="text" placeholder="<?php echo $this->lang->line('manage_member'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('manage_permission'); ?></label>
        <div class="controls">
            <input class="span3" name="manage_permission" type="text" placeholder="<?php echo $this->lang->line('manage_permission'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('delete_from_group'); ?></label>
        <div class="controls">
            <input class="span3" name="delete_from_group" type="text" placeholder="<?php echo $this->lang->line('delete_from_group'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('free_user'); ?></label>
        <div class="controls">
            <input class="span3" name="free_user" type="text" placeholder="<?php echo $this->lang->line('free_user'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('add_to_group'); ?></label>
        <div class="controls">
            <input class="span3" name="add_to_group" type="text" placeholder="<?php echo $this->lang->line('add_to_group'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('delete_permission'); ?></label>
        <div class="controls">
            <input class="span3" name="delete_permission" type="text" placeholder="<?php echo $this->lang->line('delete_permission'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('edit_permission'); ?></label>
        <div class="controls">
            <input class="span3" name="edit_permission" type="text" placeholder="<?php echo $this->lang->line('edit_permission'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('resource'); ?></label>
        <div class="controls">
            <input class="span3" name="resource" type="text" placeholder="<?php echo $this->lang->line('resource'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('manage_language'); ?></label>
        <div class="controls">
            <input class="span3" name="manage_language" type="text" placeholder="<?php echo $this->lang->line('manage_language'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('edit_language'); ?></label>
        <div class="controls">
            <input class="span3" name="edit_language" type="text" placeholder="<?php echo $this->lang->line('edit_language'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('language_code'); ?></label>
        <div class="controls">
            <input class="span3" name="language_code" type="text" placeholder="<?php echo $this->lang->line('language_code'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('language_name'); ?></label>
        <div class="controls">
            <input class="span3" name="language_name" type="text" placeholder="<?php echo $this->lang->line('language_name'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('create_language'); ?></label>
        <div class="controls">
            <input class="span3" name="create_language" type="text" placeholder="<?php echo $this->lang->line('create_language'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('language_code_use'); ?></label>
        <div class="controls">
            <input class="span3" name="language_code_use" type="text" placeholder="<?php echo $this->lang->line('language_code_use'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_title'); ?></label>
        <div class="controls">
            <input class="span3" name="new_title" type="text" placeholder="<?php echo $this->lang->line('new_title'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_description'); ?></label>
        <div class="controls">
            <input class="span3" name="new_description" type="text" placeholder="<?php echo $this->lang->line('new_description'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_image'); ?></label>
        <div class="controls">
            <input class="span3" name="new_image" type="text" placeholder="<?php echo $this->lang->line('new_image'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_content'); ?></label>
        <div class="controls">
            <input class="span3" name="new_content" type="text" placeholder="<?php echo $this->lang->line('new_content'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('title_use'); ?></label>
        <div class="controls">
            <input class="span3" name="title_use" type="text" placeholder="<?php echo $this->lang->line('title_use'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('translate'); ?></label>
        <div class="controls">
            <input class="span3" name="translate" type="text" placeholder="<?php echo $this->lang->line('translate'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('no_translate'); ?></label>
        <div class="controls">
            <input class="span3" name="no_translate" type="text" placeholder="<?php echo $this->lang->line('no_translate'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('read'); ?></label>
        <div class="controls">
            <input class="span3" name="read" type="text" placeholder="<?php echo $this->lang->line('read'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('edit_trans'); ?></label>
        <div class="controls">
            <input class="span3" name="edit_trans" type="text" placeholder="<?php echo $this->lang->line('edit_trans'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('update_img'); ?></label>
        <div class="controls">
            <input class="span3" name="update_img" type="text" placeholder="<?php echo $this->lang->line('update_img'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('manage_news'); ?></label>
        <div class="controls">
            <input class="span3" name="manage_news" type="text" placeholder="<?php echo $this->lang->line('manage_news'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('create_new'); ?></label>
        <div class="controls">
            <input class="span3" name="create_new" type="text" placeholder="<?php echo $this->lang->line('create_new'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_cmt'); ?></label>
        <div class="controls">
            <input class="span3" name="new_cmt" type="text" placeholder="<?php echo $this->lang->line('new_cmt'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('content'); ?></label>
        <div class="controls">
            <input class="span3" name="content" type="text" placeholder="<?php echo $this->lang->line('content'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('notification_new'); ?></label>
        <div class="controls">
            <input class="span3" name="notification_new" type="text" placeholder="<?php echo $this->lang->line('notification_new'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('notification'); ?></label>
        <div class="controls">
            <input class="span3" name="notification" type="text" placeholder="<?php echo $this->lang->line('notification'); ?>">
        </div>
      </div>

<div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('news'); ?></label>
        <div class="controls">
            <input class="span3" name="news" type="text" placeholder="<?php echo $this->lang->line('news'); ?>">
        </div>
      </div>


    
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="btncreate" value="<?php echo $this->lang->line('create'); ?>" />
        <input type="submit" class="btn" name="btncancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>

