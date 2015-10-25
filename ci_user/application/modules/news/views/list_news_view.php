  <form action="" method="post" id="list">
  <div class="control-group">
              <input type="text" name="search" />
              <input type="submit" class="btn btn-primary" name="btnsearch" value="<?php echo $this->lang->line('search'); ?>" />
              <?php
                if($this->session->userdata("search_new"))
                {
                    echo $this->lang->line("search_for").' \''.$this->session->userdata("search_new").'\'';?>
              <input type="submit" class="btn btn-primary" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
                        <?php
                }
              ?>
            </div>
        </div>
  <table class="table table-bordered table-striped">
      <tr>
          <th><?php echo $this->lang->line('new_title'); ?></th>
          <th><?php echo $this->lang->line('new_description'); ?></th>
          <th></th>
      </tr>
      <?php
            foreach ($list as $l)
            {
                ?>
      <tr>
          <td><?php echo $l->title; ?></td>
          <td><?php echo $l->description; ?></td>
          <td>
              <a href="<?php echo base_url().'index.php/news/news/read/'.$l->new_id;?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('read'); ?></a>
              <a href="<?php echo base_url().'index.php/news/news/edit/'.$l->new_id;?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('edit_trans'); ?></a>
              <a href="<?php echo base_url().'index.php/news/news/fulledit/'.$l->new_id;?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('edit'); ?></a>
          </td>
      </tr>
                <?php
            }
      ?>
  </table>
   </form>
  <?php echo $pagination; ?><br />
 