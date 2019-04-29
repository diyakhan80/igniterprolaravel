<section class="aboutus white-background black" id="one" style="margin-top: 80px">
		<div class="container">
    	<div class="row">
            <div class="col-md-8">
                <div class="medica-appointment-card wow fadeInUp" data-wow-delay="0.6s" >
                    <h5>REGISTRATION</h5>
                   <form role="add-registration" action="{{url('register')}}" method="POST" >
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Name<span class="error">* </span></label><input type="text" class="form-control text-white" name="register_name" id="name" placeholder="Name" required >
                        </div>
                        <div class="form-group">
                            <label>Phone<span class="error">* </span></label><input type="text" class="form-control" name="register_phone" id="phone" placeholder="Phone" required >
                        </div>
                        <div class="form-group">
                            <label>Email<span class="error">* </span></label><input type="email" class="form-control" name="register_email" id="email" placeholder="E-mail" required >
                        </div>
                        <div class="form-group">
                         <label>Course<span class="error">*</span></label>
                         <select class="form-control drop-down  requirementname" name="register_course" required style="color:black;">
                            <option value="">Courses</option>
                            <option value="php">PHP</option>
                            <option value="java">Java</option>
                            <option value="android">Android</option>
                            <option value="python">Python</option>
                            <option value="ios" >iOS</option>
                            <option value="wordpress" >WordPress</option>
                            </select>
                            
                    	</div>
                         <div class="form-group">
                         	 <label>Location <span class="error">* </span></label>
                            <input type="text" class="form-control" name="register_location" id="location" placeholder="Location" required >
                        </div>        
                        <button type="button" data-request="ajax-submit" name="addRegistration" value="Submit Registration" data-target='[role="add-registration"]' class="btn btn-primary">Save</button>
                      
                    </form>
                </div>

            </div>
            <div class="col-md-4">
           
                <div class="medica-appointment-card wow fadeInUp" data-wow-delay="0.6s" style="margin-top:40px">
					<h5>Make An Enquiry</h5>
 					<form role="add-enquiry" action="{{url('enquirysubmission')}}" method="POST" >
                        {{csrf_field()}}
                        <div class="form-group">
                          <label>Name<span class="error">* </span></label>
                            <input type="text" class="form-control text-white" name="name" id="name" placeholder="Name" required >
                        </div>
                        <div class="form-group">
                          <label>Phone<span class="error">* </span></label>
                            <input  data-request="isnumeric" maxlength="10" type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required >
                        </div>
                        <div class="form-group">
                          <label>Email<span class="error">* </span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required >
                        </div>
                        <div class="form-group">
                          <label>Courses<span class="error">* </span></label>
                             <select class="form-control drop-down  requirementname" name="course" required style="color:black;">
                                <option value="">Courses</option>
                                <option value="php">PHP</option>
                                <option value="java">Java</option>
                                <option value="android">Android</option>
                                <option  value="python">Python</option>
                                <option  value="ios" >iOS</option>
                                <option value="wordpress" >WordPress</option>
                                </select>
                               
                        </div>
                         <div class="form-group">
                          <label>Location<span class="error">* </span></label>
                            <input type="text" class="form-control" name="location" id="location" placeholder="Location" required>
                        </div>
                         <div class="form-group">
                          <label>Comments<span class="error">* </span></label>
                            <input type="comments" class="form-control" name="comments" id="comments" placeholder="Comments" required >
                        </div>  
                        <div class="submitBtnDiv">
                        <button type="button" data-request="ajax-submit" name="addEnquiry" value="Submit Enquiry" data-target='[role="add-enquiry"]' class="btn btn-primary">Save</button>
                                                
                          
                        </div>       
                      
                    </form>   
				</div>

        	</div>
    	</div>
    </div>
</section>
