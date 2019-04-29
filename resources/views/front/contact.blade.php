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
                        <li>Email Us at: <b>{{$contact[0]['email']}}</b></li>
                        <li>Call us at: <b>+91-{{$contact[0]['phone']}},+91-{{$contact[1]['phone']}}</b></li>
                      </ul>
                  </div>
                
                <div class="office-section">
                  <h5 class="title">OFFICE ADDRESS:</h5>
                  <div class="email-detailsection">
                    <ul> 
                        <li>Address: <b>{{$contact[0]['address']}}</b></li>
                      </ul>
                  </div>
                </div>
              </div>
              <div class="mapsection">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3345.4913678080866!2d81.01918631488186!3d26.85528298315246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2f0348b3347%3A0x513c8138a275f155!2s3%2F5%2C+Vastu+Khand+Road%2C+Virat+Khand+3%2C+Gomti+Nagar%2C+Lucknow%2C+Uttar+Pradesh+226010!5e1!3m2!1sen!2sin!4v1556518773562!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                    <input type="text" class="form-control text-white" name="name" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label>Phone<span class="error">*</span></label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                  <label>Email<span class="error">* </span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <label>Courses<span class="error">* </span></label>
                    <select class="form-control drop-down requirementname" name="course_id" style="color:black;">
                      <option value="">Courses</option>
                      @foreach($courses as $course)
                        <option value="{{!empty($course['id'])?$course['id']:''}}">{{!empty($course['course_name'])?$course['course_name']:''}}</option>
                      @endforeach
                    </select>
                </div>
                 <div class="form-group">
                  <label>Location<span class="error">* </span></label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                </div>
                 <div class="form-group">
                  <label>Comments<span class="error">* </span></label>
                    <input type="comments" class="form-control" name="comments" id="comments" placeholder="Comments">
                </div>  
                <div class="submitBtnDiv">
                <button type="button" data-request="ajax-submit" data-target='[role="add-enquiry"]' class="btn sendenquiry">Send Enquiry</button>
                </div>
              </form>        
            </div>
          </div>
    	</div>
  </div>
</section>
