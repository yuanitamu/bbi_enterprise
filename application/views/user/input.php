<form class="form-horizontal" action="<?php echo site_url('user/add'); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->session->flashdata('flash_message'); ?>
	<div class="row-fluid">
		<div class="span6">
			<div class="portlet box green">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						Personal Information
					</h4>
					<div class="tools">
						<a class="collapse" href="javascript:;"></a>
						<a class="reload" href="javascript:;"></a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<div class="control-group">
						<label class="control-label">Firstname</label>
						<div class="controls">
							<input class="span10 m-wrap" type="text" name="firstname" placeholder="Firstname" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Lastname</label>
						<div class="controls">
							<input class="span10 m-wrap" type="text" name="lastname" placeholder="Lastname" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Gender</label>
						<div class="controls">
							<select class="span10 chosen" name="gender" data-placeholder="Choose a Category" tabindex="1" required>
								<option value="1">Male</option>
								<option value="2">Female</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="portlet box yellow">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						User Information
					</h4>
					<div class="tools">
						<a class="collapse" href="javascript:;"></a>
						<a class="reload" href="javascript:;"></a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input class="span10 m-wrap" type="text" name="username" placeholder="Username" required />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input class="span10 m-wrap" type="text" name="email" placeholder="Email" required />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">User Privilege</label>
						<div class="controls">
							<select class="span10 chosen" name="group" data-placeholder="Choose a Category" tabindex="1">
								<?php foreach ($group as $key => $value) {
								?>
								<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<!-- <div class="control-group">
						<label class="control-label">Image Upload</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                </div>
                                <div>
                                   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                   <span class="fileupload-exists">Change</span>
                                   <input type="file" class="default" /></span>
                                   <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
							</div>
							<span class="label label-important">NOTE!</span>
                            <span>
                            Attached image thumbnail is
                            supported in Latest Firefox, Chrome, Opera, 
                            Safari and Internet Explorer 10 only
                            </span>
						</div>
					</div> -->
					<div class="control-group">
						<label class="control-label">New Password</label>
						<div class="controls">
							<input class="span10 m-wrap" type="password" name="new_passwd" placeholder="New Password" required />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Confirm Password</label>
						<div class="controls">
							<input class="span10 m-wrap" type="password" name="cf_passwd" placeholder="Confirm Password" required />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="form-actions">
			<input type="text" name="id" value="" style="display:none" />
			<button class="btn green" type="submit">Submit</button>
			<a href="<?php echo site_url('user'); ?>" class="btn yellow" type="button">Cancel</a>
		</div>
	</div>
</form>