<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-goodworks" data-request="enable-enter" action="{{url('admin/goodworks/'.___encrypt($goodworks['id']))}}" method="POST" class="horizontal-form">
						{{csrf_field()}}
						<input type="hidden" value="PUT" name="_method">
				<div class="form-body">
					<h3 class="form-section">Edit Good Works</h3>
					<div class="row">
						<input type="hidden" name="id" class="form-control" value="{{$goodworks['id']}}">
								<div class="col-md-12">
									<div class="form-group">
					          <label for="image">Image:</label>
					          <div>
					              <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
					          </div>
					          <div>
					            <img style="max-width: 250px;" src="{{url('images/GoodWorks')}}/{{$goodworks['image']}}" id="adminimg" alt="No Featured Image Added">
					          </div>
					        </div>
					      </div>
								<div class="form-group">
									<label class="control-label required">Title</label>
									<input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" value="{{!empty($goodworks['title'])?$goodworks['title']:''}}">
								</div>
								<div class="form-group">
									<label class="control-label required">Description</label>
									<textarea id="description" name="description" rows="6" cols="80">{{$goodworks['description']}}</textarea>
								</div>
			       	</div>
			      </div>
				<div class="form-actions right">
					<a href="{{url('admin/goodworks')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-goodworks"]' class="btn blue add_goodworks"><i class="fa fa-check"></i> Save</button>
				</div>
					</div>
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
    $('[data-request="enable-enter"]').find('.add_goodworks').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);

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
