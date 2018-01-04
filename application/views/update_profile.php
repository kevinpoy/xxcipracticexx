<script>
$('.datepicker').datepicker({
	format: 'yyyy-mm-dd',
});
</script>
<div class="modal-body">
	<form action="" method="post" accept-charset="utf-8" id="update-employee-form" enctype="multipart/form-data">
		<div class="form-inner">		
		<div class="row">
			<div class="col-md-6">
				 <div class="form-group">
					  <label>First Name <span class="red">*</span></label>
					  <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						   <input type="text" name="user_fname" class="form-control" value="<?= $profile['user_fname'] ?>" required>
					  </div>
				 </div>
			</div>
			<div class="col-md-6">
				 <div class="form-group">
					 <label>Last Name <span class="red">*</span></label>
					  <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						   <input type="text" name="user_lname" class="form-control" value="<?= $profile['user_lname'] ?>">
					  </div>
				 </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Profession <span class="red">*</span></label>
					<div class="input-group">
					   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
					   <input type="text" name="user_profession" class="form-control" value="<?= $profile['user_profession'] ?>" required>
				  	</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				 <div class="form-group">
					  <label>Birthday<span class="red">*</span></label>
					  <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						   <input type="text" name="user_birthday" class="form-control datepicker" value="<?= ($profile['user_birthday'] != "0000-00-00" ? $profile['user_birthday'] : '') ?>" required>
					  </div>
				 </div>
			</div>
			<div class="col-md-6">
				 <div class="form-group">
					 <label>Gender <span class="red">*</span></label>
					  <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						   <select class="form-control" name="user_gender" required>
						   		<option value="">Select Gender</option>
						   		<option <?= ($profile['user_gender'] == "M" ? "selected" : "") ?> value="M">Male</option>
						   		<option <?= ($profile['user_gender'] == "F" ? "selected" : "") ?> value="F">Female</option>
						   </select>
					  </div>
				 </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Address <span class="red">*</span></label>
					<div class="input-group">
					   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
					   <input type="text" name="user_address" class="form-control" value="<?= $profile['user_address'] ?>" required>
				  	</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				 <div class="form-group">
					  <label>Contact Number <span class="red">*</span></label>
					  <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						   <input type="text" name="user_number" class="form-control" value="<?= $profile['user_number'] ?>" required>
					  </div>
				 </div>
			</div>
			<div class="col-md-6">
				 <div class="form-group">
					 <label>Email <span class="red">*</span></label>
					  <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
						   <input type="text" class="form-control" value="<?= $profile['user_email'] ?>" readonly />
					  </div>
				 </div>
			</div>
		</div>
		</div>
	<!-- /form under modal footer -->
		<div class="modal-footer">
		    <button id="add-employee-submit" class="btn btn-primary has-spinner">Update</button>
		    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
		</div>
	</form>
</div>