    
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
       <input type="hidden" name="groupchoose" id="groupchoose" />
      <input type="hidden" name="groupid" id="groupid" />
      <input type="text" name="txtsearch" placeholder="<?php echo $this->lang->line('search'); ?>" />
       <input  class="btn btn-primary btn-small" type="submit" name="btnsearch" value="<?php echo $this->lang->line('search'); ?>" />  
      <?php
            if($this->session->userdata('search_group'))
            {
                echo  $this->lang->line('search_for').' \''.$this->session->userdata('search_group').'\'';
                ?>
                <button type="submit" class="btn btn-primary" value="cancel" name="btncancel" value="Search" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('cancel').' '.$this->lang->line('search');?></button>
                <?php
            }
       ?>
  <table class="table table-bordered table-striped">
      <tr>
        <th><?php echo $this->lang->line('groupname'); ?></th>
        <th><?php echo $this->lang->line('description'); ?></th>
        <th></th>
      </tr>
      <?php
        foreach ($list as $l)
        {
            ?> 
      <tr>
        <td><?php echo $l->name; ?></td>
        <td class="muted"><?php echo $l->description; ?></td>
        <td>
            <a href="<?php echo base_url().'index.php/acl/admin/member/'.$l->ID;?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('manage_member'); ?></a>
            <a href="<?php echo base_url().'index.php/acl/admin/resource/'.$l->ID;?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('manage_permission'); ?></a>
        </td>
      </tr>
        <?php
        
        }
        ?>         
  </table>
   </form>
  <?php echo $pagination; ?><br />
 