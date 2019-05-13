
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-course" action="{{url('admin/clients/'.___encrypt($client['id']))}}" data-request="enable-enter" method="POST" class="horizontal-form">
				<input type="hidden" value="PUT" name="_method">
				<div class="form-body">
					<h3 class="form-section">Edit Client</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Name</label>
								<input type="text" value="{{$client['name']}}" required id="name" name="name" class="form-control" placeholder="Enter Course Name">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Email</label>
								<input type="text" required id="name" name="email" value="{{$client['email']}}" class="form-control" placeholder="Enter Email">
								
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Phone Code</label>
								<select class="form-control" name="phone_code">
									<option @if($client['phone_code']=='+91') selected @endif  value="+91">+91</option>
									<option @if($client['phone_code']=='+1') selected @endif  value="+1">+1</option>
									<option @if($client['phone_code']=='+86') selected @endif  value="+86">+86</option>
									<option @if($client['phone_code']=='+61') selected @endif  value="+61">+61</option>
									<option @if($client['phone_code']=='+33') selected @endif  value="+33">+33</option>
									<option @if($client['phone_code']=='+98') selected @endif  value="+98">+98</option>
									<option @if($client['phone_code']=='+964') selected @endif  value="+964">+964</option>
									<option @if($client['phone_code']=='+972') selected @endif  value="+972">+972</option>
									<option @if($client['phone_code']=='+39') selected @endif  value="+39">+39</option>
								</select>
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Mobile Number</label>
								<input type="text" required id="name" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" data-request="isnumeric" value="{{$client['mobile_number']}}">
								
							</div>
						</div>
						
						
					</div>
				
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/clients')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-course"]' class="btn blue edit_course"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
			<!-- END FORM-->
		</div>		
	</div>
</div>
@section('requirejs')
<script type="text/javascript">
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<script type="text/javascript">
    setTimeout(function(){
    $('[data-request="enable-enter"]').on('keyup','input',function (e) {
    e.preventDefault();
    if (e.which == 13) {
    $('[data-request="enable-enter"]').find('.edit_course').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection
