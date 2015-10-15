  <form class="form-horizontal well" method="post" action="">
        <?php
            echo validation_errors();
            if(isset($error))
            {
              echo '<br />'.$error;
            }
           // echo 'sdfsd';   
        ?>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('user_id'); ?></label>
        <div class="controls">
            <input class="span3" type="text" value="<?php echo $this->session->userdata('userid'); ?>" disabled>
        </div>
      </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('username'); ?></label>
        <div class="controls">
            <input class="span3" name="username" type="text" value="<?php echo isset($user->username)?$user->username:''; ?>" placeholder="<?php echo $this->lang->line('username'); ?>">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('password'); ?></label>
        <div class="controls">
            <input class="span3" name="password" type="password"  placeholder="<?php echo $this->lang->line('password'); ?>">
        </div>
      </div>
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('repassword'); ?></label>
        <div class="controls">
          <input class="span3" name="repassword" type="password" placeholder="<?php echo $this->lang->line('repassword'); ?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('email'); ?></label>
        <div class="controls">
            <input class="span3" name="email" type="text" value="<?php echo isset($user->email)?$user->email:''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>">
        </div>
        </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('gender'); ?></label>
        <div class="controls">
          <select class="span2" name="gender">
            <option value="1"><?php echo $this->lang->line('male'); ?></option>
            <option value="0"><?php echo $this->lang->line('famale'); ?></option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('dob'); ?></label>
        <div class="controls">
          <select class="span1" name="day">
              <?php $time = explode("-", $user->dob); ?>
            <option value="0"><?php echo $this->lang->line('day'); ?></option>
            <?php for($i=1;$i<=31;$i++)
            {?>
            <option value="<?php echo $i; ?>"<?php if($i==$time[2]) echo ' selected '; ?>>
                    <?php echo $i; ?>
                </option>
            <?php
            }?>
          </select>
          <select class="span1" name="month">
            <option value="0"><?php echo $this->lang->line('month'); ?></option>
            <?php for($i=1;$i<=12;$i++)
            {?>
            <option value="<?php echo $i; ?>"<?php if($i==$time[1]) echo ' selected '; ?>>
                    <?php echo $i; ?>
                </option>
            <?php
            }?>
          </select>
          <select class="span1" name="year">
            <option value="0"><?php echo $this->lang->line('year'); ?></option>
            <?php for($i=2005;$i>=1951;$i--)
            {?>
            <option value="<?php echo $i; ?>" <?php if($i==$time[0]) echo ' selected '; ?>>
                    <?php echo $i; ?>
                </option>
            <?php
            }?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('permission'); ?></label>
        <div class="controls">
          <select class="span2" name="permission">
                <option value="0">User</option>
                <option value="1">Admin</option>
            <?php if($this->session->userdata('permission')>1)
          {?>
                <option value="2">Super admin</option>
          <?php } ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('status'); ?></label>
        <div class="controls">
          <select class="span2" name="status">
            <option value="1"><?php echo $this->lang->line('public'); ?></option>
            <option value="0"><?php echo $this->lang->line('private'); ?></option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('company'); ?></label>
        <div class="controls">
          <select class="span2" name="companyid">
              <?php
                foreach ($list_company as $val)
                {
                    ?>
              <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                    <?php
                }
              ?>
          </select>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="edit" value="<?php echo $this->lang->line('edit'); ?>" />
        <input type="submit" class="btn" name="cancel" value="<?php echo $this->lang->line('cancel'); ?>" />
      </div>
 </form>