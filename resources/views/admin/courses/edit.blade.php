
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-course" action="{{url('admin/courses/'.___encrypt($course['id']))}}" data-request="enable-enter" method="POST" class="horizontal-form">
				<input type="hidden" value="PUT" name="_method">
				<div class="form-body">
					<h3 class="form-section">Edit Course</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Name</label>
								<input type="text" value="{{$course['course_name']}}" required id="name" name="course_name" class="form-control" placeholder="Enter Course Name">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Course Picture</label>
								<img style="max-width: 250px;" src="{{url('uploads/course')}}/{{$course['course_picture']}}" id="adminimg" alt="No Featured Image Added">
								<div class="col-md-3 col-sm-6 col-xs-12">
                                    <input onchange="readURL(this)" id="uploadFile" name="course_picture" type="file">
                                    {{--<div id="uploadTrigger" onclick="uploadclick()" style="white-space: normal;" class="form-control btn btn-default"><i class="fa fa-upload"></i> Add Featured Image</div>--}}
                                </div>
								<!-- <input type="file" src="{{$course['course_picture']}}" name="course_picture" class="form-control"> -->
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Description</label>
								<textarea required id="name" name="description" class="form-control" placeholder="Enter Description">{{$course['description']}}</textarea>
							</div>
						</div>
					</div>
				
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/courses')}}" class="btn default">Cancel</a>
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
