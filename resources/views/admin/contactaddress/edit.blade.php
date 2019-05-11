<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-contact" action="{{url('admin/contact/'.___encrypt($contact['id']))}}" method="POST" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Edit Contact Address</h3>
					<div class="row">
						{{csrf_field()}}
						<input type="hidden" id="id" name="id" class="form-control" value="{{$contact['id']}}">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Address</label>
								<input type="text" value="{{$contact['address']}}" id="address" name="address" class="form-control" placeholder="Enter Address">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">E-mail</label>
								<input type="text" value="{{$contact['email']}}" id="email" name="email" class="form-control" placeholder="Enter E-mail">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Phone</label>
								<input type="text" value="{{$contact['phone']}}" id="phone" name="phone" class="form-control" placeholder="Enter Phone">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Whatsapp</label>
								<input type="text" value="{{$contact['whatsapp']}}" id="whatsapp" name="whatsapp" class="form-control" placeholder="Enter Whatsapp">
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/contact')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-contact"]' class="btn blue"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
			<!-- END FORM-->
		</div>		
	</div>
</div>
@section('requirejs')
@endsection
