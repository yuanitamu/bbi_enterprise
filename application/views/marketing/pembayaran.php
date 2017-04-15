<div class="row-fluid">
	<div class="span12">
		<div class="portlet box light-grey">
			<div class="portlet-title">
				<h4>
					<i class="icon-reorder"></i>
					Pembayaran
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
					<a class="reload" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Invoice</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($invoice)){
							$i = 1;
								foreach ($invoice as $key => $value) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value->id; ?></td>
							<td><?php echo $value->jumlah; ?></td>
							<td><?php echo $value->total; ?></td>
							<td>
							<?php if($value->status == 0){
							?>
								<a href="<?php echo site_url('marketing/pembayaran_edit/'.$value->id); ?>" class="btn blue">
                        	        <i class="icon-edit"></i>
                        	        Bayar
                        	    </a>
                        	    <button class="btn red" onclick="actDel(<?php echo $value->id; ?>)">
                        	        <i class="icon-trash"></i>
                        	        Batal
                        	    </button>
                        	<?php }else{
                        	?>
                        		<div class="btn">
                        	        Terbayarkan
                        	    </div>
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