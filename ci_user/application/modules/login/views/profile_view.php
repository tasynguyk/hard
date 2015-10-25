
<form class="form-horizontal well" method="post" action="">
    <div class="control-group">
        <?php 
        echo $this->lang->line('avatar'); 
        ?>: 
        <image src="<?php echo base_url().'uploads/'.$this->session->userdata('id'); ?>.jpg" width="100px" height="100px" />
        <div class="control-group">
        <label class="control-label"><?php echo $this->lang->line('groupname'); ?></label>
        <div class="controls">
            <?php echo $group; ?>
      </div>
    </div>
</form>