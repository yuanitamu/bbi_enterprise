<?php $user = $this->session->userdata('luna'); ?>
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="navbar-inner">
		<div class="container-fluid">
			<!-- BEGIN LOGO -->
			<a class="brand" href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url(); ?>assets/backend/img/logo.png" alt="logo" />
			</a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
			<img src="<?php echo base_url(); ?>assets/backend/img/menu-toggler.png" alt="" />
			</a>          
			<!-- END RESPONSIVE MENU TOGGLER -->				
			<!-- BEGIN TOP NAVIGATION MENU -->					
			<ul class="nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<!-- <img alt="" src="<?php echo base_url(); ?>assets/backend/img/avatar1_small.jpg" /> -->
					<span class="username"><?php echo $user[0]->username; ?></span>
					<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user"></i> My Profile</a></li>
						<!-- <li><a href="#"><i class="icon-calendar"></i> My Calendar</a></li> -->
						<!-- <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li> -->
						<li class="divider"></li>
						<li><a href="<?php echo site_url('authentication/do_logout'); ?>"><i class="icon-key"></i> Log Out</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->	
		</div>
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->