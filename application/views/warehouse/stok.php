<div class="row-fluid">
	<div class="span12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4>
					<i class="icon-reorder"></i>
					Managed Stok Produk
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
					<a class="reload" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="row-fluid">
					<?php echo $this->session->flashdata('flash_messageP'); ?>
					<a href="<?php echo site_url('warehouse/input_stok_produk'); ?>" class="btn green">
						<i class="icon-plus"></i>
						Add
					</a>
					<hr class="clearfix" />
				</div>
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Stok</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($produk)){
							$i = 1;
								foreach ($produk as $key => $value) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value->nama; ?></td>
							<td><?php echo $value->stok; ?></td>
							<td><?php echo $value->keterangan; ?></td>
							<td>
								<a href="<?php echo site_url('warehouse/input_stok_produk/'.$value->id); ?>" class="btn blue">
                        	        <i class="icon-edit"></i>
                        	        Edit
                        	    </a>
                        	    <button class="btn red" onclick="actDelProduk(<?php echo $value->id; ?>)">
                        	        <i class="icon-trash"></i>
                        	        Delete
                        	    </button>
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
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box red">
			<div class="portlet-title">
				<h4>
					<i class="icon-reorder"></i>
					Managed Stok Bahan
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
					<a class="reload" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="row-fluid">
					<?php echo $this->session->flashdata('flash_messageB'); ?>
					<a href="<?php echo site_url('warehouse/input_stok_bahan'); ?>" class="btn green">
						<i class="icon-plus"></i>
						Add
					</a>
					<hr class="clearfix" />
				</div>
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Stok</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($bahan)){
							$i = 1;
								foreach ($bahan as $key => $value) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value->nama; ?></td>
							<td><?php echo $value->stok; ?></td>
							<td><?php echo $value->keterangan; ?></td>
							<td>
								<a href="<?php echo site_url('warehouse/input_stok_bahan/'.$value->id); ?>" class="btn blue">
                        	        <i class="icon-edit"></i>
                        	        Edit
                        	    </a>
                        	    <button class="btn red" onclick="actDelBahan(<?php echo $value->id; ?>)">
                        	        <i class="icon-trash"></i>
                        	        Delete
                        	    </button>
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
	function actDelProduk(object) {
        alertify.confirm("Are you sure ?", function(e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>warehouse/delete_stok_produk",
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
    function actDelBahan(object) {
        alertify.confirm("Are you sure ?", function(e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>warehouse/delete_stok_bahan",
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