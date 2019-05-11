<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-batch" action="{{url('admin/batches')}}" method="POST" class="horizontal-form">
				<div class="form-body">

					<h3 class="form-section">Add Batch</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Date</label>
								<input type="text" class="form-control textField date" id="date" placeholder="Enter Date" name="date">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Start Timing</label>
								<input type="text" class="form-control textField clockpicker" id="time" placeholder="Enter time" name="start_time">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Duration</label>
								<input type="text"  name="duration" placeholder="Enter Duration" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Select Course</label>
								<select class="form-control course" id="course" name="course_id" >
									<!-- @if(!empty($courses))
										@foreach($courses as $course)
											<option value="{{$course['id']}}">{{$course['name']}}</option>
										@endforeach()
									@endif -->
								</select>
							</div>
						</div>
						
				<div class="form-actions right">
					<a href="{{url('admin/batches')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-batch"]' class="btn blue"><i class="fa fa-check"></i> Save</button>
				</div>

			</form>
			<!-- END FORM-->
		</div>		
	</div>
</div>
@section('requirejs')
<script type="text/javascript">
   

	$('.course').select2({
           formatLoadMore   : function() {return 'Loading more...'},
           placeholder : "Select Course",
           allowClear : true,
           ajax: {
               url: "{{ url('admin/topics/course-list') }}",
               dataType: 'json',
               data: function (params) {
                   var query = {
                       search: params.term,
                       type: 'public',
                   }
                   return query;
               }
           }
       }).parent('.customSelect').addClass('select2Init');

   
    </script>
@endsection
