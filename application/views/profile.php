<section class="content">
  <div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/dist/img/user4-128x128.jpg" alt="User profile picture">

          <h3 class="profile-username text-center"><?= $profile['user_fname'].' '.$profile['user_lname'] ?></h3>
          <p class="text-muted text-center"><?= $profile['user_profession'] ?></p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item text-center">
             <a id="update-details" on="<?= $profile['user_id'] ?>" href="javascript:;">Manage Details</a>
            </li>
            <li class="list-group-item text-center">
             <a id="update-credentials" on="<?= $profile['user_id'] ?>" href="javascript:;">Manage Credentials</a>
            </li>
            <li class="list-group-item">
              <b>Friends</b> <a class="pull-right">13,287</a>
            </li>
          </ul>

          <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-personal-details" id="personal-details" on="<?= $profile['user_id'] ?>" data-toggle="tab">Personal Details</a></li>
          <li><a href="#timeline" data-toggle="tab">Blank Tab</a></li>          
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="tab-personal-details">
            <div class="row equal">
              <div class="col-md-6">
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Personal Details</h3>
                  </div>
                  <div class="box-body">
                    <table class="table table-condensed">
                    <tbody>
                      <tr><td class="field-label" style="min-width:147px;">Full Name</td><td><?= $profile['user_fname'].' '.$profile['user_lname'] ?></td></tr>
                      <tr><td class="field-label">Profession</td><td><?= $profile['user_profession'] ?></td></tr>
                      <tr><td class="field-label">Birth Date</td><td><?= date("F j, Y", strtotime($profile['user_birthday'])) ?></td></tr>                    
                      <tr><td class="field-label">Gender</td><td><?= $profile['user_gender'] ?></td></tr>
                      <tr><td class="field-label">Email</td><td><?= $profile['user_email'] ?></td></tr>
                      <tr><td class="field-label">Contact No</td><td><?= $profile['user_number'] ?></td></tr>
                      <tr><td class="field-label">Present Address</td><td><?= $profile['user_address'] ?></td></tr>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="timeline">
            Coming soon..
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
  $('#update-details').on('click', function(e){
    e.preventDefault();

    var userid = $(this).attr('on');
    $.post("<?= base_url('home/profile/') ?>",
      function(data){
        if(data != 0 || data != "0"){
          $('#update-employee-modal').find('.modal-inner').html(data);
          $('#update-employee-modal').modal('show');         
        }
    });
  });

  $('#update-employee-modal').on('submit', '#update-employee-form', function(e){
    e.preventDefault();

    $.post("<?= base_url('home/update_profile/') ?>",
      $(this).serialize(),
      function(data){
        if(data == 1 || data === "1"){
          $.alert({
            title: 'Success!',
            type: 'green',
            content: 'Successfully Updated Profile!',
            buttons: {
              OK: function(){
                location.reload();
              }
            }
          });
        }else{
          $.alert({
            title: 'Failed',
            type: 'red',
            content: 'Failed to update profile!',
          });
        }
      });
  });

  $('#update-credentials').on('click', function(e){
    e.preventDefault();
    var userid = $(this).attr('on');  

    $.post("<?= base_url('home/fetch_email/') ?>",
      function(data){
        if(data != 0 || data != "0"){
          $('#update-credentials-modal').find('.modal-inner').html(data);
          $('#update-credentials-modal').modal('show');         
        }
    });
  });

  $('#update-credentials-modal').on('submit', '#update-credentials-form', function(e){
    e.preventDefault();
    
    $.post("<?= base_url('home/update_credentials/') ?>",
    $(this).serialize(),
    function(data){
      $.alert({
        title: data.title,
        type: data.type,
        content: data.message        
      });
    },'json');
  });

});
</script>

<!-- add employee modal -->
<div class="modal fade" tabindex="-1" id="update-employee-modal" role="dialog">
  <div class="modal-dialog modal-primary">
  <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       <h4 class="modal-title">Update Employee</h4>
      </div>

      <div class="modal-inner">
      </div>
  </div>
  </div>
</div>
<!-- /end add employee modal -->

<!-- update credentials modal -->
<div class="modal fade" tabindex="-1" id="update-credentials-modal" role="dialog">
  <div class="modal-dialog modal-primary">
  <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       <h4 class="modal-title">Update Credentials</h4>
      </div>

      <div class="modal-inner">
      </div>
  </div>
  </div>
</div>
<!-- /update credentials modal -->