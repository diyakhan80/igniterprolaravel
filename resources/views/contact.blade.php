
<section class="aboutus contactWrapperr white-background black" id="one" style="margin-top: 50px">
       		<div class="container">
            	<div class="row">
	                <div class="col-md-8 col-sm-12 col-xs-12 black">
  	                	<div class="contactus-section">
  	                    <h3 class="title">CONTACT US:</h3>
                        <div class="contactbg">
    	                    <p>You can contact us with your queries, suggestions, feedbacks
    	                    	at following details:
    						          </p> 
                          <div class="email-detailsection">
                             <ul> 
                                <li>Email Us at: <b>info@igniterpro.com</b></li>
                                <li>Call us at: <b>+91-8840086174 , +91-8130295076</b></li>
                              </ul>
                          </div>
                        
                        <div class="office-section">
    	                    <h5 class="title">OFFICE ADDRESS:</h5>
                          <div class="email-detailsection">
                            <ul> 
                                <li>Address: <b>295- Indra Nagar, D- block , Church road, Lucknow (U.P.)</b></li>
                              </ul>
                          </div>
                        </div>
                      </div>
                      <div class="mapsection">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.9548798719716!2d80.99364131490461!3d26.873174583144692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2b036b2be6d%3A0x5060d981f9c8d805!2sPolytechnic+Chauraha%2C+Sector+8%2C+Indira+Nagar%2C+Lucknow%2C+Uttar+Pradesh+226016!5e0!3m2!1sen!2sin!4v1538815134090" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                      </div>
	                </div>
                </div>
	                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="btnregister">
                      <a class="demoregisterbtn" href="{{url('registration')}}">Register for demo classes</a>
                    </div>
	                   <div class="medica-appointment-card medicaAppointment wow fadeInUp" data-wow-delay="0.6s">
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
                            <button type="button" data-request="ajax-submit" name="addEnquiry" value="Submit Enquiry" data-target='[role="add-enquiry"]' class="btn sendenquiry">Send Enquiry</button>
                                                    
                              
                            </div>       
                          
                        </form>        
                    </div>

	                </div>
            	</div>
            </div>
</section>
