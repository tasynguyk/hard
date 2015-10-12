<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sutrixmedia | Profle</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="<?php echo base_url().'public/'; ?>assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
body {
	padding-top: 60px;
	padding-bottom: 40px;
}
.sidebar-nav {
	padding: 9px 0;
}
</style>
<link href="<?php echo base_url().'public/'; ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url().'public/'; ?>assets/css/prettify.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url().'public/'; ?>assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url().'public/'; ?>assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url().'public/'; ?>assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url().'public/'; ?>assets/ico/apple-touch-icon-57-precomposed.png">
<script  type="text/javascript">
               function get(id,choose)
               {
                    document.getElementById("userid").value = id;
                    document.getElementById("choose").value = choose;
                    document.getElementById("list").submit();
               }    
</script>
</head>
<body>

<div class="container">
  <h2>User Management</h2>
      
  <form action="" method="post" id="list">
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
  
  <hr/>
  <footer>
    <p>&copy; SutrixMedia 2012</p>
  </footer>
</div>
<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
<script src="<?php echo base_url().'public/'; ?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url().'public/'; ?>assets/js/prettify.js"></script>
</body>
</html>