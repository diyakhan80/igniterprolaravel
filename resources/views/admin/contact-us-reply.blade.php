<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="contact-reply" data-request="enable-enter" action="{{url('admin/contact-us')}}" method="POST" class="horizontal-form">
				<div class="form-body">
						{{csrf_field()}}
					<h3 class="form-section">Contact-Us Reply</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Email</label>
								<input type="text" id="email" name="email" value="{{$enquiry['email']}}" class="form-control" placeholder="Enter E-mail" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Phone</label>
								<input type="text" id="phone" name="phone" value="{{$enquiry['phone']}}" class="form-control" placeholder="Enter Phone Number" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Course</label>
								<input type="text" required id="course" name="course_id" class="form-control" value="{{$enquiry['courses']['course_name']}}" placeholder="Enter Course" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Location</label>
								<input type="text" value="{{$enquiry['location']}}" required id="location" name="location" class="form-control" placeholder="Enter Location" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Comment</label>
								<textarea required id="comment" name="comment" class="form-control" placeholder="Enter Comment"></textarea>
							</div>
						</div>
					</div>
				<div class="form-actions right">
					<a href="{{url('admin/contact-us')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="contact-reply"]' class="btn blue contact_reply"><i class="fa fa-check"></i> Send </button>
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
    $('[data-request="enable-enter"]').find('.contact_reply').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection

