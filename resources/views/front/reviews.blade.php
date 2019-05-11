
	<section class="aboutus contactWrapperr white-background black" id="one" style="color:white;margin-top: 0px">
	@if(!empty($reviews))
	    <div class="container">
         	<div class="row">
             	<div class="col-md-12 text-center black">
                 	<h3 class="title">REVIEWS SUBMITTED TO <span class="themecolor">US</span></h3>
            		<p class="a-slog text-center">These are some reviews submitted to us by the clients and students.</p> 
             	</div>
        	</div>
	        <div class="row about-box section-gap" style="margin-bottom: 0;">
	         	 
		      @foreach($reviews as $key => $value)
		        <div class="col-md-6" style="margin-top:10px">
		        	<hr>
		            <div class="igniter-review">
                        <div class="left-review">
                            <img src="images/default-profile.png" alt="user" height="80px">
        		            <h4 style="color:black;text-align:center;">{{$value['name']}}</h4>
                        </div>
    		            <div class="right-review">   
    	   	                <p class="black text-left">@php !empty($value['comments'])? ($comment = $value['comments']) : ($comment = "N:A") ; @endphp"{{$comment}}"</p>
    	   	                
    		                <div class="star">
    		                	@php for($i = $value['rating'];$i>0;$i--) { @endphp
    						      <img style="width:15px;height:15px" src="{{asset('images/fillstar.jpg')}}">
    						    @php } 
    						       for($i = (5-$value['rating']);$i>0;$i--){ @endphp	
    						    <img style="width:15px;height:15px" src="{{asset('images/emptystar.png')}}">
    						    @php } @endphp
    						</div>
                        </div>
		            </div> <!-- / margin -->
		        </div> <!-- /col -->

	         	@endforeach
	        </div> <!-- /row -->
	         
	         
	         
	         
	    </div>
    

    @else
     	<div class="row">
            <div class="col-md-12 text-center black">
                <h3 class="title">NO Reviews submitted!!!</h3>
            	<p class="a-slog">Please Add some review to help us improve.</p> 
            </div>
        </div>
    @endif
</section>
<section class="aboutus contactWrapperr white-background black">
	<div class="container">
    	<div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12 black">
            	
             
                <h3 class="title">REVIEWS</span></h3>
                
                <p class="a-slog">You can submit your reviews here!!!.
				</p>
                <div class="medica-appointment-card wow fadeInUp" data-wow-delay="0.6s">
                    <h5 class="submitReview">Submit Reviews</h5>
                    <form role="add-review" action="{{url('reviewsubmission')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                        	<label>Name<span class="error">* </span></label>
                            <input type="text" class="form-control text-white" name="review_name" id="name" placeholder="Name"  required>
                        </div>
                        <div class="form-group">
                        	<label>Phone</label>
                            <input type="text" class="form-control" data-request="isnumeric" name="review_phone" id="phone" placeholder="Phone" >
                        </div>
                        <div class="form-group">
                        	<label>Email<span class="error">* </span></label>
                            <input type="email" class="form-control" name="review_email" id="email" placeholder="E-mail" required >
                        </div>
						<div class="rating form-group">
							<label class="ratingclass">Choose Rating:<span class="error">* </span></label>
						    <span><input type="radio"  name="rating" id="str5" value="5" required><label for="str5">☆</label></span>
						    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4">☆</label></span>
						    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3">☆</label></span>
						    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2">☆</label></span>
						    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1">☆</label></span>
						    
						</div>
						<input type="hidden" name="rate" class="rate">
                         <div class="form-group">
                         	<label>Comments<span class="error">* </span></label>
                            <input type="comments" class="form-control" name="review_comments" id="comments" placeholder="Comments" >
                     
                        </div>  
                        <div class="submitBtnDiv">
                        	
                        <button type="button" data-request="ajax-submit" name="addReview" value="Submit Review" data-target='[role="add-review"]' class="btn btn-primary">Save</button>
                                        
                        </div>      
                      
                    </form>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 pt-btn">
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
                              <label>Phone<span class="error">* </span></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                              <label>Email<span class="error">* </span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                              <label>Courses<span class="error">* </span></label>
                                 <select class="form-control drop-down  requirementname" name="course_id" style="color:black;">
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
                            <button type="button" data-request="ajax-submit" name="addEnquiry" value="Submit Enquiry" data-target='[role="add-enquiry"]' class="btn btn-primary">Save</button>
                            </div>       
                        </form>      
                </div>
            </div>
    	</div>
	</div>
</section>

