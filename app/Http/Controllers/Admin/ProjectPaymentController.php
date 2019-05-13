<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Users;
use App\Models\Agent;
use App\Models\Project;
use App\Models\Projectpayment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Validations\Validate as Validations;

class ProjectPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Request $request){
        $this->middleware('auth');
        parent::__construct($request);
        
    }


    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['site_title'] = $data['page_title'] = 'Project Payment';
        $data['view'] = 'admin/project/projectpayment';
        $where =  "status IN ('pending','delay','ongoing')"; 
        $data['project'] = _arefy(Project::list('array',$where));
       
        return view('admin.home',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createProjectPayment();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['project_id']                 = !empty($request->project_id)?$request->project_id:'';
            $data['recieved_payment']           = !empty($request->recieved_payment)?$request->recieved_payment:'';
            $data['payment_method']             = !empty($request->payment_method)?$request->payment_method:'';
            $data['next_payment']               = !empty($request->next_payment)?$request->next_payment:NULL;
            $data['next_delivery']              = !empty($request->next_delivery)?$request->next_delivery:NULL;
            $data['agent_commission']           = !empty($request->agent_commission)?$request->agent_commission:NULL;
            $data['status']                     = !empty($request->status)?$request->status:'';
            $data['created_at']                 =  date('Y-m-d H:i:s');
            $data['updated_at']                 =  date('Y-m-d H:i:s');
            
            $projectpayment = Projectpayment::add($data);
        
        if($projectpayment){
                $this->status = true;
                $this->modal  = true;
                $this->alert    = true;
                $this->message  = "Project Payment has been added successfully.";
                $this->redirect = url('admin/project');
            }
        }
        return $this->populateresponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
