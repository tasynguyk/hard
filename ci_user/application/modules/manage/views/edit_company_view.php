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
            <input class="span3" name="id" type="text" value="<?php echo isset($company->company_id)?$company->company_id:''; ?>" placeholder="<?php echo $this->lang->line('company_name_en'); ?>" disabled>
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company_name_en'); ?></label>
        <div class="controls">
            <input class="span3" name="en_name" type="text" value="<?php echo isset($company->en_name)?$company->en_name:''; ?>" placeholder="<?php echo $this->lang->line('company_name_en'); ?>">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company_name_vi'); ?></label>
        <div class="controls">
            <input class="span3" name="vi_name" type="text" value="<?php echo isset($company->vi_name)?$company->vi_name:''; ?>" placeholder="<?php echo $this->lang->line('company_name_vi'); ?>">
        </div>
        </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="edit" value="<?php echo $this->lang->line('edit_company'); ?>" />
        <input type="submit" class="btn" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>

