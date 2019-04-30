
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-client" action="{{url('admin/clients')}}" data-request="enable-enter" method="POST" class="horizontal-form">
				<div class="form-body">

					<h3 class="form-section">Add Client</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Name</label>
								<input type="text" required id="name" name="name" class="form-control" placeholder="Enter client Name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Email</label>
								<input type="text" required id="name" name="email" class="form-control" placeholder="Enter Email">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Password</label>
								<input type="text" required id="password" name="password" class="form-control" placeholder="Enter Password">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Phone Code</label>
								<select class="form-control" name="phone_code">
									<option value="+91">+91</option>
									<option value="+1">+1</option>
									<option value="+86">+86</option>
									<option value="+61">+61</option>
									<option value="+33">+33</option>
									<option value="+98">+98</option>
									<option value="+964">+964</option>
									<option value="+972">+972</option>
									<option value="+39">+39</option>
								</select>
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Mobile Number</label>
								<input type="text" required id="name" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" data-request="isnumeric">
								
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/clients')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-client"]' class="btn blue add_client"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
			<!-- END FORM-->
		</div>		
	</div>
</div>
@section('requirejs')
<script type="text/javascript">
    setTimeout(function(){
    $('[data-request="enable-enter"]').on('keyup','input',function (e) {
    e.preventDefault();
    if (e.which == 13) {
    $('[data-request="enable-enter"]').find('.add_client').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection
