<div class="modal-body">
	<div id="message-box"></div>
	<form action=""  method="post" accept-charset="utf-8" id="update-credentials-form" enctype="multipart/form-data">
		<div class="form-inner">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Email<span class="red">*</span></label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						<input type="text" class="form-control" value="<?= $profile['user_email'] ?>" required readonly>
					</div>
				 </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Current Password<span class="red">*</span></label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						<input type="password" name="user_current_password" class="form-control" required>
					</div>
				 </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				 <div class="form-group">
					  <label>New Password <span class="red">*</span></label>
					  <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						   <input type="password" name="new_password" class="form-control" value="" required>
					  </div>
				 </div>
			</div>
			<div class="col-md-6">
				 <div class="form-group">
					 <label>Repeat Password <span class="red">*</span></label>
					  <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						   <input type="password" name="confirm_new_password" class="form-control" value="" required>
					  </div>
				 </div>
			</div>
		</div>
		</div>
		
		<div class="modal-footer">
		    <button id="add-employee-submit" class="btn btn-primary has-spinner">Update</button>
		    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
		</div>
	</form>
</div>
	