<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-topics" action="{{url(sprintf('admin/topics/%s',___encrypt($id)))}}" method="POST" class="horizontal-form">
				<input type="hidden" name="_method" value="PUT">
				<div class="form-body">

					<h3 class="form-section">Edit Topic</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Topic Heading</label>
								<input type="text" required id="name" name="heading" value="{{$topic['heading']}}" class="form-control" placeholder="Enter Heading">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Topic Picture</label>
								<input type="file" value="{{$topic['topic_picture']}}"  name="topic_picture" class="form-control">
								<img src="{{url('uploads/topic/'.$topic['topic_picture'])}}" alt="" height="100px" width="100px">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Content</label>
								<textarea  row="10" name="content" class="form-control" placeholder="Enter Content">{{$topic['content']}}</textarea>
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
						<div class="col-md-12" id="subject">
							<div class="form-group">
								<label class="control-label required">Select Subject</label>
								<select class="form-control subject" name="subject_id" id="subject">
									
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Slug</label>
								<input type="text"  name="slug" value="{{$topic['slug']}}"  class="form-control">
							</div>
						</div>
				<div class="form-actions right">
					<a href="{{url('admin/topics')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-topics"]' class="btn blue"><i class="fa fa-check"></i> Save</button>
				</div>

			</form>
			<!-- END FORM-->
		</div>		
	</div>
</div>
@section('requirejs')
<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

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

		$('#course').on('change', function(){
        var course_id = $(this).val();
        $('.subject').select2({
               formatLoadMore   : function() {return 'Loading more...'},
               placeholder : "Select Subject",
               allowClear : true,
               ajax: {
                   url: "{{ url('admin/topics/subjectlist') }}",
                   dataType: 'json',
                   data: function (params) {
                       var query = {
                           search: params.term,
                           type: 'public',
                           course_id: course_id
                       }
                       return query;
                   }
               }
           }).parent('.customSelect').addClass('select2Init');

    var $subjectid = {!! str_replace("'", "\'", json_encode($subject['id'])) !!};
    var $subjectname = {!! str_replace("'", "\'", json_encode($subject['name'])) !!};
    
	var $subjectoption = $("<option selected></option>").val($subjectid).text($subjectname);

	$('.subject').append($subjectoption).trigger('change');


    });
    $('#course').on('change', function(){
        $('.subject').on('change', function(){
            var data = JSON.stringify($('.subject').select2('data'));
            var stringify = JSON.parse(data);
            for (var i = 0; i < stringify.length; i++) {
                $("#reqname").val(stringify[i]['text']);
            }
            
        });
    });
    var $courseid = {!! str_replace("'", "\'", json_encode($course['id'])) !!};
    var $coursename = {!! str_replace("'", "\'", json_encode($course['name'])) !!};
    
	var $courseoption = $("<option selected></option>").val($courseid).text($coursename);

	$('#course').append($courseoption).trigger('change');
	
	



    </script>
@endsection
