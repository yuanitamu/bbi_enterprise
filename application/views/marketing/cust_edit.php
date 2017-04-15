<form class="form-horizontal" action="<?php echo site_url('marketing/cust_edit/'.$cust[0]->id); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->session->flashdata('flash_message'); ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="portlet box green">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						Customer Information
					</h4>
					<div class="tools">
						<a class="collapse" href="javascript:;"></a>
						<a class="reload" href="javascript:;"></a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<div class="control-group">
						<label class="control-label">Nama</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="nama" value="<?php echo $cust[0]->nama; ?>" placeholder="Nama" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Alamat</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="alamat" value="<?php echo $cust[0]->alamat; ?>" placeholder="Alamat" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="email" value="<?php echo $cust[0]->email; ?>" placeholder="Email" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Telepon</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="telepon" value="<?php echo $cust[0]->telepon; ?>" placeholder="Telepon" />
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="row-fluid">
		<div class="form-actions">
			<button class="btn green" type="submit">Submit</button>
			<a href="<?php echo site_url('marketing/customer'); ?>" class="btn yellow" type="button">Cancel</a>
		</div>
	</div>
</form>