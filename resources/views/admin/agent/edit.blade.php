
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-agent" data-request="enable-enter" action="{{url('admin/agent/'.___encrypt($agent['id']))}}" method="POST" class="horizontal-form">
						{{csrf_field()}}
				<input type="hidden" value="PUT" name="_method">
				<div class="form-body">
					<h3 class="form-section">Edit Agent</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" class="form-control" value="{{$agent['id']}}">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Name</label>
								<input type="text" id="name" name="name" class="form-control" value="{{$agent['name']}}" placeholder="Enter Name">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Email</label>
								<input type="text" id="name" name="email" class="form-control" value="{{$agent['email']}}" placeholder="Enter Email">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Mobile Number</label>
								<input type="text" id="name" name="mobile_number" class="form-control" value="{{$agent['mobile_number']}}" placeholder="Enter Mobile Number">
							</div>
						</div>
					</div>
				
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/agent')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-agent"]' class="btn blue edit_agent"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.edit_agent').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection
