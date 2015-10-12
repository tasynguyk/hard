<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sutrixmedia | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url().'public/'; ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url().'public/'; ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url().'public/'; ?>assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url().'public/'; ?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url().'public/'; ?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url().'public/'; ?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url().'public/'; ?>assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body>
    <form class="form-horizontal form-login" action="<?php echo base_url().'index.php/login/log/index'; ?>" method="post">
        <fieldset>
        <legend><?php echo $this->lang->line('systemlogin'); ?></legend>
        <?php 
            echo validation_errors();
            echo isset($error)?$error:'';
        ?>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-envelope"></i></span><input class="span3" id="frm-login-email" name="username" type="text" placeholder="Username">
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-lock"></i></span><input class="span3" id="frm-login-password" name="password" type="password" placeholder="Password" >
            </div>
          </div>
        </div>                 
      </fieldset>
      <div class="form-actions">
          <button type="submit" class="btn btn-primary" name="login" value="Login" data-loading-text="loading..." id="form-login-btnLogin"><?php echo $this->lang->line('login'); ?></button>
      </div>      
    </form>
    <script src="<?php echo base_url().'public/'; ?>assets/js/jquery-1.7.2.min.js"></script>    
    <script src="<?php echo base_url().'public/'; ?>assets/js/bootstrap.min.js"></script>
    <script>
      $('.form-login').css({
        'margin-left':-($('.form-login').outerWidth()/2),
        'margin-top':-($('.form-login').outerHeight()/2)
      });
      $(window).resize(function () {
        $('.form-login').css({
          'margin-left':-($('.form-login').outerWidth()/2),
          'margin-top':-($('.form-login').outerHeight()/2)
        });
      });      
      $('#form-login-btnLogin')
      .click(function () {
        var btn = $(this)
        btn.button('loading');
        setTimeout(function () {                 
          btn.button('reset');
        }, 3000)
      });
    </script>    
  </body>
</html>