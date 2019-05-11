<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form role="project-payment" action="{{url('admin/project/payment/'.___encrypt($projectPayment['id']))}}" method="POST" class="horizontal-form">
				<div class="form-body">
						{{csrf_field()}}
						<input type="hidden" name="balance" value="{{$projectPayment['payment']['balance']}}">
						<input type="hidden" name="id" value="{{$projectPayment['id']}}">
					<h3 class="form-section">Projects Payment</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Name</label>
								<input class="form-control" type="text" name="project_name" value="{{$projectPayment['project_name']}}" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Project Payment</label>
								<input type="text" id="initial_payment" name="recieved_payment" class="form-control" placeholder="Enter Project Payment">
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
								<input type="text" required id="next_delivery" name="next_delivery" class="form-control date" placeholder="Enter Projects next Delivery Date">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Agent Commission</label>
								<input type="text" required id="agent_commission" name="agent_commission" class="form-control" placeholder="Enter Agent Commission">
							</div>
						</div>
						<!-- <div class="col-md-12">
							<div class="form-group">
								<label class="control-label required">Status</label>
								<select class="form-control" name="status">
									<option value="">Select Status</option>
                  <option value="pending">Pending</option>
                  <option value="paid">Paid</option>
								</select>
							</div>
						</div> -->
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

