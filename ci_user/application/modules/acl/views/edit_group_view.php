<form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
        <div class="control-group">
        <label class="control-label">ID</label>
        <div class="controls">
            <input class="span3" name="group_id" type="text" value="<?php echo $group->ID; ?>" disabled>
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('groupname'); ?></label>
        <div class="controls">
            <input class="span3" name="group_name" type="text" value="<?php echo $group->name; ?>" placeholder="<?php echo $this->lang->line('groupname'); ?>">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('description'); ?></label>
        <div class="controls">
            <textarea class="input-xlarge" name="group_description" rows="3" value="" placeholder="<?php echo $this->lang->line('description'); ?>"><?php echo $group->description; ?></textarea>
        </div>
        </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="edit" value="<?php echo $this->lang->line('edit_group'); ?>" />
        <input type="submit" class="btn" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>

