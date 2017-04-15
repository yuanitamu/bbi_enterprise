<form class="form-horizontal" action="<?php echo site_url('warehouse/edit_stok_bahan/'.$bahan[0]->id); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->session->flashdata('flash_message'); ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="portlet box green">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						Stok Information
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
							<input class="span5 m-wrap" type="text" name="nama" value="<?php echo $bahan[0]->nama; ?>" placeholder="Nama" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Stok Bahan</label>
						<div class="controls">
							<input class="span5 m-wrap" type="text" name="stok" value="<?php echo $bahan[0]->stok; ?>" placeholder="Nama" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Keterangan</label>
						<div class="controls">
							<textarea class="m-wrap wysihtml5 span9" name="keterangan" rows="4" maxlength="200" placeholder="Description"><?php echo $bahan[0]->keterangan; ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="row-fluid">
		<div class="form-actions">
			<button class="btn green" type="submit">Submit</button>
			<a href="<?php echo site_url('warehouse/stok'); ?>" class="btn yellow" type="button">Cancel</a>
		</div>
	</div>
</form>