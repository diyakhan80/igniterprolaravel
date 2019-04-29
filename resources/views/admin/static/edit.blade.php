<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-static" action="{{url('admin/static/'.___encrypt($static['id']))}}" method="POST" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Edit Static Pages</h3>
					<div class="row">
						{{csrf_field()}}
						<input type="hidden" id="id" name="id" class="form-control" value="{{$static['id']}}">
						<div class="col-md-12">
							<div class="form-group">
			          <label for="image">Static Image:</label>
			          <div>
			              <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
			          </div>
			          <div>
			            <img style="max-width: 250px;" src="{{url('images/staticpage')}}/{{$static['image']}}" id="adminimg" alt="No Featured Image Added">
			          </div>
			        </div>
			      </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Title:</label>
								<input type="text" value="{{$static['title']}}" id="title" name="title" class="form-control" placeholder="Enter Title">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Slug</label>
								<input type="text" value="{{$static['slug']}}" id="slug" name="slug" class="form-control" placeholder="Enter Slug">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Description</label>
								<textarea id="description" name="description" rows="6" cols="80">{{$static['description']}}</textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/static')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-static"]' class="btn blue"><i class="fa fa-check"></i> Save</button>
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

	CKEDITOR.replace("description");
</script>
@endsection
