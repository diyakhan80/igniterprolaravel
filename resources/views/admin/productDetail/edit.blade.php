<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-productsDetails" data-request="enable-enter" action="{{url('admin/productsdetail/'.___encrypt($productDetails['id']))}}" method="POST" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Edit Product Detail</h3>
					<div class="row">
						{{csrf_field()}}
						<input type="hidden" value="PUT" name="_method">
						<input type="hidden" id="id" name="id" class="form-control" value="{{$productDetails['id']}}">
						<div class="col-md-12">
							<div class="form-group">
								<label>Select Product:</label>
								<select class="form-control" name="product_id" id="product_id">
									<option value="">Select Product</option>
									@foreach($product as $products)
          					<option value="{{!empty($products['id'])?$products['id']:''}}" @if($products['id'] == $productDetails['product_id']) selected @endif >{{!empty($products['name'])?$products['name']:''}}</option>
        					@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">URL:</label>
								<input type="text" id="url" name="url" class="form-control" placeholder="Enter URL" value="{{!empty($productDetails['url'])?$productDetails['url']:''}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Username:</label>
								<input type="text" id="username" name="username" class="form-control" placeholder="Enter Username"value="{{!empty($productDetails['username'])?$productDetails['username']:''}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Password:</label>
								<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password"value="{{!empty($productDetails['password'])?$productDetails['password']:''}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Type:</label>
								<input type="text" id="type" name="type" class="form-control" placeholder="Enter Type"value="{{!empty($productDetails['type'])?$productDetails['type']:''}}">
							</div>
						</div>
			       	</div>
			      </div>
					</div>
				<div class="form-actions right">
					<a href="{{url('admin/productsdetail')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-productsDetails"]' class="btn blue edit_productsdetail"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.edit_productsdetail').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection
