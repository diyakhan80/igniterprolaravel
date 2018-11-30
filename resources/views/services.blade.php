<section class="aboutus white-background black" id="one" style="margin-top: 80px">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 black">
                
                
                @if($service=='training')
                  
                <div class="contactus-section">
                    <h3 class="title">TRAINING</h3>
                    <p>IgniterPro at Lucknow,UP offers personalized training to the students desiring to work in the corporate world and emerge as a software technologies expert in the Development field. We are providing corporate training to many Global and Local conglomerates.
                    </p> 
                    
                </div>
                <div class="contactus-section">
                    <h3 class="title">Advantages of receiving training from us:</h3>
                    
                </div>
                <ul style="list-style-type:disc"> 

                    <li>Customized syllabus based on the requirements provided by the company and corresponding study materials developed by our experts.</li>
                    <li>Certified Professionals/Experts in that specific domain who also have vast teaching experience and excellent soft skills will be sent as Trainers.</li>
                    <li>Comprehensive training including both theoretical and practical sessions will be provided in the least possible time without compromising the quality.</li>
                    <li>Reliable and rigorous tests at the end of training to evaluate the skills of every candidate and suggest future actions needed.</li>
                    <li>Pre and post assessment sessions to calculate the improvement of each candidate and other significant traits such as involvement and efficiency.</li>
                    <li>Android - Hello World Example</li>
                   
                </ul>
                @endif
                <!--PHP -->
                @if($service=='development')
                
                <div class="contactus-section">
                    <h3 class="title">Software Development</h3>
                    <p>With the increasing demands and rapid advancement in technology, it has become an urging need to develop softwares and applications. All business institutions are in need of a software to increase their awareness among people. The demand for result oriented software solution has gone substantially higher. People require dedicated and pinpoint working software inclusions for managing their business.
                    IgniterPro is a  web-based software provider that can  meet the requirements of businesses for managing  their operations at different levels.
                    </p> 
                    
                </div>
                <div class="contactus-section">
                    <h3 class="title">
                    Features of Web Based Software Applications that we provide:</h3>
                    
                </div>
                <ul style="list-style-type:disc"> 

                    <li>User-friendly</li>
                    <li>Bug free</li>
                    <li>Compatible on all platforms</li>
                    <li>Highly secured</li>
                    <li>Easily maintainable</li>
                    <li>Easily upgradeable</li>
                    <li>Several modules that are independent of each other</li>
                    <li>Provision of text-based searching</li>
                    <li>Facility of Payment & SMS Gateway integration</li>
                </ul>
                <!--JAVA -->
                @endif

                @if($service=='mobile_development')                
                <div class="contactus-section">
                    <h3 class="title">Mobile Development</h3>
                    <p style="float:left">With the growing advancement in the field of mobile communication technology and increasing popularity of smart phones, having a mobile application has become a crucial requirement for all kinds of businesses and organizations for making their services available to customers efficiently. We are a skilled team of mobile application development professionals is proficient in offering variety of mobile applications that are efficient enough to meet the changing market needs and industry requirement effectively.</p> 
                    
                </div>
                <div class="contactus-section">
                <h3 class="title">Features of Mobile Applications that we provide:</h3>
                    
                </div>
                <ul style="list-style-type:disc"> 

                    <li>Custom Native Android Applications Development</li>
                    <li>Client-Server based Android App Development</li>
                    <li>GPS enabled or location based service for Android Apps</li>
                    <li>Mobile Payment Services using Payment Gateways.</li>
                    <li>Mobile Web compatibility.</li>
                    <li>Effective Mobile UI Design</li>
                    <li>Minimum loading time</li>
                    <li>Apps are integrated with the main website to enable automated updates</li>
                    <li>Visually attractive</li>
                    <li>They are bug free</li>
                    <li>Regularly upgraded</li>
                    <li>Compatible with wide range of latest devices</li>
                </ul>
              
                @endif               
                <!-- Product-->
                 
                @if($service=='products')
                
                <div class="contactus-section">
                    <h3 class="title">Products</h3>
                    <p>We as a company have developed and maintained various softwares which are developed with technically advanced skills and effectiveness, Which are ready to buy and use. These are prepared in advance for people to use and maintain without any time wastage.</p> 
                    
                </div>
                <div class="contactus-section">
                <h3 class="title">Features of Products that we provide:</h3>
                    
                </div>
                <ul style="list-style-type:disc"> 

                    <li>Ready to Use</li>
                    <li>Low Cost</li>
                    <li>No Time Wastage</li>
                    <li>Maintenance facility</li>
                    <li>Mobile Web Compatibility.</li>
                </ul>
              
                @endif

                @if($service=='seo')
                <div class="contactus-section">
                    <h3 class="title">Search Engine Optimization</h3>
                    <p>Search Engine Optimisation, or SEO, is the process whereby the individual pages of a website are created or modified to be most visible to search engine crawlers. Crawlers are essentially robots that read websites for search engines and tell them exactly how good, or relevant, they are. Pages that are considered to be valuable and relevant are then placed higher up in the results when a user conducts a search...</p> 
                    
                </div>
                <div class="contactus-section">
               <h3 class="title" style="margin-top: 100px">Social Media Marketing</h3>
                <p>With hundreds of millions of global users, social media is an excellent way to reach new customers online. Having social links on your website’s pages will allow customers to share your news regarding updates, specials, and offers. Large no. of users are attracted to Facebook, Instagram, Twitter, Google Plus, hence we use social media marketing tools to help users get awareness easily and faster.</p> 
                    
                </div>
               
              
                @endif 

                @if($service=='erp')
                <div class="contactus-section">
                    <h3 class="title">Enterprise Resource Planning</h3>
                    <p>Enterprise resource planning (ERP) is business process management software that allows an organization to use a system of integrated applications to manage the business and automate many back office functions related to technology, services and human resources.
                    We cam provide an ERP solution for schools, colleges, enterprises, for transfer of information within the organisation using networking as well latest technical advancements.</p> 
                    
                </div>
               
               
              
                @endif 



            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="btnregister">
                  <a class="demoregisterbtn" href="{{url('registration')}}">Register for demo classes</a>
                </div>
                <div class="medica-appointment-card wow fadeInUp" data-wow-delay="0.6s">
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
