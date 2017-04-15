<div class="row-fluid">
	<div class="span12">
		<div class="portlet box light-grey">
			<div class="portlet-title">
				<h4>
					<i class="icon-reorder"></i>
					Managed Group
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
					<a class="reload" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="row-fluid">
					<?php echo $this->session->flashdata('flash_message'); ?>
					<a href="<?php echo site_url('supply/input_pembelian'); ?>" class="btn green">
						<i class="icon-plus"></i>
						Beli
					</a>
					<hr class="clearfix" />
				</div>
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Description</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($pembelian)){
							$i = 1;
								foreach ($pembelian as $key => $value) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value->nama; ?></td>
							<td><?php echo $value->jumlah; ?></td>
							<td><?php echo $value->harga; ?></td>
							<td><?php echo $value->keterangan; ?></td>
							<td>
								<?php if($value->status == 0){ ?>
								<button class="btn blue">
                        	        <!-- <i class="icon-edit"></i> -->
                        	        Menunggu Persetujuan
                        	    </button>
                        	    <?php } elseif($value->status == 1){ ?>
                        	    <button class="btn">
                        	        <!-- <i class="icon-trash"></i> -->
                        	        Diterima
                        	    </button>
                        	    <?php } ?>
							</td>
						</tr>
						<?php 
								$i++;
							} 
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function actDel(object) {
        alertify.confirm("Are you sure ?", function(e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>marketing/pembayaran_delete",
                    data: {id: object},
                    success: function(msg)
                    {
                        data = msg.split('|');
                        $('#flash_message').html(data[1]);
                        setTimeout(function() {
                            $('#flash_message').html('')
                        }, 1000);
                        location.reload();
                    }
                });
            }
        });
    }
	$(document).ready(function(){
		$('#data-table').dataTable();
	});
</script>