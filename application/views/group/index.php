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
					<a href="<?php echo site_url('group/input'); ?>" class="btn green">
						<i class="icon-plus"></i>
						Add
					</a>
					<hr class="clearfix" />
				</div>
				<table class="table table-striped table-bordered" id="data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(!empty($group)){
							$i = 1;
								foreach ($group as $key => $value) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value->name; ?></td>
							<td><?php echo $value->description; ?></td>
							<td>
								<a href="<?php echo site_url('group/input/'.$value->id); ?>" class="btn blue">
                        	        <i class="icon-edit"></i>
                        	        Edit
                        	    </a>
                        	    <button class="btn red" onclick="actDel(<?php echo $value->id; ?>)">
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
	function actDel(object) {
        alertify.confirm("Are you sure ?", function(e) {
            if (e) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>group/delete",
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