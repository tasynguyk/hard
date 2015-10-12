<form class="form-horizontal well" method="post" action="<?php echo base_url().'index.php/ajax/ajax/upload_img'; ?>" id="uploadForm" enctype="multipart/form-data">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
        ?>
        
        <div class="control-group">
        <label class="control-label" for="fileInput"><?php echo $this->lang->line('file_input'); ?></label>
        <div class="controls">
          <input class="input-file" type="file" name="userImage">
        </div>
        
      </div>
        <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <div id="targetLayer"><?php echo $this->lang->line('no_img'); ?></div>
      </div>
        
      </div>
        <div class="form-actions">
            <input type="submit" value="<?php echo $this->lang->line('upload'); ?>" class="btnSubmit" name="upload" />
      </div>
 </form>