  <form action="" method="post" id="list">
  <table class="table table-bordered table-striped">
      <tr>
          <th><?php echo $this->lang->line('username'); ?></th>
          <th>ID</th>
          <th><?php echo $this->lang->line('content'); ?></th>
          <th><?php echo $this->lang->line('time'); ?></th>
          <th></th>
      </tr>
      <?php
            foreach ($list as $l)
            {
                ?>
      <tr>
          <td><?php echo $l->username; ?></td>
          <td><a href="<?php echo base_url().'index.php/front/news/read/'.$l->id; ?>" ><?php echo $l->id; ?></a></td>
          <td><?php echo $l->content; ?></td>
          <td><?php echo $l->time; ?></td>
          <td>
             <a href="<?php echo base_url().'index.php/back/cmt/edit/'.$l->cmt_id; ?>" ><?php echo $this->lang->line("edit"); ?></a>
          </td>
      </tr>
                <?php
            }
      ?>
  </table>
   </form>
  <?php echo $pagination; ?><br />
 