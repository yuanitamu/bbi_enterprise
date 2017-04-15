<!DOCTYPE html>
<html lang="en">
	 <head>
        <?php
        // place your script below ex:
        $this->load->view('template/general/script');
        ?>
    </head>
    <body class="fixed-top">
    	 <?php
        // load your content here ex:
        $this->load->view('template/general/header');
        ?>
        
        <!-- BEGIN CONTAINER -->
		<div class="page-container row-fluid">

        <?php
        $this->load->view('template/general/sidebar');
        ?>
        
        <!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							<?php echo $nav; ?>
							<small><?php echo $nav_desc; ?></small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo site_url('dashboard'); ?>">Home</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="#"><?php echo $nav; ?></a></li>
							<li class="pull-right no-text-shadow">
								<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
									<i class="icon-calendar"></i>
									<span></span>
									<i class="icon-angle-down"></i>
								</div>
							</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
        <?php
        echo $contents;
        ?>
			</div>
			<!-- END PAGE CONTAINER-->
		</div>

        </div>
		<!-- END CONTAINER -->

		<?php
        $this->load->view('template/general/footer');
        ?>

        <?php
        // if you have script in footer, place below ex:
        $this->load->view('template/general/script_footer');
        ?>
    </body>
</html>