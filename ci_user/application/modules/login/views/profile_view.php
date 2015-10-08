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
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="javascript:void(0)">Sutrixmedia <span>Admin Panel</span></a>
      <div class="btn-group pull-right"> <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"> <i class="icon-user icon-white"></i> <?php echo isset($username)?$username:'';?> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li><a href="">Profile</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url().'index.php/login/log/logout'; ?>">Sign Out</a></li>
        </ul>
      </div>
      <ul class="nav pull-right">
        <li class="dropdown"> <a href="javascipt:void(0)" class="dropdown-toggle" data-toggle="dropdown">Dashboard<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="javascipt:void(0)">Update profile</a></li>
            <?php if($this->session->userdata("permission")!=0)
            {
                ?>
                <li class="nav-header">Admin Dashboard</li>
                <li><a href="">Create user</a></li>
                <li><a href="<?php echo base_url().'index.php/manage/manage'; ?>">Manage user</a></li>
                <?php
            }?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container">
<div class="row">
  <div class="span12">
    <h1>Dashboard<small> Welcome to Sutrixmedia Panel</small></h1>
    <hr/>
    <div class="hero-unit">
      <h1>Hello, world!</h1>
      <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <p><a class="btn btn-primary btn-small">Learn more</a></p>
    </div>
    <hr/>
    <div class="well">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h3>
      Announcement
      </h3>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
     </div>
  </div>
  </div>
  <h2>User Management</h2>
  <table class="table table-bordered table-striped">
      <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Birthday</th>
        <th>Phone</th>
        <th>City</th>
        <th>Newsletters</th>
        <th>Published</th>
      </tr>
      <tr>
        <td><a href="details.html" title="Nguyen Van A">Nguyen Van A</a></td>
        <td class="muted">None</td>
        <td>10/10/1990</td>
        <td>0123456789</td>
        <td>Ho Chi Minh</td>
        <td><input type="checkbox" id="chk-newsletter-1" value=""></td>
        <td><input type="checkbox" id="chk-published-1" value=""></td>
      </tr>
      <tr>
        <td><a href="details.html" title="Nguyen Van A">Nguyen Van A</a></td>
        <td>nguyenvana@abc.com</td>
        <td>10/10/1990</td>
        <td>0123456789</td>
        <td>Ho Chi Minh</td>
        <td><input type="checkbox" id="chk-newsletter-2" value=""></td>
        <td><input type="checkbox" id="chk-published-2" value=""></td>
      </tr>
      <tr>
        <td><a href="details.html" title="Nguyen Van A">Nguyen Van A</a></td>
        <td class="muted">None</td>
        <td>10/10/1990</td>
        <td>0123456789</td>
        <td>Ho Chi Minh</td>
        <td><input type="checkbox" id="chk-newsletter-3" value=""></td>
        <td><input type="checkbox" id="chk-published-3" value=""></td>
      </tr>
      <tr>
        <td><a href="details.html" title="Nguyen Van A">Nguyen Van A</a></td>
        <td>nguyenvana@abc.com</td>
        <td>10/10/1990</td>
        <td>0123456789</td>
        <td>Ho Chi Minh</td>
        <td><input type="checkbox" id="chk-newsletter-4" value=""></td>
        <td><input type="checkbox" id="chk-published-4" value=""></td>
      </tr>
      <tr>
        <td><a href="details.html" title="Nguyen Van A">Nguyen Van A</a></td>
        <td>nguyenvana@abc.com</td>
        <td>10/10/1990</td>
        <td>0123456789</td>
        <td>Ho Chi Minh</td>
        <td><input type="checkbox" id="chk-newsletter-5" value=""></td>
        <td><input type="checkbox" id="chk-published-5" value=""></td>
      </tr>                  
  </table>
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