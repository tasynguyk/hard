
    <a href="<?php echo base_url().'index.php/mail/mail/create';?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('create'); ?></a>
      <a href="<?php echo base_url().'index.php/mail/mail/send';?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('send_message'); ?></a>
      <a href="<?php echo base_url().'index.php/mail/mail';?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('my_message'); ?></a>
      <br />
  <form action="" method="post" id="list">
  <table class="table table-bordered table-striped">
      <tr>
        <th><?php echo $this->lang->line('username'); ?></th>
        <th><?php echo $this->lang->line('subject'); ?></th>
        <th><?php echo $this->lang->line('time'); ?></th>
        <th></th>
      </tr>
      <?php
        foreach ($list_mail as $l)
        {?>
      <tr>
        <td><?php echo $l->username; ?></td>
        <td>
            <?php
                echo $l->subject;
            ?>
        </td>
        <td><?php echo $l->time; ?></td>
        <td>
          <a href="<?php echo base_url().'index.php/mail/mail/seesend/'.$l->id;?>" class="btn btn-primary btn-small"><?php echo $this->lang->line('see'); ?></a>
        </td>
      </tr>
        <?php
        }
        ?>         
  </table>
   </form>
  <?php echo $pagination; ?><br />
 