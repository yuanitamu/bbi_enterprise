<form class="form-horizontal" action="<?php echo site_url('supply/edit_supplier/'.$supplier[0]->id); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->session->flashdata('flash_message'); ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="portlet box green">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						Supplier Information
					</h4>
					<div class="tools">
						<a class="collapse" href="javascript:;"></a>
						<a class="reload" href="javascript:;"></a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<div class="control-group">
						<label class="control-label">Nama Supplier</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="nama" value="<?php echo $supplier[0]->nama; ?>" placeholder="Firstname" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Alamat Supplier</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="alamat" value="<?php echo $supplier[0]->alamat; ?>" placeholder="Firstname" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Kordinator Supplier</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="kordinator" value="<?php echo $supplier[0]->kordinator; ?>" placeholder="Firstname" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Telepon Supplier</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="telepon" value="<?php echo $supplier[0]->telepon; ?>" placeholder="Firstname" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email Supplier</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="email" value="<?php echo $supplier[0]->email; ?>" placeholder="Firstname" />
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="row-fluid">
		<div class="form-actions">
			<button class="btn green" type="submit">Submit</button>
			<a href="<?php echo site_url('supply/supplier'); ?>" class="btn yellow" type="button">Cancel</a>
		</div>
	</div>
</form>