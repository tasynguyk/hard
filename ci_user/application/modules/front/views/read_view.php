<form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_title'); ?></label>
        <div class="controls">
            <input class="span3" name="title" type="text" value="<?php echo isset($news->title)?$news->title:$this->lang->line('no_translate'); ?>" disabled>
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('new_description'); ?></label>
        <div class="controls">
            <input class="span3" name="des" type="text" value="<?php echo isset($news->description)?$news->description:$this->lang->line('no_translate'); ?>" disabled>
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
          <textarea class="input-xlarge" name="content" rows="13" disabled><?php echo isset($news->content)?$news->content:$this->lang->line('no_translate'); ?></textarea>
        </div>
      </div>
      <?php
        if($this->session->userdata("islogin"))
        {
            ?>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('new_cmt'); ?></label>
            <div class="controls">
              <input class="span3" name="txtcmt" type="text" value="">
            </div>
        </div>
    
      <div class="form-actions">
        
        <input type="submit" class="btn" name="cmt" value="<?php echo $this->lang->line('new_cmt'); ?>" />
      </div>
            <?php
        }
      ?>
    <?php
      foreach ($list as $l)
      {
          ?>
    <div class="control-group">
        <label class="control-label" for="textarea"><?php echo $l->username; ?></label>
        <div class="controls">
          <?php echo $l->content.'<br />'.$l->time; ?>
        </div>
      </div>
          <?php
      }
      echo $pagination;
    ?>
 </form>

