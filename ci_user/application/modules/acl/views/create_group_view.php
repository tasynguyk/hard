<form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('groupname'); ?></label>
        <div class="controls">
            <input class="span3" name="group_name" type="text" value="" placeholder="<?php echo $this->lang->line('groupname'); ?>">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('description'); ?></label>
        <div class="controls">
            <input class="span3" name="group_description" type="text" placeholder="<?php echo $this->lang->line('description'); ?>">
        </div>
        </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="create" value="<?php echo $this->lang->line('create_group'); ?>" />
        <input type="submit" class="btn" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>

