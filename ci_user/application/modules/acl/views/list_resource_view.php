
      <?php 
        if($this->session->userdata('sortby'))
        {
            $sortby =  $this->lang->line($this->session->userdata('sortby'));
            if($sortby=='dob')
                $sortby =  $this->lang->line('birthday');
            echo '('.$this->lang->line('sort_by').' '.$sortby.')';
        }   
      ?><br />
  <form action="" method="post" id="list">
      <input type="hidden" name="rsid" id="rsid" />
      <input type="hidden" name="rschoose" id="rschoose" />  
    <select class="span2" name="rs_add">
            <option value="0"><?php echo $this->lang->line('resource'); ?></option>
            <?php foreach ($free as $l)
            {?>
            <option value="<?php echo $l->ID; ?>">
                    <?php echo $l->resource_name; ?>
                </option>
            <?php
            }?>
    </select>
    <button type="submit" class="btn btn-primary" value = "add" name="add" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('add_to_group');?></button>
  <table class="table table-bordered table-striped">
      <tr>
        <th><?php echo $this->lang->line('resoure_name'); ?></th>
        <th><?php echo $this->lang->line('create'); ?></th>
        <th><?php echo $this->lang->line('delete'); ?></th>
        <th><?php echo $this->lang->line('edit'); ?></th>
        <th></th>
      </tr>
      <?php
        foreach ($list as $l)
        {
            $id =$l->id;
            ?>
      <tr>
        <td><?php echo $l->name; ?></td>
        <td>
            <input type="checkbox" value="1" name="cb_create_<?= $id ?>" <?= ($l->create==1)?'checked':''; ?>/>
        </td>
        <td>
            <input type="checkbox" value="1" name="cb_delete_<?= $id ?>" <?= ($l->delete==1)?'checked':''; ?>/>
        </td>
        <td>
            <input type="checkbox" value="1" name="cb_edit_<?= $id ?>" <?= ($l->edit==1)?'checked':''; ?>/>
        </td>
        <td>
            <input type="button" value="<?php echo $this->lang->line('delete_permission');?>" class="btn btn-primary btn-small" onclick="get(<?= $id;?>,'delete')" />
            <input type="button" value="<?php echo $this->lang->line('edit_permission');?>" class="btn btn-primary btn-small" onclick="get(<?= $id;?>,'edit')" />
        </td>
      </tr>
        <?php
        
        }
        ?>         
  </table>
   </form>
  <?php// echo $pagination; ?><br />
 