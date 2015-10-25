  <form action="" method="post" id="list">
  <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('lang'); ?></label>
            <div class="controls">
              <select class="span2" name="lang">
                <?php
                        foreach ($lang as $l)
                        {
                            ?>
                            <option value="<?php echo $l->code; ?>"><?php echo $l->name; ?></option>
                            <?php
                        }
                ?>
              </select>
              <input type="submit" class="btn btn-primary" name="trans" value="<?php echo $this->lang->line('translate'); ?>" />
              <input type="text" name="search" />
              <input type="submit" class="btn btn-primary" name="btnsearch" value="<?php echo $this->lang->line('translate'); ?>" />
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
              <a href="<?php echo base_url().'index.php/front/news/read/'.$l->new_id;?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('read'); ?></a>
          </td>
      </tr>
                <?php
            }
      ?>
  </table>
   </form>
  <?php echo $pagination; ?><br />
 