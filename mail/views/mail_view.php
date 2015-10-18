<form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line($type); ?></label>
        <div class="controls">
          <?php echo $mail->username; ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('subject'); ?></label>
        <div class="controls">
          <?php echo $mail->subject; ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('message'); ?></label>
        <div class="controls">
            <textarea class="input-xlarge" name="message" rows="3" value="" placeholder="<?php echo $this->lang->line('message'); ?>" disabled><?php echo $mail->message; ?></textarea>
        </div>
        </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('time_send'); ?></label>
        <div class="controls">
          <?php echo $mail->time; ?>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="delete" value="<?php echo $this->lang->line('delete'); ?>" />
      </div>
 </form>

