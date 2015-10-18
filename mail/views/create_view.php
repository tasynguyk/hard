<form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('mail_to'); ?></label>
        <div class="controls">
          <select class="span2" name="userid">
              <?php
                foreach ($user_list as $val)
                {
                    ?>
              <option value="<?php echo $val->id; ?>"><?php echo $val->username; ?></option>
                    <?php
                }
              ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('subject'); ?></label>
        <div class="controls">
            <input class="span3" name="subject" type="text" placeholder="<?php echo $this->lang->line('subject'); ?>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('message'); ?></label>
        <div class="controls">
            <textarea class="input-xlarge" name="message" rows="3" value="" placeholder="<?php echo $this->lang->line('message'); ?>"></textarea>
        </div>
        </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="send" value="<?php echo $this->lang->line('send'); ?>" />
        <input type="submit" class="btn" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>