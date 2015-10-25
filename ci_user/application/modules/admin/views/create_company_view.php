<form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company_name'); ?></label>
        <div class="controls">
            <input class="span3" name="name" type="text" value="" placeholder="<?php echo $this->lang->line('company_name'); ?>">
        </div>
        </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="create" value="<?php echo $this->lang->line('create_company'); ?>" />
        <input type="submit" class="btn" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>

