<form class="form-horizontal well" method="post" action="">
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
                            <option value="<?php echo $l->code; ?>" <?php echo ($lang_use==$l->code)?'selected':''; ?>><?php echo $l->name; ?></option>
                            <?php
                        }
                ?>
              </select><input type="submit" class="btn btn-primary" name="trans" value="<?php echo $this->lang->line('translate'); ?>" />
            </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo 'ID'; ?></label>
        <div class="controls">
            <input class="span3" name="id" type="text" value="<?php echo isset($news->new_id)?$news->new_id:'?'; ?>" disabled>
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_title'); ?></label>
        <div class="controls">
            <input class="span3" name="title" type="text" value="<?php echo isset($news->title)?$news->title:$this->lang->line('no_translate'); ?>" >
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_description'); ?></label>
        <div class="controls">
            <input class="span3" name="des" type="text" value="<?php echo isset($news->description)?$news->description:$this->lang->line('no_translate'); ?>" >
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_image'); ?></label>
        <div class="controls">
            <img src="<?php echo base_url().'uploads/'.$image; ?>" height="200" width="200" />
        </div>
      </div>
     <div class="control-group">
        <label class="control-label" for="textarea"><?php echo $this->lang->line("new_content"); ?></label>
        <div class="controls">
          <textarea class="input-xlarge" name="content" rows="13" ><?php echo isset($news->content)?$news->content:$this->lang->line('no_translate'); ?></textarea>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="edit" value="<?php echo $this->lang->line('edit'); ?>" />
        <input type="submit" class="btn" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>

