
      <?php 
        if($this->session->userdata('sortby'))
        {
            $sortby =  $this->lang->line($this->session->userdata('sortby'));
            if($sortby=='dob')
                $sortby =  $this->lang->line('birthday');
            echo '('.$this->lang->line('sort_by').' '.$sortby.')';
        }   
      ?><br />
  <form action="" method="post" id="list">
      <input type="hidden" name="memberid" id="memberid" />
      <input type="text" name="txtsearch" placeholder="<?php echo  $this->lang->line('search');?>" />
  <button type="submit" class="btn btn-primary" value="btnsearch" name="btnsearch" value="Search" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('search');?></button>
  <?php
            if($this->session->userdata('search_member'))
            {
                echo  $this->lang->line('search_for').' \''.$this->session->userdata('search_member').'\'';
                ?>
                <button type="submit" class="btn btn-primary" value="cancel" name="btncancel" value="Search" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('cancel').' '.$this->lang->line('search');?></button>
                <?php
            }
       ?>
    <select class="span2" name="user_add">
            <option value="0"><?php echo $this->lang->line('free_user'); ?></option>
            <?php foreach ($free_list as $l)
            {?>
            <option value="<?php echo $l->id; ?>">
                    <?php echo $l->username; ?>
                </option>
            <?php
            }?>
    </select>
    <button type="submit" class="btn btn-primary" value = "add" name="add" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('add_to_group');?></button>
  <table class="table table-bordered table-striped">
      <tr>
        <th><?php echo $this->lang->line('username'); ?></th>
        <th><?php echo $this->lang->line('email'); ?></th>
        <th></th>
      </tr>
      <?php
        foreach ($list as $l)
        {?>
      <tr>
        <td><?php echo $l->username; ?></td>
        <td class="muted"><?php echo $l->email; ?></td>
        <td>
            <input type="button" value="<?php echo $this->lang->line('delete_from_group');?>" class="btn btn-primary btn-small" onclick="get(<?php echo $l->id;?>)" />
        </td>
      </tr>
        <?php
        
        }
        ?>         
  </table>
  <?php echo $pagination; ?>
   </form>
  <?php// echo $pagination; ?><br />
 