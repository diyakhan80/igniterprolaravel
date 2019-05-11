
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-products" data-request="enable-enter" action="{{url('admin/products/'.___encrypt($products['id']))}}" method="POST" class="horizontal-form">
						{{csrf_field()}}
				<input type="hidden" value="PUT" name="_method">
				<div class="form-body">
					<h3 class="form-section">Edit Product</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" class="form-control" value="{{$products['id']}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
			          <label for="image">Product Image:</label>
			          <div>
			              <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
			          </div>
			          <div>
			            <img style="max-width: 250px;" src="{{url('images/Products')}}/{{$products['image']}}" id="adminimg" alt="No Featured Image Added">
			          </div>
			        </div>
			      </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Product Name</label>
								<input type="text" id="name" name="name" class="form-control" value="{{$products['name']}}" placeholder="Enter product Name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Slug</label>
								<input type="text" id="slug" name="slug" class="form-control" value="{{$products['slug']}}" placeholder="Enter Slug">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">URL</label>
								<input type="text" id="url" name="url" class="form-control" placeholder="Enter URL" value="{{$products['url']}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Type</label>
								<select class="form-control" name="type">
									<option value="">Select Type</option>
									<option <?php if($products['type'] == 'portfolio'){echo("selected");}?>>Portfolio</option>
                	<option <?php if($products['type'] == 'product'){echo("selected");}?>>Product</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/products')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-products"]' class="btn blue edit_product"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.edit_product').trigger('click');
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
@endsection
