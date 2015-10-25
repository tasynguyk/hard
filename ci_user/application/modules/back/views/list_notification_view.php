  <form action="" method="post" id="list">
  <table class="table table-bordered table-striped">
      <tr>
          <th><?php echo $this->lang->line('username'); ?></th>
          <th><?php echo $this->lang->line('read'); ?></th>
          <th><?php echo $this->lang->line('time'); ?></th>
      </tr>
      <?php
            foreach ($list as $l)
            {
                ?>
      <tr>
          <td><?php echo $l->username; ?></td>
          <td><a href="<?php echo base_url().'index.php/front/news/read/'.$l->newsid; ?>" ><?php echo $this->lang->line('read'); ?></a></td>
          <td><?php echo $l->time; ?></td>
      </tr>
                <?php
            }
      ?>
  </table>
   </form>
  <?php echo $pagination; ?><br />
 