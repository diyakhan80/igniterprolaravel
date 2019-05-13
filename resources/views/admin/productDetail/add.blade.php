<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-productdetail" action="{{url('admin/productsdetail')}}" data-request="enable-enter" method="POST" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Add Product Detail</h3>
					<div class="row">
						{{csrf_field()}}
						<div class="col-md-12">
							<div class="form-group">
								<label>Select Product:</label>
								<select class="form-control" name="product_id" id="product_id">
									<option value="">Select Product</option>
									@foreach($product as $products)
                  	<option value="{{!empty($products['id'])?$products['id']:''}}">{{!empty($products['name'])?$products['name']:''}}</option>
                	@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">URL:</label>
								<input type="text" id="url" name="url" class="form-control" placeholder="Enter URL">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Username:</label>
								<input type="text" id="username" name="username" class="form-control" placeholder="Enter Username">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Password:</label>
								<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Type:</label>
								<input type="text" id="type" name="type" class="form-control" placeholder="Enter Type">
							</div>
						</div>
			       	</div>
			      </div>
					</div>
				<div class="form-actions right">
					<a href="{{url('admin/productsdetail')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-productdetail"]' class="btn blue add_productsdetail"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.add_productsdetail').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection
