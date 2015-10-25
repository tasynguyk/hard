<form class="form-horizontal well" method="post" action=""  enctype="multipart/form-data">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
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
            </div>
        </div>
        
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_title'); ?></label>
        <div class="controls">
            <input class="span3" name="title" type="text" value="" placeholder="<?php echo $this->lang->line('new_title'); ?>">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_description'); ?></label>
        <div class="controls">
            <input class="span3" name="des" type="text" placeholder="<?php echo $this->lang->line('new_description'); ?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_image'); ?></label>
        <div class="controls">
            <input class="input-file" name="userImage" type="file"><br />
        </div>
      </div>
    <div class="control-group">
        <label class="control-label" for="textarea"><?php echo $this->lang->line("new_content"); ?></label>
        <div class="controls">
          <textarea class="input-xlarge" name="content" rows="13" ></textarea>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="create" value="<?php echo $this->lang->line('create'); ?>" />
      </div>
 </form>

