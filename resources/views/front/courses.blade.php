@php 

// define variables and set to empty values
$ratingEr = $nameEr =$emailEr="";
$name = $email = $rating = "";

 

@endphp

<section class="aboutus contactWrapperr white-background black" id="one">
       <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 black">
                    
                        @if($course=='android')
                    
                    <div class="contactus-section">
                        <h3 class="title">ANDROID</span></h3>
                            <p style="float:left">Android is an open source and Linux-based operating system for mobile devices such as smartphones and tablet computers. Android was developed by the Open Handset Alliance, led by Google, and other companies.
                            </p>  
                    </div>
                    
                    
                    <h3 class="title">Syllabus</span></h3>
                    <h4>Android Basics</h4>
                    <ul style="list-style-type:disc"> 

                        <li>Android - Home</li>
                        <li>Android - Overview</li>
                        <li>Android - Environment Setup</li>
                        <li>Android - Architecture</li>
                        <li>Android - Application Components</li>
                        <li>Android - Hello World Example</li>
                        <li>Android - Resources</li>
                        <li>Android - Activities</li>
                        <li>Android - Services</li>
                        <li>Android - Broadcast Receivers</li>
                        <li>Android -Content Providers</li>
                        <li>Android -Fragments</li>
                        <li>Android -Intents/Filters</li>
                        
                    </ul>
                    
                    <h4>Android User Interface</h4>
                    
                    <ul style="list-style-type:disc"> 

                        <li>Android - UI Layouts</li>
                        <li>Android -  UI Controls</li>
                        <li>Android - Event Handling</li>
                        <li>Android - Styles and Theme</li>
                        <li>Android - Custom Components</li>
                       
                    </ul>
                    
                    <h4>Advanced Concepts</h4>
                    
                    <ul style="list-style-type:disc"> 

                        <li>Android - Drag and Drop</li>
                        <li>Android -  Notifications</li>
                        <li>Android - Location Services</li>
                        <li> Android - Sending Email</li>
                        <li>Android - Sending SMS</li>
                        <li>Android - Phone Calls</li>
                        
                    </ul>
                    
                    <h4>Android Useful Concepts</h4>
                    
                    <ul style="list-style-type:disc"> 

                        <li>Android - Alert Dialoges</li>
                        <li>Android -  Animations</li>
                        <li>Android -Audio Capture</li>
                        <li>Android -AudioManager</li>
                        <li>Android -Auto Complet</li>
                        <li>Android -Best Practices</li>
                        <li>Android -Bluetooth</li>
                        <li>Android -Camera</li>
                        <li>Android -Data Backup</li>
                        <li>Android -Developer Tools</li>
                        <li>Android -Facebook Integration</li>
                        <li>Android -PHP/MySQL</li>
                        <li>Android -Push Notification</li>
                        <li>Android - RSS Reader</li>
                        <li>Android -SQLite database</li>
                    </ul>
                     @endif 
                
                    <!--PHP -->
                        @if($course=='php')
                    
                    <div class="contactus-section">
                        <h3 class="title">Core PHP</span></h3>
                        <p style="float:left">The PHP Hypertext Preprocessor (PHP) is a programming language that allows web developers to create dynamic content that interacts with databases. PHP is basically used for developing web based software applications. </p> 
                    </div>
                    <h3 class="title">Syllabus</span></h3>
                    <h4>PHP Basics</h4>
                    <ul style="list-style-type:disc"> 
                        
                        <li>Introduction</li>
                        <li>Environment Setup</li>
                        <li>Syntax Overview</li>
                        <li>Variable Types</li>
                        <li>Constants</li>
                        <li>Operator Types</li>
                        <li>Decision Making</li>
                        <li>Loop Types</li>
                        <li>Arrays</li>
                        <li>Strings</li>
                        <li>Web Concepts</li>
                        <li>GET & POST</li>
                        <li>File Inclusion</li>
                        <li>Files & I/O</li>
                        <li>Functions</li>
                        <li>Cookies</li>
                        <li>Sessions</li>
                        <li>Sending Emails</li>
                        <li>File Uploading</li>
                        <li> Coding Standard</li>      
                    </ul>
                    
                    <h4>PHP Advanced Concepts</h4>
                    <ul style="list-style-type:disc"> 
                    
                        <li>Predefined Variables</li>
                        <li>Regular Expression</li>
                        <li>Error Handling</li>
                        <li>Bugs Debugging</li>
                        <li>Date & Time</li>
                        <li>PHP & MySQL</li>
                        <li>PHP & AJAX</li>
                        <li>PHP & XML</li>
                        <li>Object Oriented</li>
                        <li>Form Introduction</li>
                        <li>Validation Example</li>
                        <li>Paypal Integration</li>
                        <li>MySQL Login</li>
                        <li>SAX Parser </li>
                        <li>DOM Parser </li>
                        <li>PHP Frame Works</li>
                    </ul><!-- /row -->
                     @endif
                      <!--PHP -->
                    
                        @if($course=='python')
                    
                    <div class="contactus-section">
                        <h3 class="title">Python</span></h3>
                        <p style="float:left">Python is a general-purpose interpreted, interactive, object-oriented, and high-level programming language. It was created by Guido van Rossum during 1985- 1990. Like Perl, Python source code is also available under the GNU General Public License (GPL).  </p>  
                    </div>
                    <h3 class="title">Syllabus</span></h3>
                    <h4>Python Basics</h4>
                    <ul style="list-style-type:disc"> 
                        
                        <li>Python - Environment Setup</li>
                        <li>Python - Basic Syntax</li>
                        <li>Python - Variable Types</li>
                        <li>Python - Basic Operators</li>
                        <li>Python - Decision Making</li>
                        <li>Python - Loops</li>
                        <li>Python - Numbers</li>
                        <li>Python - Strings</li>
                        <li>Python - Lists</li>
                        <li>Python - Tuples</li>
                        <li>Python - Dictionary</li>
                        <li>Python - Date & Time</li>
                        <li>Python - Functions</li>
                        <li>Python - Modules</li>
                        <li>Python - Files I/O</li>
                        <li>Python - Exceptions</li>    
                    </ul>
                    
                    <h4>Python Advanced Concepts</h4>
                    <ul style="list-style-type:disc"> 
                    </hr>
                        <li>Python - Classes/Objects</li>
                        <li>Python - Reg Expressions</li>
                        <li>Python - CGI Programming</li>
                        <li>Python - Database Access</li>
                        <li>Python - Networking</li>
                        <li>Python - Sending Email</li>
                        <li>Python - Multithreading</li>
                        <li>Python - XML Processing</li>
                        <li>Python - GUI Programming</li>
                        <li>Python - Further Extensions</li>
                    </ul><!-- /row -->
                    @endif
                     
                    <!--JAVA -->
                    
                        @if($course=='java')
                    
                    <div class="contactus-section">
                        <h3 class="title">JAVA</span></h3>
                        <p style="float:left">JAVA 8 is a major feature release of JAVA programming language development. Its initial version was released on 18 March 2014. With the Java 8 release, Java provided supports for functional programming, new JavaScript engine, new APIs for date time manipulation, new streaming API, etc.</p> 
                    </div>
                    <h3 class="title">Syllabus</span></h3>
                    <h4>JAVA Basics</h4>
                    <ul style="list-style-type:disc"> 

                        <li>Java - Home</li>
                        <li>Java - Overview</li>
                        <li>Java - Environment Setup</li>
                        <li>Java - Basic Syntax</li>
                        <li>Java - Object & Classes</li>
                        <li>Java - Constructors</li>
                        <li>Java - Basic Datatypes</li>
                        <li>Java - Variable Types</li>
                        <li>Java - Modifier Types</li>
                        <li>Java - Basic Operators</li>
                        <li>Java - Loop Control</li>
                        <li>Java - Decision Making</li>
                        <li>Java - Numbersn</li>
                        <li>Java - Characters</li>
                        <li>Java - Strings</li>
                        <li>Java - Arrays</li>
                        <li>Java - Date & Times</li>
                        <li>Java - Regular Expressions</li>
                        <li>Java - Methods</li>
                        <li> Java - Files and I/O</li>
                        <li>Java - Exceptions</li>
                        <li>Java - Inner classes</li>
                        <li>Java Object Oriented</li>
                        <li>Java - Inheritance</li>
                        <li>Overriding</li>
                        <li>Polymorphism</li>
                        <li>Abstraction</li>
                        <li>Encapsulation</li>
                        <li>Interfaces</li>
                        <li>Packages</li>
                    </ul>
                    
                    <h4>Java Advanced Concepts</h4>
                    <ul style="list-style-type:disc"> 
                        <li>Data Structures</li>
                        <li>Collections</li>
                        <li>Generics</li>
                        <li>Serialization </li>
                        <li>Networking </li>
                        <li>Sending Email</li>
                        <li>Multithreading</li>
                        <li>Applet Basics</li>
                    </ul>
                     @endif
                    

                    <!-- iOS-->
                    
                        @if($course=='ios') 
                    
                    <div class="contactus-section">
                        <h3 class="title">iOS</span></h3>
                        <p style="float:left">iOS is a mobile operating system developed and distributed by Apple Inc. It was originally released in 2007 for the iPhone, iPod Touch, and Apple TV. iOS is derived from OS X, with which it shares the Darwin foundation. iOS is Apple's mobile version of the OS X operating system used in Apple computers.</p> 
                        
                    </div>
                    <h3 class="title">Syllabus</span></h3>

                    <h4>iOS Basics</h4>
                    
                    <ul style="list-style-type:disc"> 

                        <li>iOS - Home</li>
                        <li>iOS - Getting Started</li>
                        <li>iOS - Environment Setup</li>
                        <li>iOS - Objective-C Basics</li>
                        <li>iOS - First iPhone Application</li>
                        <li>iOS - Actions and Outlets</li>
                        <li>iOS - Delegates</li>
                        <li>iOS - UI Elements</li>
                     
                        <li>iOS - Universal Applications</li>
                        <li>iOS - Camera Management</li>
                        <li>iOS - Location Handling</li>
                        
                        <li>iOS - Sending Email</li>
                        <li>iOS - Audio & Video</li>
                        
                    </ul>
                    
                    <h4>iOS Advanced Concepts</h4>
                    
                    <ul style="list-style-type:disc"> 

                        <li>iOS - Storyboards</li>
                        <li>iOS - Auto Layouts</li>
                        <li>iOS - Twitter & Facebook</li>
                        <li>iOS - Memory Management</li>
                        <li>iOS - Application Debugging</li>
                        <li>iOS - File Handling</li>
                        <li>iOS - Accessing Maps</li>
                        <li>iOS - In-App Purchase</li>
                        <li>iOS - Add Integration</li>
                    </ul><!-- /row -->
                    @endif
                     
                     
                        <!-- iOS-->
                    
                        @if($course=='wordpress')
                    
                    <div class="contactus-section">
                        <h3 class="title">WordPress</span></h3>
                        <p style="float:left">WordPress is an open source Content Management System (CMS), which allows the users to build dynamic websites and blog. WordPress is the most popular blogging system on the web and allows updating, customizing and managing the website from its back-end CMS and components.</p> 
                        
                    </div>
                    <h3 class="title">Syllabus</span></h3>

                    <h4>WordPress Basics</h4>
                    <ul style="list-style-type:disc"> 

                        <li>WordPress - Home</li>
                        <li>WordPress - Overview</li>
                        <li>WordPress - Installation</li>
                        <li>WordPress - Dashboard</li>
                        
                    </ul>
                    
                    <h4>WordPress Advanced Concepts</h4>
                    <ul style="list-style-type:disc"> 
                        <li>WordPress - Settings</li>
                        <li>WordPress - Posts</li>
                        <li>WordPress - Media</li>
                        <li>WordPress - Pages</li>
                        <li>WordPress - Tags</li>
                        <li>WordPress - Links</li>
                        <li>WordPress - Comments</li>
                        <li>WordPress - Plugins</li>
                        <li>WordPress - Users</li>
                        <li>WordPress Appearance</li>
                        <li>WordPress - Host Transfer</li>
                        <li>WordPress - Version Update</li>
                        <li>WordPress - Spam Protection</li>
                        <li>WordPress - Optimization</li>    
                    </ul><!-- /row -->
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
 