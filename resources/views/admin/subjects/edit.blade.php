
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-course" action="{{url('admin/subject/'.___encrypt($subject['id']))}}" method="POST" class="horizontal-form">
				<input type="hidden" value="PUT" name="_method">
				<div class="form-body">
					<h3 class="form-section">Edit subject</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Name</label>
								<input type="text" value="{{$subject['name']}}" required id="name" name="name" class="form-control" placeholder="Enter Name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">subject Picture</label>
								<input type="file"  name="subject_picture" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Description</label>
								<textarea required id="name" name="description" class="form-control" placeholder="Enter Description">{{$subject['description']}}</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Select Course</label>
								<select class="form-control" name="course_id">
									@if(!empty($courses))
										@foreach($courses as $course)
											<option value="{{$course['id']}}">{{$course['name']}}</option>
										@endforeach()
									@endif
								</select>
							</div>
						</div>
					</div>
				
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/courses')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-course"]' class="btn blue"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
			<!-- END FORM-->
		</div>		
	</div>
</div>
@section('requirejs')
@endsection
