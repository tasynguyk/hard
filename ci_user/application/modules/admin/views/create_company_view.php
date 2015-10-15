<form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company_name_en'); ?></label>
        <div class="controls">
            <input class="span3" name="en_name" type="text" value="<?php echo isset($user->username)?$user->username:''; ?>" placeholder="<?php echo $this->lang->line('company_name_en'); ?>">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company_name_vi'); ?></label>
        <div class="controls">
            <input class="span3" name="vi_name" type="text" value="<?php echo isset($user->username)?$user->username:''; ?>" placeholder="<?php echo $this->lang->line('company_name_vi'); ?>">
        </div>
        </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="create" value="<?php echo $this->lang->line('create_company'); ?>" />
        <input type="submit" class="btn" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>

