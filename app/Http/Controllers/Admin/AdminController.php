AdminController.php<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validations\Doctor as Validations;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //$this->middleware('auth');
        parent::__construct($request);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['view'] = 'front/index';
        $data['site_title'] = $data['page_title'] = 'Home';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li></ul>';
        $data['doctors']  = _arefy(\Models\Doctors::where('status','!=','trashed')->get());
        $data['hospitals']  = _arefy(\Models\Hospitals::where('status','!=','trashed')->get());
        return view('front_home',$data);
    }

     public function contact()
    {
        $data['view'] = 'front/contact';
        $data['site_title'] = $data['page_title'] = 'Home';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li></ul>';
        return view('front_home',$data);
    }

    public function aboutUs()
    {
        $data['view'] = 'front/about-us';
        $data['site_title'] = $data['page_title'] = 'Home';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li></ul>';
        return view('front_home',$data);
    }
     public function service()
    {
        $data['view'] = 'front/services';
        $data['services']  = _arefy(\Models\Services::where('status','!=','trashed')->get());
        $data['site_title'] = $data['page_title'] = 'Home';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li></ul>';
        return view('front_home',$data);
    }
    public function doctors()
    {
        $data['view'] = 'front/doctors';
        $data['doctors']  = _arefy(\Models\Doctors::where('status','!=','trashed')->get());
        $data['site_title'] = $data['page_title'] = 'Home';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li></ul>';
        return view('front_home',$data);
    }
    public function hospitals()
    {
        $data['view'] = 'front/hospitals';
        $data['hospitals']  = _arefy(\Models\Hospitals::where('status','!=','trashed')->get());
        $data['site_title'] = $data['page_title'] = 'Home';
        
        return view('front_home',$data);
    }
    public function allHospitals()
    {  
        $data['view'] = 'front/all-hospitals';
        $data['hospitals']  = _arefy(\Models\Hospitals::where('status','!=','trashed')->get());
        $data['site_title'] = $data['page_title'] = 'Home';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li></ul>';
        return view('front_home',$data);
    }
    
     public function allDoctors()
    {
        $data['view'] = 'front/all-doctors';
        $data['doctors']  = _arefy(\Models\Doctors::where('status','!=','trashed')->get());
        //dd($data['doctors']);
        $data['site_title'] = $data['page_title'] = 'Home';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li></ul>';
        return view('front_home',$data);
    }

    public function details(Request $request)
    {
        $id = ___decrypt($request->id);
        $type = $request->type;
        $data['view'] = 'front/details';
        if($type=='doctor'){
          $doctors = _arefy(\Models\Doctors::list('single',$id));
          $data['title'] = $doctors['first_name'].' '.(!empty($doctors['last_name'])?$doctors['last_name']:'');
          $data['id'] = $doctors['id'];

          $city = !empty($doctors['city'])?$doctors['city']:'';
          $country = !empty($doctors['locations']['name'])?$doctors['locations']['name']:'';
          $data['address'] = !empty($city)?($city.','.$country):$country;

          $data['description'] = $doctors['qualifications'].' '.(!empty($doctors['specifications'])?$doctors['specifications']:'');
          $data['image'] = !empty($doctors['image'])?$doctors['image']:'';
           $data['type'] = 'doctors';

        }
        else if($type=='hospital'){
          $hospitals = _arefy(\Models\Hospitals::list('single',$id));
          $data['id'] = $hospitals['id'];
          $data['title'] = $hospitals['name'];
          $city = !empty($hospitals['city'])?$hospitals['city']:'';
          $country = !empty($hospitals['locations']['name'])?$hospitals['locations']['name']:'';
          $data['address'] = !empty($city)?($city.','.$country):$country;

          $data['description'] = !empty($hospitals['description'])?$hospitals['description']:'';
          $data['image'] = !empty($doctors['image'])?$doctors['image']:'';
          $data['type'] = 'hospitals';
        }
        else if($type=='service'){
          $services = _arefy(\Models\Services::where('id',$id)->get()->first());
          $data['id'] = $services['id'];
          $data['title'] = $services['title'];
          $data['description'] = $services['description'];
          $data['image'] = !empty($doctors['image'])?$doctors['image']:'';
           $data['type'] = 'services';
        }
        return view('front_home',$data);
    }
    public function bookAppointment(Request $request)
    { 
     $id = ___decrypt($request->id);
        $data['type'] = $request->type;
        $data['id'] = $id ;
        if($request->type=='doctor'){
          if($id!='null'){ 
              $doctor = _arefy(\Models\Doctors::where('id',$id)->get()->first());
              $name = $doctor['first_name'].' '.$doctor['last_name'];
            }
            else{
              $name = 'none';
            }
        }
        else if($request->type=='hospital'){

            if($id!='null'){
              $hospital = _arefy(\Models\Hospitals::where('id',$id)->get()->first());
              $name = $hospital['name'];
            }
            else{
              $name = 'none';
            }

        }
        else if($request->type=='service'){
          if($id!='null'){
            $service = _arefy(\Models\Services::where('id',$id)->get()->first());
            $name = $service['title'];
          }
          else{
              $name = 'none';
            }  

        }
        else{
            $name = 'none';
        }
        $data['name'] = $name ;
        $data['site_title'] = $data['page_title'] = 'Book Appointment';
        $data['view'] = 'front.book-appointment';
        return view('front_home',$data);
    }
    public function addAppointment(Request $request)
    {   if(empty($request->type)){
            $request->request->add(['type'=>$request->specialitytype]);
          }
        if(empty($request->requirement)){
            $request->request->add(['requirement'=>$request->reqname]);
          }
        $validation = new Validations($request);
        $validator  = $validation->createAppointment();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->name)?$request->name:'';
            $data['email']              =!empty($request->email)?$request->email:'';
            $data['phone']              =!empty($request->mobile_number)?$request->mobile_number:'';
            $data['appointment_date']   =!empty($request->appointment_date)?$request->appointment_date:'';
            $data['description']        =!empty($request->description)?$request->description:'';
            /*if(!empty($request->requirementname)){
                if()
                $name = \Models\
            }*/
            $data['requirement']               =!empty($request->requirement)?$request->requirement:(!empty($request->reqname)?$request->reqname:'');
            $data['type']               =!empty($request->type)?$request->type:(!empty($request->specialitytype)?$request->specialitytype:'');
            $data['updated_at']         =date('Y-m-d H:i:s');
            $data['created_at']         =date('Y-m-d H:i:s');

            $inserId = \Models\Appointments::add($data);
            //pp($inserId);
            if($inserId){

               $name = $request->name;
               $emailData         = ___email_settings();
               $emailData['name'] = $name;
               $emailData['email']= !empty($request->email)?$request->email:'';;
               $emailData['phone'] = $request->mobile_number;
               $emailData['requirement']        =!empty($request->requirement)?$request->requirement:'';
               $emailData['date']   =!empty($request->appointment_date)?$request->appointment_date:'';

               $emailData['custom_text'] = 'You Appointment has been booked successfully';
               ___mail_sender($emailData['email'],$name,"booking_email",$emailData);

                $this->status = true;
                $this->modal  = true;
                $this->alert    = true;
                $this->message  = "Your Appointment has been booked successfully";
                $this->redirect = url('/');
            } 
        } 
        return $this->populateresponse();
    }

public function sendMessage(Request $request)
    {  
        $request->request->add(['appointment_date'=>date('Y-m-d H:i:s'),'requirement'=>'contact','type'=>'contact']);
       $validation = new Validations($request);
        $validator  = $validation->createAppointment();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->name)?$request->name:'';
            $data['email']              =!empty($request->email)?$request->email:'';
            $data['phone']              =!empty($request->mobile_number)?$request->mobile_number:'';
            $data['appointment_date']   =date('Y-m-d H:i:s');
            $data['description']        =!empty($request->description)?$request->description:'';
            $data['requirement']        ='contact';
            $data['type']               ='contact';
            $data['updated_at']         =date('Y-m-d H:i:s');
            $data['created_at']         =date('Y-m-d H:i:s');

            $inserId = \Models\Appointments::add($data);
            if($inserId){
                $this->status = true;
                $this->modal  = true;
                $this->alert    = true;
                $this->message  = "Your Appointment has been booked successfully";
                $this->redirect = url('/');
            } 
        } 
        return $this->populateresponse();
    }
 public function search(Request $request) 
    {
        $data['view'] = 'front/all-data';
        $data['site_title'] = $data['page_title'] = 'Home';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li></ul>';
        
        $searched_data = \Models\Search::list($request->search);
        $data['searched_data'] = $searched_data;
        return view('front_home',$data);
    }

public function country(Request $request){
       $language = \App::getLocale();
       $where = '';
       if(!empty($request->search)){
           $where .= "name LIKE '%{$request->search}%'";
       }

       $countries = \Models\Country::list(
           'array',
           $where,
           ['name as text', 'id as id']
       );
       return response()->json([
           'results'    => $countries,
       ]);
   }

public function requirementName(Request $request){
       $language = \App::getLocale();
       $where = '';
       if(!empty($request->search)){
           $where .= "AND name LIKE '%{$request->search}%'";
       }
      // $hospital = _arefy(\Models\Hospitals::where('id',$id)->get()->first());
       if(!empty($request->id)){
            switch($request->id){
                case 'hospital':
                $list = \Models\Hospitals::datalist(
                   'array',
                   $where,
                   ['name as text', 'id as id']
               );
                break;

                case 'doctor':
                $list = \Models\Doctors::datalist(
                   'array',
                   $where,
                   ['name as text', 'id as id']
               );
                break;

                case 'service':

                $list = \Models\Services::datalist(
                   'array',
                   $where,
                   ['title as text', 'id as id']
               );
                break;


            }
       }
       

       
       return response()->json([
           'results'    => $list,
       ]);
   }


}
