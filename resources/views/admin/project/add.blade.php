<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="add-project" data-request="enable-enter" action="{{url('admin/project')}}" method="POST" class="horizontal-form">
				<div class="form-body">
						{{csrf_field()}}
					<h3 class="form-section">Add Project</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Clients</label>
								<select class="form-control" name="client_id">
									<option value="">Select Client</option>
									@foreach($clients as $client)
	                                        <option value="{{$client['id']}}">{{$client['name']}}</option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Name</label>
								<input type="text" required id="name" name="project_name" class="form-control" placeholder="Enter Project Name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Type</label>
								<input type="text" required id="type" name="project_type" class="form-control" placeholder="Enter Project Type">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Price</label>
								<input type="text" required id="price" name="project_price" class="form-control" placeholder="Enter Project Price">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Duration</label>
								<input type="text" required id="duration" name="project_duration" class="form-control" placeholder="Enter Project Duration">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Start Date</label>
								<input type="text" required id="start_date" name="project_start_from" class="form-control date" placeholder="Enter Project Duration">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Initial Payment</label>
								<input type="text" required id="initial_payment" name="recieved_payment" class="form-control" placeholder="Enter Project Initial Payment">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Payment Method</label>
								<select class="form-control" name="payment_method">
									<option value="">Select Project Payment Method</option>
	                                        <option value="cash">Cash</option>
	                                        <option value="cheque">Cheque</option>
	                                        <option value="online_transaction">Online Banking</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project's Next Payment Date</label>
								<input type="text" required id="next_payment" name="next_payment" class="form-control date" placeholder="Enter Projects next Payment Date">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project's Next Delivery Date</label>
								<input type="text" required id="next_payment" name="next_delivery" class="form-control date" placeholder="Enter Projects next Delivery Date">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Agent Name</label>
								<select class="form-control" name="project_agent_id">
									<option value="">Select Project Agent</option>
									@foreach($agent as $agents)
	                                        <option value="{{$agents['id']}}">{{$agents['name']}}</option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Agent's Commission</label>
								<input type="text" required id="commission" name="agent_commission" class="form-control" placeholder="Enter Agent Commission">
								
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
				<div id="container"></div>

				</div>
				<div class="form-actions right">
					<a href="{{url('admin/project')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="add-project"]' class="btn blue add_project"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.add_project').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection

