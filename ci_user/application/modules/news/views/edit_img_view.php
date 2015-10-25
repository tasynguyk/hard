<form class="form-horizontal well" method="post" action=""  enctype="multipart/form-data">
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
            <input disabled class="span3" name="title" type="text" value="<?php echo $news->id; ?>">
        </div>
        </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_image'); ?></label>
        <div class="controls">
            <input class="input-file" name="userImage" type="file"><br />
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="edit" value="<?php echo $this->lang->line('edit'); ?>" />
        <input type="submit" class="btn btn-primary" name="delete" value="<?php echo $this->lang->line('delete'); ?>" />
      </div>
 </form>

