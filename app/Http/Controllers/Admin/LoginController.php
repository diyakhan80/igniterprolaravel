<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validations\Validate as Validations;
class LoginController extends Controller
{
	 public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function login(){
    	$data['view'] = 'admin.login';
    	return view('admin.login',$data);
        
    }

    public function authentication(Request $request){
    	$validation = new Validations($request);
        $validator  = $validation->login();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
			
			// Dump data
			//dd($credentials);

			 if (\Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
                // Success
        		$this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Login Successfull!";
                $this->redirect = url('admin/home');
			}
			else{
	                $this->message  =  $validator->errors()->add('not_exists', 'User Email or Password is Incorrect.');
	            } 
		return $this->populateresponse();
    	}
}

    public function logout(Request $request) {
          \Auth::logout();
          return redirect('admin/login');
    }  
}
