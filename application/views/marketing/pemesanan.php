<form class="form-horizontal" action="<?php echo site_url('marketing/pemesanan_add'); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->session->flashdata('flash_message'); ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="portlet box green">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						Pemesanan Information
					</h4>
					<div class="tools">
						<a class="collapse" href="javascript:;"></a>
						<a class="reload" href="javascript:;"></a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<div class="control-group">
						<label class="control-label">Customer</label>
						<div class="controls">
							<select class="span5 chosen" name="customer" data-placeholder="Choose a Category">
								<?php foreach ($cust as $key => $value) {
								?>
								<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Produk</label>
						<div class="controls">
							<select class="span5 chosen" name="produk" data-placeholder="Choose a Category">
								<?php foreach ($produk as $key => $value) {
								?>
								<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Kustomisasi</label>
						<div class="controls">
							<select class="span5 chosen" name="kategori" data-placeholder="Choose a Category">
								<option value="1">Kustomisasi</option>
								<option value="0">Bukan Kustomisasi</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Jumlah</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="jumlah" placeholder="Jumlah" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Total Harga</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="total" placeholder="Total Harga" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Keterangan</label>
						<div class="controls">
							<textarea class="m-wrap wysihtml5 span9" name="keterangan" rows="4" maxlength="200" placeholder="Keterangan"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="row-fluid">
		<div class="form-actions">
			<input type="text" name="status" value="0" style="display:none" />
			<button class="btn green" type="submit">Submit</button>
			<a href="<?php echo site_url('marketing/pemesanan'); ?>" class="btn yellow" type="button">Cancel</a>
		</div>
	</div>
</form>