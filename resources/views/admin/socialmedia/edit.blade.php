<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-social" action="{{url('admin/social/'.___encrypt($social['id']))}}" method="POST" class="horizontal-form">
				<div class="form-body">
					<h3 class="form-section">Edit Social Media</h3>
					<div class="row">
						{{csrf_field()}}
						<input type="hidden" id="id" name="id" class="form-control" value="{{$social['id']}}">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">URL</label>
								<input type="text" value="{{$social['url']}}" id="url" name="url" class="form-control" placeholder="Enter URL">
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/social')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-social"]' class="btn blue"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
			<!-- END FORM-->
		</div>		
	</div>
</div>
@section('requirejs')
@endsection
