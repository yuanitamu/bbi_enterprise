<div class="row-fluid">
	<div class="span12">
		<div class="portlet box light-grey">
			<div class="portlet-title">
				<h4>
					<i class="icon-reorder"></i>
					Validasi
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
							<th>Divisi</th>
							<th>Keperluan</th>
							<th>Total Harga</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($keuangan)){
							$i = 1;
								foreach ($keuangan as $key => $value) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value->divisi; ?></td>
							<td><?php echo $value->keperluan; ?></td>
							<td><?php echo $value->total; ?></td>
							<td><?php echo ($value->status == 0) ? 'Masuk' : 'Keluar' ; ?></td>
							<td>
							    <button class="btn red" onclick="actDel(<?php echo $value->id; ?>)">
                        	        <i class="icon-trash"></i>
                        	        Validasi
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
	function actDel(object) {
        alertify.confirm("Are you sure ?", function(e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>accounting/validasi_pembayaran",
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