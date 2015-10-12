
      <?php 
        if($this->session->userdata('sortby'))
        {
            $sortby = $this->session->userdata('sortby');
            if($sortby=='dob')
                $sortby = "birthday";
            echo '(Sort by '.$sortby.')';
        }   
      ?><br />
  <form action="" method="post" id="list">
       <input type="hidden" name="choose" id="choose" />
      <input type="hidden" name="userid" id="userid" />
      <select class="span2" name="sortby">
        <option value="username">Username</option>
        <option>Birthday</option>
        <option value="email">Email</option>
        <option value="permission">Permission</option>
      </select>
  <button type="submit" class="btn btn-primary" name="sort" value="Sort" data-loading-text="loading..." id="form-login-btnLogin">Sort</button>
  <input type="text" name="txtsearch" placeholder="Search" />
  <button type="submit" class="btn btn-primary" value="btnsearch" name="btnsearch" value="Search" data-loading-text="loading..." id="form-login-btnLogin">Search</button>
  <br/><?php
            if($this->session->userdata('search'))
            {
                echo 'Searh for \''.$this->session->userdata('search').'\'';
                ?>
                <button type="submit" class="btn btn-primary" value="cancel" name="btncancel" value="Search" data-loading-text="loading..." id="form-login-btnLogin">Cancel search</button>
                <?php
            }
       ?>
  <table class="table table-bordered table-striped">
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Birthday</th>
        <th>Status</th>
        <th>Gender</th>
        <th>Permission</th>
        <th>Company</th>
        <th></th>
      </tr>
      <?php
        foreach ($list as $l)
        {?>
      <tr>
        <td><?php echo $l->username; ?></td>
        <td class="muted"><?php echo $l->email; ?></td>
        <td>
            <?php echo $l->dob;?>
        </td>
        <td>
            <?php
                if($l->status==1)
                {
                    echo 'Public';
                }
                else
                {
                    echo 'Private';
                }
            ?>
        </td>
        <td>
            <?php
                if($l->gender==1)
                {
                    echo 'Male';
                }
                else
                {
                    echo 'Female';
                }
            ?>
        </td>
        <td>
            <?php
                if($l->permission==0)
                    echo 'User';
                if($l->permission==1)
                    echo 'Admin';
                if($l->permission==2)
                    echo 'Super Admin';
            ?>
        </td>
        <td><?php echo $l->name; ?></td>
        <td>
            <input type="button" value="Delete" class="btn btn-primary btn-small" onclick="get(<?php echo $l->id;?>,'delete')" />
            <input type="button" value="Edit" class="btn btn-primary btn-small" onclick="get(<?php echo $l->id;?>,'edit')" />
        </td>
      </tr>
        <?php
        
        }
        ?>         
  </table>
   </form>
  <?php echo $pagination; ?><br />
   Export<a href="<?php echo base_url().'index.php/manage/manage/exportexcel';?>"> Excel</a>
   <a href="<?php echo base_url().'index.php/manage/manage/exportpdf';?>">PDF</a>
 