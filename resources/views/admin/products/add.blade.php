<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-products" action="{{url('admin/products')}}" data-request="enable-enter" method="POST" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Add Product</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Product Name</label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Enter Product Name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Slug</label>
								<input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Product Slug">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
				        <label for="image">Product Image:</label>
				        <div>
				            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
				        </div>
				        <div>
				            <img style="max-width: 250px;" src="{{asset('images/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
				        </div>
			       	</div>
			      </div>
					</div>
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/products')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-products"]' class="btn blue add_products"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.add_products').trigger('click');
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
</script>
@endsection
