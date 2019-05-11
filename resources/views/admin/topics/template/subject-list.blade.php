<div class="col-md-12">
	<div class="form-group">
		<label class="control-label required">Select Subject</label>
		<select class="form-control" name="course_id">
			@if(!empty($subjects))
				@foreach($subjects as $subject)
					<option value="{{$subject['id']}}">{{$subject['name']}}</option>
				@endforeach()
			@endif
		</select>
	</div>
</div>