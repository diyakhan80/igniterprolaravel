<?php

namespace Validations;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
/**
* 
*/
class Validate
{
	protected $data;
	public function __construct($data){
		$this->data = $data;
	}

	private function validation($key){
		$validation = [
			'id'				=> ['required'],
			'email'				=> ['nullable','email'],
			'req_email'			=> ['required','email'],
			'first_name' 		=> ['required','string'],
			'name' 				=> ['required','string'],
			'last_name' 		=> ['nullable','string'],
			'date_of_birth' 	=> ['nullable','string'],
			'gender' 			=> ['required','string'],
			'phone_code' 		=> ['nullable','required_with:mobile_number','string'],
			'mobile_number' 	=> ['nullable','numeric'],
			'req_mobile_number' 	=> ['required','required_with:phone_code','numeric'],
			'country' 			=> ['required','string'],
			'address'           => ['nullable','string','max:1500'],
			'qualifications'    => ['required','string','max:1500'],
			'specifications'    => ['nullable','string','max:1500'],
			'description'       => ['nullable','string','max:1500'],
			'required_description'  => ['required','string','max:1500'],
			'title'             => ['required','string'],
			'profile_picture'   => ['required','mimes:doc,docx,pdf','max:2048'],
			'pin_code' 			=> ['nullable','max:6','min:4'],
			'appointment_date'  => ['required','string'],
			'type' 	            => ['required','string'],
			'phone' 	        => ['required','string','numeric'],
			'course' 	        => ['required','string'],
			'location' 	        => ['required','string'],
			'comments' 	        => ['required','string'],
			'password'          => ['required','string','max:50'],
			'price'				=> ['required','numeric'],
			'start_from'		=> ['required'],

		];
		return $validation[$key];
	}
	public function login(){
        $validations = [
            'username' 		       => $this->validation('email'),
			'password'       	   => $this->validation('password')
			
    	];

        $validator = \Validator::make($this->data->all(), $validations,[]);
        return $validator;		
	}
	public function createEnquiry($action='add'){
        $validations = [
            'name' 		        => $this->validation('name'),
			'email'  			=> $this->validation('req_email'),
			'phone'  	        => $this->validation('req_mobile_number'),
			'comments'			=> $this->validation('comments'),
            'location' 	        => $this->validation('location'),
			'course' 	        => $this->validation('course'),

    	];

    	

        $validator = \Validator::make($this->data->all(), $validations,[]);
        return $validator;		
	}

	public function createReview($action='add'){
        $validations = [
            'review_name' 		        => $this->validation('name'),
			'review_email'  			=> $this->validation('req_email'),
			'review_phone'  	        => $this->validation('mobile_number'),
			'rate'			            => $this->validation('id'),
            'review_comments'			=> $this->validation('description')
			
    	];

        $validator = \Validator::make($this->data->all(), $validations,[
    		'review_name.required' 		=>  'Your Name is required',
    		'review_email.required'     =>  'Your Email is required',
    		'review_email.email'		=>  'Your Email is in Incorrect format'
    		

    	]);
        return $validator;		
	}
	


	public function createCareer($action='add'){
        $validations = [
            'career_name' 		        => $this->validation('name'),
			'career_email'  			=> $this->validation('req_email'),
			'career_position'			=> $this->validation('name'),
            'resume'					=> $this->validation('profile_picture')
			
    	];

    	

        $validator = \Validator::make($this->data->all(), $validations,[
    		'career_name.required' 		=>  'Your Name is required',
    		'career_email.required'     =>  'Your Email is required',
    		'career_email.email'		=>  'Your Email is in Incorrect format',
    		'career_position.required'  =>  'Job Position is required',
    		'resume.required'           =>  'Resume is required'

    	]);

        return $validator;		
	}

	public function createRegistration($action='add'){
        $validations = [
            'register_name' 		    => $this->validation('name'),
			'register_email'  			=> $this->validation('req_email'),
			'register_phone'  	        => $this->validation('req_mobile_number'),
			'register_location'		    => $this->validation('location'),
            'register_course'			=> $this->validation('course')
			
    	];

        $validator = \Validator::make($this->data->all(), $validations,[
    		'register_name.required' 	=>  'Your Name is required',
    		'register_email.required'   =>  'Your Email is required',
    		'register_email.email'		=>  'Your Email is in Incorrect format',
    		'register_phone.required'   =>  'Your Phone is required',
    		'register_phone.numeric'    =>  'Your Phone is not in correct format',
    		'register_location.required'   =>  'Your Location is required',
    		'register_course.required'   =>  'Course is required',

    		

    	]);
        return $validator;		
	}

	public function createAgent($action='add'){
        $validations = [
            'name' 		        => $this->validation('name'),
			'email'  			=> array_merge($this->validation('req_email'),[Rule::unique('agent')->ignore('trashed','status')]),
			// 'phone_code'		=> $this->validation('phone_code'),
			'mobile_number'  	=> array_merge($this->validation('req_mobile_number'),[Rule::unique('agent')->ignore('trashed','status')]),
			
    	];

    	if($action == 'edit'){
			$validations['name']			= $this->validation('name');
			$validations['email'] 			= array_merge($this->validation('req_email'),[Rule::unique('agent')->ignore('trashed','status')->where(function($query){
					$query->where('id','!=',$this->data->id);
				})
			]);
			$validations['mobile_number'] 	= array_merge($this->validation('req_mobile_number'),[Rule::unique('agent')->ignore('trashed','status')->where(function($query){
					$query->where('id','!=',$this->data->id);
				})
			]);
		}

        $validator = \Validator::make($this->data->all(), $validations,[
			'name.required' 						=>  'Agent Name is required.',
			'email.required' 						=>  'E-mail is required.',
			'mobile_number.required'				=>  'Mobile Number is required',
			// 'phone_code.required'					=>  'Phone Code is required',
		]);
        return $validator;		
	}

	public function createProject($action='add'){
		$validations = [
			'user_client_id'			=> $this->validation('name'),
            'project_name' 		        => $this->validation('name'),
            'project_type'				=> $this->validation('type'),
            'project_price'				=> $this->validation('price'),
			'project_duration'			=> $this->validation('price'),
			'project_start_from'		=> $this->validation('start_from'),
			'recieved_payment'			=> $this->validation('price'),
			'payment_method'			=> $this->validation('name'),
			'next_payment'				=> $this->validation('start_from'),
			'next_delivery'				=> $this->validation('start_from'),
			'project_agent_id'			=> $this->validation('name'),
			'agent_commission'			=> $this->validation('price'),
    	];

    	if($action == 'edit'){
				$validations['project_name']				= $this->validation('name');
				$validations['project_type']				= $this->validation('type');
				$validations['project_price']				= $this->validation('price');
				$validations['project_duration']			= $this->validation('price');
				$validations['project_start_from']			= $this->validation('start_from');
				$validations['recieved_payment']			= $this->validation('price');
				$validations['payment_method']				= $this->validation('name');
				$validations['next_payment']				= $this->validation('start_from');
				$validations['next_delivery']				= $this->validation('start_from');
				$validations['agent_commission']			= $this->validation('price');
		}

    	$validator = \Validator::make($this->data->all(), $validations,[
    		'user_client_id.required' 		=>  'User Name is required.',
    		'project_name.required' 		=>  'Project Name is required.',
    		'project_type.required'   		=>  'Project Type is required.',
    		'project_price.email'			=>  'Project Price is required.',
    		'project_duration.required'   	=>  'Project Duration is required.',
    		'project_start_from.numeric'    =>  'Project Start Date is required.',
    		'recieved_payment.required'		=>  'Projects Initial Payment is required',
    		'payment_method.required'		=>  'Payment Method is required',
    		'next_payment.required'			=>  'Next Payment date is required',
    		'next_delivery.required'		=>  'Next Delivery date is required',
    		'project_agent_id.required'   	=>  'Agent ID is required.',
    		'agent_commission.required'   	=>  'Agent Commmision is required.',
    	]);
        return $validator;
    }

    public function createProjectPayment()
    {
    	$validations = [
			'recieved_payment'			=> $this->validation('price'),
            'payment_method' 		    => $this->validation('name'),
            'next_payment'				=> $this->validation('start_from'),
            'next_delivery'				=> $this->validation('start_from'),
            'agent_commission'			=> $this->validation('price'),
            'status'					=> $this->validation('name'),
    	];

    	$validator = \Validator::make($this->data->all(), $validations,[
    		'recieved_payment.required' 	=>  'Projects Payment is required',
    		'payment_method.required' 		=>  'Payment Method is required',
    		'next_payment.required'   		=>  'Next Payment date is required',
    		'next_delivery.required'		=>  'Next Delivery date is required',
    		'agent_commission.required'		=>  'Agents Commission date is required',
    		'status.required'				=>  'Status is required',
    	]);
    	return $validator;
    }
}