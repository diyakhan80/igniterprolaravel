<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="project-payment" action="{{url('admin/project-payment')}}" method="POST" class="horizontal-form">
				<div class="form-body">
						{{csrf_field()}}
					<h3 class="form-section">Projects Payment</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">All Project's</label>
								<select class="form-control" name="id">
									@if($project)
											@foreach($project as $projects)
	                                            <option  
	                                            @php 
	                                           
	                                            if( $projects['id']){

	                                            	echo 'selected="selected"'; 
	                                        	} 
	                                            @endphp
	                                            value="{{$projects['id']}}"
	                                            >{{$projects['project_name']}}</option>
	                                        @endforeach
	                                        @else
	                                            <option value="">No Project Found</option>
                                        @endif
								</select>
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
								<label class="control-label required">Agent's Commission</label>
								<input type="text" required id="commission" name="agent_commission" class="form-control" placeholder="Enter Project Duration">
								
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
					<a href="{{url('admin/project-payment')}}" class="btn default">Cancel</a>
					<button type="button" data-request="ajax-submit" data-target='[role="project-payment"]' class="btn blue"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
			<!-- END FORM-->
		</div>		
	</div>
</div>
@section('requirejs')
@endsection

