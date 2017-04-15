<form class="form-horizontal" action="<?php echo site_url('supply/add_tender'); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->session->flashdata('flash_message'); ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="portlet box green">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						Open Tender Information
					</h4>
					<div class="tools">
						<a class="collapse" href="javascript:;"></a>
						<a class="reload" href="javascript:;"></a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<div class="control-group">
						<label class="control-label">Pengadaan</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="nama" placeholder="Pengadaan" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Waktu Mulai</label>
						<div class="controls">
							<input class="span5 m-wrap date-picker" type="text" data-date-format="yyyy-mm-dd" name="start" placeholder="Mulai" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Waktu Berakhir</label>
						<div class="controls">
							<input class="span5 m-wrap date-picker" type="text" data-date-format="yyyy-mm-dd" name="end" placeholder="Berakhir" />
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