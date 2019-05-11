<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-agent" action="{{url('admin/agent')}}" data-request="enable-enter" method="POST" class="horizontal-form">
				<div class="form-body">
						{{csrf_field()}}
					<h3 class="form-section">Add Agent</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Name</label>
								<input type="text" required id="name" name="name" class="form-control" placeholder="Enter Name">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Email</label>
								<input type="text" required id="name" name="email" class="form-control" placeholder="Enter Email">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Mobile Number</label>
								<input type="text" required id="name" name="mobile_number" class="form-control" placeholder="Enter Mobile Number">
								
							</div>
						</div>
						<!-- <div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Agent Picture</label>
								<input type="file"  name="agent_picture" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Description</label>
								<textarea required id="name" name="description" class="form-control" placeholder="Enter Description"></textarea>
							</div>
						</div> -->
					</div>
				
				</div>
				<div class="form-actions right">
					<a href="{{url('admin/agent')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-agent"]' class="btn blue add_agent"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.add_agent').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection
