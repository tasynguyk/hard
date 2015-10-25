  <form action="" method="post" id="list">
  <input type="text" name="txtsearch" placeholder="<?php echo  $this->lang->line('search');?>" />
  <button type="submit" class="btn btn-primary" value="btnsearch" name="btnsearch" value="Search" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('search');?></button>
  <?php
            if($this->session->userdata('language_search'))
            {
                echo  $this->lang->line('search_for').' \''.$this->session->userdata('language_search').'\'';
                ?>
                <button type="submit" class="btn btn-primary" value="cancel" name="btncancel" value="Search" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('cancel').' '.$this->lang->line('search');?></button>
                <?php
            }
       ?><br />
  <table class="table table-bordered table-striped">
      <tr>
        <th><?php echo $this->lang->line('language_name'); ?></th>
        <th><?php echo $this->lang->line('language_code'); ?></th>
        <th></th>
      </tr>
      <?php
        foreach ($list as $l)
        {?>
      <tr>
        <td><?php echo $l->name; ?></td>
        <td>
            <?php
                echo $l->code;
            ?>
        </td>
        <td>
            <a href="<?php echo base_url().'index.php/language/language/edit/'.$l->id;?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('edit'); ?></a>
        </td>
      </tr>
        <?php
        }
        ?>         
  </table>
   </form>
  <?php echo $pagination; ?><br />
 