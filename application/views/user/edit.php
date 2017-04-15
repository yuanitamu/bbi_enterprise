<form class="form-horizontal" action="<?php echo site_url('user/edit/'.$user[0]->id); ?>" method="post" enctype="multipart/form-data">
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
							<input class="span10 m-wrap" type="text" name="firstname" value="<?php echo @$user[0]->firstname; ?>" placeholder="Firstname" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Lastname</label>
						<div class="controls">
							<input class="span10 m-wrap" type="text" name="lastname" value="<?php echo @$user[0]->lastname; ?>" placeholder="Lastname" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Gender</label>
						<div class="controls">
							<select class="span10 chosen" name="gender" data-placeholder="Choose a Category" tabindex="1">
								<?php
									$gender = '';
									if(!empty(@$user[0]->gender)){
										if(@$user[0]->gender == 1){
											$gender = 'Male';
										}elseif(@$user[0]->gender == 2){
											$gender = 'Female';
										}
										echo '<option selected style="display:none;" value="'.$user->gender.'">
										'.$gender.'
										</option>';
									}
								?>
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
							<input class="span10 m-wrap" type="text" name="username" value="<?php echo @$user[0]->username; ?>" placeholder="Username" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input class="span10 m-wrap" type="text" name="email" value="<?php echo @$user[0]->email; ?>" placeholder="Email" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">User Privilege</label>
						<div class="controls">
							<select class="span10 chosen" name="group" data-placeholder="Choose a Category" tabindex="1">
								<?php
									echo '<option selected style="display:none;" value="'.$user[0]->group.'">
										'.$user[0]->group.'
										</option>';
								?>
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
<div class="row-fluid">
	<div class="span12">
		<?php echo $this->session->flashdata('flash_message_passwd'); ?>
		<form class="form-horizontal" action="<?php echo site_url('user/edit_pass/'.$user[0]->id); ?>" method="post" enctype="multipart/form-data">
			<div class="portlet box red">
				<div class="portlet-title">
					<h4>
						<i class="icon-reorder"></i>
						User Password
					</h4>
					<div class="tools">
						<a class="collapse" href="javascript:;"></a>
						<a class="reload" href="javascript:;"></a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input disabled class="span10 m-wrap" value="<?php echo paramDecrypt(@$user[0]->password); ?>" type="text" />
						</div>
					</div>
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
					<div class="form-actions">
						<button class="btn green" type="submit">Submit</button>
						<a href="<?php echo site_url('user'); ?>" class="btn yellow" type="button">Cancel</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>