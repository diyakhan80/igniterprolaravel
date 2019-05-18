
		<section class="aboutus white-background black" id="one" style="color:white;margin-top: 30px">
       		<div class="container">
            	<div class="row">
                <div class="col-md-12">
                  <h3 class="title">WE BELIEVE IN <span class="themecolor">ENTHUSIASTIC & PASSIONATE PEOPLE</span></h3>
                  <p style="font-family:Brush Script MT; font-size:25px;">Softpro hires Technocrats and Industry Experts who have expertise in handling Complex Business Challenges to deliver Best Solutions</p>
                </div>
	                <div class="col-md-8 col-sm-8 col-xs-12">
	                    <div class="medica-appointment-card wow fadeInUp" data-wow-delay="0.6s" >
	                        <h5 style="color:black; margin-bottom:45px">APPLY FOR JOBS</h5>
	                         <form role="add-career" action="{{url('careersubmission')}}" method="POST" >
                            {{csrf_field()}}
	                            {{-- <div class="form-group">
	                            	<label>Name<span class="error" >*</span></label>
	                                <input type="text" class="form-control text-white name-class" name="career_name" id="name" placeholder="Name" required >
                              </div>  --}}
                              <div class="group-career ">      
                                <input type="text" name="career_name" id="name" required class="career-input" autocomplete="off">
                                <span class="highlight-career"></span>
                                <span class="career-bar"></span>
                                <label class="career-label">Name</label>
                              </div>
                                
                              <div class="group-career ">      
                                <input type="text-career" name="career_email" id="career_email" class="career-input"  required>
                                <span class="highlight-career"></span>
                                <span class="career-bar"></span>
                                <label class="career-label">Email</label>
                              </div>
	                            {{-- <div class="form-group">
	                            	<label>Email<span class="error">* </span></label>
	                                <input type="email" class="form-control" name="career_email" id="career_email" placeholder="E-mail" required >
	                            </div> --}}
	                           
	                            <div class="form-group">
	                            	<label>Position <span class="error">* </span></label>
	                                <select class="form-control drop-down" name="career_position" required style="color:black;">
	                                    <option value="">Job Position</option>
	                                    <option value="php">PHP Developer</option>
	                                    <option  value="java">Java Developer</option>
	                                    <option value="android">Android Developer</option>
	                                    <option value="python" >Python Developer</option>
	                                    <option  value="ios" >iOS Developer</option>
	                                    <option  value="wordpress" >WordPress Developer</option>
	                                </select>
                                    
                            	</div>


	                            <div class="form-group">
	                                <input type="file" name="resume" id="resume" placeholder="Upload Resume" required ><span class="error">* </span>
	                            </div> 
	                            <div class="submitBtnDiv">
	                              <button type="button" data-request="ajax-submit" name="addCareer" value="Apply" data-target='[role="add-career"]' class="btn btn-primary">Save</button>
	                            	
	                            </div>       
	                          
	                        </form>
	                    </div>

	                </div>
	                <div class="col-md-4 col-sm-4 col-xs-12">
                   
                     <div class="medica-appointment-card wow fadeInUp" data-wow-delay="0.6s">
                        <h5 style="color:black; margin-bottom:45px;">Make An Enquiry</h5>
                      <form role="add-enquiry" action="{{url('enquirysubmission')}}" method="POST" >
                            {{csrf_field()}}
                            {{-- <div class="form-group">
                              <label>Name<span class="error">* </span></label>
                                <input type="text" class="form-control text-white" name="name" id="name" placeholder="Name" required >
                            </div> --}}
                            <div class="group-career ">      
                              <input type="text-career" name="name" id="name"  required class="career-input">
                              <span class="highlight-career"></span>
                              <span class="career-bar"></span>
                              <label class="career-label">Name</label>
                            </div>
                            {{-- <div class="form-group">
                              <label>Phone<span class="error">* </span></label>
                                <input  data-request="isnumeric" maxlength="10" type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required >
                            </div> --}}
                            <div class="group-career ">      
                              <input type="text-career"  required class="career-input"  data-request="isnumeric" maxlength="10" type="text" name="phone" id="phone">
                              <span class="highlight-career"></span>
                              <span class="career-bar"></span>
                              <label class="career-label">Phone</label>
                            </div>
                            {{-- <div class="form-group">
                              <label>Email<span class="error">* </span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required > 
                            </div> --}}
                            <div class="group-career ">      
                              <input type="email"  required class="career-input" name="email" id="email">
                              <span class="highlight-career"></span>
                              <span class="career-bar"></span>
                              <label class="career-label">e-mail</label>
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
                             {{-- <div class="form-group">
                              <label>Location<span class="error">* </span></label>
                                <input type="text" class="form-control" name="location" id="location" placeholder="Location" required>
                            </div> --}}
                            <div class="group-career ">      
                              <input type="text"  required class="career-input" name="location" id="location">
                              <span class="highlight-career"></span>
                              <span class="career-bar"></span>
                              <label class="career-label">Location</label>
                            </div>
                             {{-- <div class="form-group">
                              <label>Comments<span class="error">* </span></label>
                                <input type="comments" class="form-control" name="comments" id="comments" placeholder="Comments" required>
                            </div>   --}}
                            <div class="group-career ">      
                              <input type="comments"  required class="career-input"  name="comments" id="comments" >
                              <span class="highlight-career"></span>
                              <span class="career-bar"></span>
                              <label class="career-label">Comments</label>
                            </div>
                            <div class="submitBtnDiv">
                            <button type="button" data-request="ajax-submit" name="addEnquiry" value="Submit Enquiry" data-target='[role="add-enquiry"]' class="btn btn-primary">Save</button>
                                                    
                              
                            </div>       
                          
                        </form>   
                    </div>

                </div>
                <form>
    
                  {{-- <div class="group-new">      
                    <input type="text-new" required>
                    <span class="highlight-new"></span>
                    <span class="bar-new"></span>
                    <label>Name</label>
                  </div>
                    
                  <div class="group-new">      
                    <input type="text-new" required>
                    <span class="highlight-new"></span>
                    <span class="bar-new"></span>
                    <label>Email</label>
                  </div> --}}
                  
                </form>
            	</div>
            </div>

           
		</section>
