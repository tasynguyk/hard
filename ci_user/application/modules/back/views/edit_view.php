<form class="form-horizontal well" method="post" action="">
        <div class="control-group">
        <label class="control-label">ID</label>
        <div class="controls">
            <input class="span3" name="title" type="text" value="<?php echo $cmt->id; ?>" disabled>
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('content'); ?></label>
        <div class="controls">
            <input class="span3" name="content" type="text" value="<?php echo $cmt->content; ?>" >
        </div>
      </div>
    <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="edit" value="<?php echo $this->lang->line('edit'); ?>" />
        <input type="submit" class="btn btn-primary" name="delete" value="<?php echo $this->lang->line('delete'); ?>" />
      </div>
 </form>

