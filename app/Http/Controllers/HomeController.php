<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Course;
use App\Models\Good_Works;
use App\Models\SocialMedia;
use App\Models\ContactAddress;
use Illuminate\Http\Request;
use Validations\Validate as Validations;
use App\Http\Controllers\Controller;
require '../vendor/autoload.php';

class HomeController extends Controller
{
	public function __construct(Request $request){
        parent::__construct($request);
    }

    public function index(Request $request){
		$data['view'] = 'front.index';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        $data['goodworks'] = _arefy(Good_Works::where('status','=','active')->get());
        // dd($data['goodworks']);
        return view('front_home',$data);
    }

    public function course(Request $request, $course){
    	$data['view'] = 'front.courses';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
    	$data['course'] = $course;
     	return view('front_home',$data);
        
    }

    public function service(Request $request, $service){
        $data['view'] = 'front.services';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        $data['service'] = $service;
        return view('front_home',$data);
            
    }

    public function reviews(Request $request){
        $data['view'] = 'front.reviews';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        $data['reviews'] = \Models\Review::list('array');
        return view('front_home',$data);
    }

    public function enquiryList(Request $request){
        $data['view'] = 'front.enquiry_list';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        $data['enquiries'] = \Models\Enquiry::list('array');
        return view('front_home',$data);
            
    }

    public function register(Request $request){
        $data['view'] = 'front.registration';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        return view('front_home',$data);
    }
     
    public function contact(Request $request){
        $data['view'] = 'front.contact';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        return view('front_home',$data);
    }

    public function submitEnquiry(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createEnquiry();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->name)?$request->name:'';
            $data['phone']              =!empty($request->phone)?$request->phone:'';
            $data['email']              =!empty($request->email)?$request->email:'';
            $data['course_id']      	=!empty($request->course_id)?$request->course_id:'';
            $data['location']           =!empty($request->location)?$request->location:'';
            $data['comments']           =!empty($request->comments)?$request->comments:'';
            $data['status']             ='active';
            $data['created_at']         =date('Y-m-d H:i:s');
            $data['updated_at']         =date('Y-m-d H:i:s');
            
            $inserId = \Models\Enquiry::add($data);
            // if($inserId){
            //    $emailData            = ___email_settings();
            //    $emailData['name']    = !empty($request->name)?$request->name:'';
            //    $emailData['email']   = !empty($request->email)?$request->email:'';
            //    $emailData['phone']   = !empty($request->phone)?$request->phone:'';
            //    $emailData['course']  = !empty($request->course)?$request->course:'';
            //    $emailData['date']    = date('Y-m-d H:i:s');

               // $emailData['custom_text'] = 'Your Enquiry has been submitted successfully';
               // ___mail_sender($emailData['email'],$request->name,"enquiry_email",$emailData);
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Enquiry has been submitted successfully.";
                $this->redirect = url('/');
            // } 
        } 
        return $this->populateresponse();
    }

    public function submitReview(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createReview();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->review_name)?$request->review_name:'';
            $data['phone']              =!empty($request->review_phone)?$request->review_phone:'';
            $data['email']              =!empty($request->review_email)?$request->review_email:'';
            $data['rating']             =!empty($request->rate)?$request->rate:'';
            $data['comments']           =!empty($request->review_comments)?$request->review_comments:'';
            $data['created_at']           = date('Y-m-d H:i:s');
            $data['updated_at']           = date('Y-m-d H:i:s');
            
            $inserId = \Models\Review::add($data);
            if($inserId){
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Review has been submitted successfully.";
                $this->redirect = url('/');
            } 
        } 
        return $this->populateresponse();
    }

    public function career(Request $request){
        $data['view'] = 'front.career';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        return view('front_home',$data);
    }

    public function submitCareer(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createCareer();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->career_name)?$request->career_name:'';
            $data['jobtitle']           =!empty($request->career_position)?$request->career_position:'';
            $data['email']              =!empty($request->career_email)?$request->career_email:'';
           
            /*$data['resume']             =!empty($request->resume)?$request->resume:'';*/
            if(!empty($request->resume)){
               $path=$request->file('resume')->store('resume');
              /* $image = $request->file('topic_picture');
               $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
               $path = public_path().'/uploads/topic';
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true);
                }

               $destinationPath = public_path('uploads/topic');
               $img = Image::make($image->getRealPath());
               $img->resize(264, 337, function ($constraint) {
                   $constraint->aspectRatio();
               })->save($destinationPath . '/' . $input['imagename']);

               $destinationPath = public_path('images/image');
               $image->move($destinationPath, $input['imagename']);*/
               //$data['topic_picture'] = $input['imagename'];
               $data['resume'] =  $path;
            }
            $data['applied_on']         = date('Y-m-d H:i:s');
            
            $inserId = \Models\Career::add($data);
            if($inserId){
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Career has been submitted successfully.";
                $this->redirect = url('/');
            } 

        } 
        return $this->populateresponse();
    }

    public function about(Request $request){
        $data['view'] = 'front.about';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        return view('front_home',$data);
    }
    public function recentWorks(Request $request){
        $data['view'] = 'front.recentworks';
        $data['contact'] = _arefy(ContactAddress::where('status','=','active')->get());
        $data['social'] = _arefy(SocialMedia::where('status','=','active')->get());
        $data['courses'] = _arefy(Course::where('status','=','active')->get());
        return view('front_home',$data);
    }

     public function submitRegistration(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createRegistration();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->name)?$request->name:'';
            $data['phone']              =!empty($request->phone)?$request->phone:'';
            $data['email']              =!empty($request->email)?$request->email:'';
            $data['course_id']          =!empty($request->course_id)?$request->course_id:'';
            $data['location']           =!empty($request->location)?$request->location:'';
            $data['status']             = 'active';
            $data['created_at']         = date('Y-m-d H:i:s');
            $data['updated_at']         = date('Y-m-d H:i:s');
            
            $inserId = \Models\Registration::add($data);
            
            // if($inserId){
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Your Registration has been submitted successfully.";
                $this->redirect = url('/');
            // } 
        } 
        return $this->populateresponse();
    }
}
?>