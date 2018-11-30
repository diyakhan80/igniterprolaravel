<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validations\Validate as Validations;
use App\Http\Controllers\Controller;
use App\Helpers\apphelper;
use Redirect;
use Auth;
require '../vendor/autoload.php';

class HomeController extends Controller
{
	public function __construct(Request $request){

        parent::__construct($request);
        
    }
    public function index(Request $request)
    {
		return view('index');
    }

    public function course(Request $request, $course)
    {
    	$data['view'] = 'courses';
    	$data['course'] = $course;
     	return view('front_home',$data);
        
    }

     public function service(Request $request, $service)
    {
        $data['view'] = 'services';
        $data['service'] = $service;
        return view('front_home',$data);
            
    }

    public function reviews(Request $request)
    {
        $data['view'] = 'reviews';
        $data['reviews'] = \Models\Review::list('array');

        return view('front_home',$data);
            
    }

     public function register(Request $request)
    {
        $data['view'] = 'registration';
        

        return view('front_home',$data);
            
    }
     public function contact(Request $request)
    {
        $data['view'] = 'contact';
       

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
            $data['course']      		=!empty($request->course)?$request->course:'';
            $data['location']           =!empty($request->location)?$request->location:'';
            $data['comments']           =!empty($request->comments)?$request->comments:'';
            $data['date_enquired']      = date('Y-m-d H:i:s');
            
            $inserId = \Models\Enquiry::add($data);
            if($inserId){
               $emailData            = ___email_settings();
               $emailData['name']    = !empty($request->name)?$request->name:'';
               $emailData['email']   = !empty($request->email)?$request->email:'';
               $emailData['phone']   = !empty($request->phone)?$request->phone:'';
               $emailData['course']  = !empty($request->course)?$request->course:'';
               $emailData['date']    = date('Y-m-d H:i:s');

               $emailData['custom_text'] = 'Your Enquiry has been submitted successfully';
               ___mail_sender($emailData['email'],$request->name,"enquiry_email",$emailData);
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Enquiry has been submitted successfully.";
                $this->redirect = url('/');
            } 
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
            $data['reg_date']           = date('Y-m-d H:i:s');
            
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

    public function career(Request $request)
    {
        $data['view'] = 'career';  
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

    public function about(Request $request)
    {
        $data['view'] = 'about';  
        return view('front_home',$data);
            
    }
    public function recentWorks(Request $request)
    {
        $data['view'] = 'recentworks';  
        return view('front_home',$data);
            
    }

     public function submitRegistration(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createRegistration();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->register_name)?$request->register_name:'';
            $data['phone']              =!empty($request->register_phone)?$request->register_phone:'';
            $data['email']              =!empty($request->register_email)?$request->register_email:'';
            $data['courses']             =!empty($request->register_course)?$request->register_course:'';
           
            $data['location']           =!empty($request->register_location)?$request->register_location:'';
            $data['reg_date']           = date('Y-m-d H:i:s');
            
            $inserId = \Models\Registration::add($data);
            if($inserId){
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Your Registration has been submitted successfully.";
                $this->redirect = url('/');
            } 
        } 
        return $this->populateresponse();
    }

}
?>