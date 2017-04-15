<form class="form-horizontal" action="<?php echo site_url('produksi/add_bahan'); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->session->flashdata('flash_message'); ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="portlet box green">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						Request Bahan
					</h4>
					<div class="tools">
						<a class="collapse" href="javascript:;"></a>
						<a class="reload" href="javascript:;"></a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<div class="control-group">
						<label class="control-label">Nama Bahan</label>
						<div class="controls">
							<select class="span5 chosen" name="nama" data-placeholder="Choose a Category">
							<?php foreach ($bahan as $key => $value) {
								?>
								<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Jumlah Bahan</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="stok" placeholder="Jumlah" />
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="row-fluid">
		<div class="form-actions">
			<input type="text" name="id" value="" style="display:none" />
			<button class="btn green" type="submit">Submit</button>
			<a href="<?php echo site_url('produksi/bahan'); ?>" class="btn yellow" type="button">Cancel</a>
		</div>
	</div>
</form>