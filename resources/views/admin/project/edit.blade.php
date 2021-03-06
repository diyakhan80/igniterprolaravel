
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="edit-project" data-request="enable-enter" action="{{url('admin/project/'.___encrypt($project['id']))}}" method="POST" class="horizontal-form">
				{{csrf_field()}}
				<input type="hidden" value="PUT" name="_method">
				<div class="form-body">
					<h3 class="form-section">Edit Project</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Client</label>
								<select class="form-control" name="client_id">
                                        @if($client)
											@foreach($client as $clients)
	                                            <option  
	                                            @php 
	                                           
	                                            if( $clients['id'] == $project['client_id']){

	                                            	echo 'selected="selected"'; 
	                                        	} 
	                                            @endphp
	                                            value="{{$clients['id']}}"
	                                            >{{$clients['name']}}</option>
	                                        @endforeach
	                                        @else
	                                            <option value="">No client Found</option>
                                        @endif
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Name</label>
								<input type="text" required id="name" name="project_name" class="form-control" value="{{$project['project_name']}}" placeholder="Enter Project Name">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Type</label>
								<input type="text" required id="type" name="project_type" class="form-control" value="{{$project['project_type']}}" placeholder="Enter Project Type">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Price</label>
								<input type="text" required id="price" name="project_price" class="form-control" value="{{$project['project_price']}}"placeholder="Enter Project Price">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Duration</label>
								<input type="text" required id="duration" name="project_duration" class="form-control" value="{{$project['project_duration']}}" placeholder="Enter Project Duration">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Start Date</label>
								<input type="text" required id="start_date" name="project_start_from" class="form-control date" value="{{$project['project_start_from']}}" placeholder="Enter Project Duration">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Initial Payment</label>
								<input type="text" required id="initial_payment" name="recieved_payment" class="form-control" value="{{$project['payment']['recieved_payment']}}" placeholder="Enter Project Initial Payment">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Payment Method</label>
								<select class="form-control" name="payment_method">
									<option value="">Select Payment Method</option>
	                                        <option value="cash" @php if($project['payment']['payment_method']=='cash'){
	                                        	echo 'selected="selected"'; 
	                                    	}
	                                    	@endphp>Cash</option>
	                                        <option value="cheque" @php if($project['payment']['payment_method']=='check'){
	                                        	echo 'selected="selected"'; 
	                                    	}
	                                    	@endphp>Cheque</option>
	                                        <option value="online_transaction" @php if($project['payment']['payment_method']=='online_transaction'){
	                                        	echo 'selected="selected"'; 
	                                    	}
	                                    	@endphp>Online Banking</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project's Next Payment Date</label>
								<input type="text" required id="next_payment" name="next_payment" class="form-control date" value="{{$project['payment']['next_payment']}}" placeholder="Enter Projects next Payment Date">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project's Next Delivery Date</label>
								<input type="text" required id="next_payment" name="next_delivery" class="form-control date" value="{{$project['payment']['next_delivery']}}" placeholder="Enter Projects next Delivery Date">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Agent Name</label>
								<select class="form-control" name="project_agent_id">
									<option value="">Select Project Agent</option>
                                        @if($agent)
											@foreach($agent as $agents)
	                                            <option  
	                                            @php 
	                                           
	                                            if( $agents['id'] == $project['project_agent_id']){

	                                            	echo 'selected="selected"'; 
	                                        	} 
	                                            @endphp
	                                            value="{{$agents['id']}}"
	                                            >{{$agents['name']}}</option>
	                                        @endforeach
	                                        @else
	                                            <option value="">No User Found</option>
                                        @endif
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Agent Commission</label>
								<input type="text" required id="commission" name="agent_commission" class="form-control" value="{{$project['agent_commission']}}" placeholder="Enter Project Duration">
								
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
					<a href="{{url('admin/project')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="edit-project"]' class="btn blue edit_project"><i class="fa fa-check"></i> Save</button>
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
    $('[data-request="enable-enter"]').find('.edit_project').trigger('click');
    return false;    //<---- Add this line
    }
    }); 
    },100);
</script>
@endsection
