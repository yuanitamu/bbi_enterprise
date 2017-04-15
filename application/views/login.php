<!DOCTYPE html>
<html lang="en"> 
<!-- BEGIN HEAD -->
<head>
  	<meta charset="utf-8" />
  	<title><?php echo $title; ?></title>
  	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
  	<meta content="" name="description" />
  	<meta content="" name="author" />
  	<link href="<?php echo base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>assets/backend/css/metro.css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>assets/backend/css/style.css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>assets/backend/css/style_responsive.css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>assets/backend/css/style_default.css" rel="stylesheet" id="style_color" />
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/uniform/css/uniform.default.css" />
  	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend/img/favicon.ico" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
  	<!-- BEGIN LOGO -->
  	<div class="logo">
  		<img src="<?php echo base_url(); ?>assets/backend/img/logo-big.png" alt="" /> 
  	</div>
  	<!-- END LOGO -->
  	<!-- BEGIN LOGIN -->
  	<div class="content">
  	  	<!-- BEGIN LOGIN FORM -->
  	  	<form class="form-vertical login-form" method="post" action="<?php echo site_url('authentication/do_login'); ?>" />
  	    	<h3 class="form-title">Login to your account</h3>
            <?php echo $this->session->flashdata('flash_message'); ?>
  	    	<div class="control-group">
  	      		<div class="controls">
  	        		<div class="input-icon left">
  	          			<i class="icon-user"></i>
  	          			<input class="m-wrap" type="text" name="username" placeholder="Username" />
  	        		</div>
  	      		</div>
  	    	</div>
  	    	<div class="control-group">
  	      		<div class="controls">
  	        		<div class="input-icon left">
  	          			<i class="icon-lock"></i>
  	          			<input class="m-wrap" type="password" name="passwd" placeholder="Password" />
  	        		</div>
  	      		</div>
  	    	</div>
  	    	<div class="form-actions">
  	      		<label class="checkbox">
  	      			<input type="checkbox" /> Remember me
  	      		</label>
  	      		<button type="submit" id="login-btn" class="btn green pull-right">
  	      			Login <i class="m-icon-swapright m-icon-white"></i>
  	      		</button>            
  	    	</div>
  	    	<div class="forget-password">
  	    	  	<h4>Forgot your password ?</h4>
  	    	  	<p>
  	    	    	no worries, click <a href="javascript:;" class="" id="forget-password">here</a>
  	    	    	to reset your password.
  	    	  	</p>
  	    	</div>
  	  	</form>
  	  	<!-- END LOGIN FORM -->        
  	  	<!-- BEGIN FORGOT PASSWORD FORM -->
  	  	<form class="form-vertical forget-form" action="#" />
  	    	<h3 class="">Forget Password ?</h3>
  	    	<p>Enter your e-mail address below to reset your password.</p>
  	    	<div class="control-group">
  	      		<div class="controls">
  	        		<div class="input-icon left">
  	          			<i class="icon-envelope"></i>
  	         			<input class="m-wrap" type="text" placeholder="Email" />
  	        		</div>
  	      		</div>
  	    	</div>
  	    	<div class="form-actions">
  	      		<a href="javascript:;" id="back-btn" class="btn">
  	      			<i class="m-icon-swapleft"></i>  Back
  	      		</a>
  	      		<a href="javascript:;" id="forget-btn" class="btn green pull-right">
  	      			Submit <i class="m-icon-swapright m-icon-white"></i>
  	      		</a>            
  	    	</div>
  	  	</form>
  	  	<!-- END FORGOT PASSWORD FORM -->
  	</div>
  	<!-- END LOGIN -->
  	<!-- BEGIN COPYRIGHT -->
  	<div class="copyright">
  	 	2015 &copy; Luna.
  	</div>
  	<!-- END COPYRIGHT -->
  	<!-- BEGIN JAVASCRIPTS -->
  	<script src="<?php echo base_url(); ?>assets/backend/js/jquery-1.8.3.min.js"></script>
  	<script src="<?php echo base_url(); ?>assets/backend/bootstrap/js/bootstrap.min.js"></script>  
  	<script src="<?php echo base_url(); ?>assets/backend/uniform/jquery.uniform.min.js"></script> 
  	<script src="<?php echo base_url(); ?>assets/backend/js/jquery.blockui.js"></script>
  	<script src="<?php echo base_url(); ?>assets/backend/js/app.js"></script>
  	<script>
  	  jQuery(document).ready(function() {     
  	    App.initLogin();
  	  });
  	</script>
  	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>