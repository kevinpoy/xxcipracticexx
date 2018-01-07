<?php 
print_x($data);
?>
<form action="" method="post">
<div class="question-1">
	1. what is love?<br />
	<input type="checkbox" al="2" class="1_1" name="1_1[]" value="Love is blind" /> Love is blind
	<input type="checkbox" al="2" class="1_1" name="1_1[]" value="Love is love" /> Love is love
	<input type="checkbox" al="2" class="1_1" name="1_1[]" value="Love is something" /> Love is something
	<input type="checkbox" al="2" class="1_1" name="1_1[]" value="Love is in the air" /> Love is in the air
</div>
<div class="question-2">
	2. what is Heart?<br />
	<input type="checkbox" al="3" class="1_2" name="1_2[]" value="Love is blind" /> Love is blind <br />
	<input type="checkbox" al="3" class="1_2" name="1_2[]" value="Love is love" /> Love is love<br />
	<input type="checkbox" al="3" class="1_2" name="1_2[]" value="Love is something" /> Love is something<br />
	<input type="checkbox" al="3" class="1_2" name="1_2[]" value="Love is in the air" /> Love is in the air<br />
</div>
<input type="submit" name="action" value="Submit" />
</form>

<button id="add-question" class="btn btn-lg btn-primary">test</button>

<script>
$(document).ready(function(){
	$('input[type="checkbox"]').on('click', function(){
		var al = $(this).attr("al");
		var clas = $(this).attr('class');
		var check = $('input[type="checkbox"].'+clas+':checked').length;
		
		//if(check > (al-1)){
		if(check > (0)){
			$('input[type="checkbox"].'+clas).not(':checked').attr('disabled', true);
		}else{
			$('input[type="checkbox"].'+clas).not(':checked').attr('disabled', false);
		}
	});

	$('#add-question').on('click', function(e){
		e.preventDefault();

		$('#add-exam-modal').modal('show');
	});

	$('#add-exam-modal').on('click', '#add-choice', function(e){
		e.preventDefault();

		var choice_num = 1;
		var choices = "";

		choices += '<div class="form-group">';
		choices += '<div class="col-md-10" style="margin-top:5px;">';
		choices += '<input type="text" class="form-control" name="question[][]" />';
		choices += '</div>';
		choices += '<div class="col-md-2">';
		choices += '<input type="checkbox" name="answer" value="" />';
		choices += '</div>';
		choices += '</div>';
							
		$('#add-choices-container').find('.extra-choices').append(choices);
	});
});
</script>

<!-- update credentials modal -->
<div class="modal fade" tabindex="-1" id="add-exam-modal" role="dialog">
  <div class="modal-dialog modal-primary">
  <div class="modal-content">
      	<div class="modal-header">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
	      	</button>
   			<h4 class="modal-title">xxxs</h4>
     	</div>

     	<div class="modal-body">
     	<form>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Question <span class="red">*</span></label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
							<input type="text" name="question[][]" class="form-control" value="" required>
						</div>
					</div>
				</div>
			</div>
			
			<div id="add-choices-container">
				<div class="choices">							
					<div class="row">	
						<div class="form-group">				
							<div class="col-md-10">
								<label>Choices</label>
								<input type="text" class="form-control" name="question[][]" />
							</div>
							<div class="col-md-2">
								<input type="checkbox" name="answer" value="" />
							</div>
						</div>
						<div class="extra-choices"></div>
					</div>
					<button id="add-choice" class="btn btn-sm btn-success" style="margin:15px 0 0 0">Add Choices</button>					
				</div>
			</div>	

		</form>
    	</div>

      	<div class="modal-footer">
		    <button id="add-employee-submit" class="btn btn-primary has-spinner">Update</button>
		    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
		</div>
  </div>
  </div>
</div>
<!-- /update credentials modal -->

