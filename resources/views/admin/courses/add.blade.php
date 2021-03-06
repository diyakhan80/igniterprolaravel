
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-course" action="{{url('admin/courses')}}" data-request="enable-enter" method="POST" class="horizontal-form">
				<div class="form-body">

					<h3 class="form-section">Add Course</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Name</label>
								<input type="text" required id="name" name="course_name" class="form-control" placeholder="Enter Course Name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Course Picture</label>
								<input type="file"  name="course_picture" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Description</label>
								<textarea required id="name" name="description" class="form-control" placeholder="Enter Description"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/courses')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-course"]' class="btn blue add_course"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.add_course').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection
