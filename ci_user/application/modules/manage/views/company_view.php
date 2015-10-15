
      <br />
  <form action="" method="post" id="list">
       <input type="hidden" name="companychoose" id="companychoose" />
      <input type="hidden" name="companyid" id="companyid" />
  <input type="text" name="txtsearch" placeholder="<?php echo  $this->lang->line('search');?>" />
  <button type="submit" class="btn btn-primary" value="btnsearch" name="btnsearch" value="Search" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('search');?></button>
  <br/><?php
            if($this->session->userdata('company_search'))
            {
                echo  $this->lang->line('search_for').' \''.$this->session->userdata('company_search').'\'';
                ?>
                <button type="submit" class="btn btn-primary" value="cancel" name="btncancel" value="Search" data-loading-text="loading..." id="form-login-btnLogin"><?php echo  $this->lang->line('cancel').' '.$this->lang->line('search');?></button>
                <?php
            }
       ?>
  <table class="table table-bordered table-striped">
      <tr>
        <th><?php echo $this->lang->line('company_name'); ?></th>
        <th></th>
      </tr>
      <?php
        foreach ($list as $l)
        {?>
      <tr>
        <td><?php echo $l->name; ?></td>
        <td>
            <?php
                $id = $this->session->userdata('id');
                if($this->acl->can_delete($id,2))
                {
                    ?>
                    <input type="button" value="<?php echo $this->lang->line('delete');?>" class="btn btn-primary btn-small" onclick="get(<?php echo $l->id;?>,'delete')" />
                    <?php
                }
                $id = $this->session->userdata('id');
                if($this->acl->can_edit($id,2))
                {
                    ?>
                    <input type="button" value="<?php echo $this->lang->line('edit');?>" class="btn btn-primary btn-small" onclick="get(<?php echo $l->id;?>,'edit')" />
                    <?php
                }
            ?>
        </td>
      </tr>
        <?php
        }
        ?>         
  </table>
   </form>
  <?php echo $pagination; ?><br />
   Export <a href="<?php echo base_url().'index.php/manage/manage/exportexcel';?>">Excel</a>
   <a href="<?php echo base_url().'index.php/manage/manage/exportpdf';?>">PDF</a>
 