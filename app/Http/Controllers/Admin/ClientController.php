<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validations\Validate as Validations;
use App\Models\Client;
use App\Models\Users;
use File;
use Hash;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class ClientController extends Controller
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

    public function index(Request $request, Builder $builder){
        $data['site_title'] = $data['page_title'] = 'Clients List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Clients</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.clients.list';
        \DB::Statement(\DB::raw('set @rownum=0'));
        $clients  = Client::where('status','!=','trashed')->get(['clients.*', 
                    \DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
                $clients = _arefy($clients);
        if ($request->ajax()) {
            return DataTables::of($clients)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/clients/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/clients/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from active to inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a> ';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/clients/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from inactive to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> ';
                }elseif($item['status'] == 'pending'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/clients/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from pending to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> ';
                }
                $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/clients/status/?id=%s&status=trashed',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to delete '.$item['name'].'?" title="Update Status"><i class="fa fa-fw fa-trash"></i></a> ';
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
             ->editColumn('name',function($item){
                return ucfirst($item['name']);
            })
            ->editColumn('mobile_number',function($item){
                return $item['phone_code'].'-'.$item['mobile_number'];
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'rownum', 'name' => 'rownum','title' => 'S No','orderable' => false, 'width' => 10])
            ->addColumn(['data' => 'name', 'name' => 'name','title' => 'Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'email', 'name' => 'email','title' => 'Email','orderable' => false, 'width' => 120])
              ->addColumn(['data' => 'mobile_number', 'name' => 'mobile_number','title' => 'Mobile Number','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => '', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['site_title'] = $data['page_title'] = 'Create Client';
        $data['view'] = 'admin/clients/add';
        return view('admin.home',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation = new Validations($request);
        $validator  = $validation->createClient();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']        =!empty($request->name)?$request->name:'';
            $data['email']        =!empty($request->email)?$request->email:'';
            $data['phone_code']        =!empty($request->phone_code)?$request->phone_code:'';
            $data['mobile_number']        =!empty($request->mobile_number)?$request->mobile_number:'';
            $data['status']             = 'active';
            $data['updated_at']         =date('Y-m-d H:i:s');
            $data['created_at']         =date('Y-m-d H:i:s');

            $users_data['name']         =!empty($request->name)?$request->name:'';
            $users_data['password']     =!empty($request->password)?(Hash::make($request->password)):'';
            $users_data['email']        =!empty($request->email)?$request->email:'';
            $users_data['phone_code']        =!empty($request->phone_code)?$request->phone_code:'';
            $users_data['mobile_number']        =!empty($request->mobile_number)?$request->mobile_number:'';
            $users_data['status']             = 'active';
            $users_data['type']             = 'client';
            $users_data['updated_at']         =date('Y-m-d H:i:s');
            $users_data['created_at']         =date('Y-m-d H:i:s');
         
            $inserId = Client::add($data);
            $inserUserId = Users::add($users_data);

            if($inserId && $inserUserId){
                $this->status = true;
                $this->modal  = true;
                $this->alert    = true;
                $this->message  = "Client has been added successfully.";
                $this->redirect = url('admin/clients');
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
         
        $data['site_title'] = $data['page_title'] = 'Edit Client';
        $data['view'] = 'admin.clients.edit';
        $id = ___decrypt($id);
        $data['client'] = _arefy(Client::list('single','id='.$id));

        return view('admin.home',$data);
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
        $id = ___decrypt($id);
        $request->request->add(['id'=>$id]);
        $validation = new Validations($request);
        
        $validator  = $validation->createClient('edit');
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']        =!empty($request->name)?$request->name:'';
            $data['email']        =!empty($request->email)?$request->email:'';
            $data['phone_code']        =!empty($request->phone_code)?$request->phone_code:'';
            $data['mobile_number']        =!empty($request->mobile_number)?$request->mobile_number:'';
            $data['status']             = 'active';
            $data['updated_at']         =date('Y-m-d H:i:s');
            $data['created_at']         =date('Y-m-d H:i:s');

            $users_data['name']         =!empty($request->name)?$request->name:'';
            /*$users_data['password']     =!empty($request->password)?(Hash::make($request->password)):'';*/
            $users_data['email']        =!empty($request->email)?$request->email:'';
            $users_data['phone_code']        =!empty($request->phone_code)?$request->phone_code:'';
            $users_data['mobile_number']        =!empty($request->mobile_number)?$request->mobile_number:'';
            $users_data['updated_at']         =date('Y-m-d H:i:s');
            $inserId = Client::change(___decrypt($id),$data);
            $inserUserId = Users::change(___decrypt($id),$data);
         
            if($inserId && $inserUserId){
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Client has been updated successfully.";
                $this->redirect = url('admin/clients');
            } 
        } 
        return $this->populateresponse();
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

    public function changeStatus(Request $request){
            $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
            $isUpdated               = Client::change($request->id,$userData);

            if($isUpdated){
                if($request->status == 'trashed'){
                    $this->message = 'Deleted Client successfully.';
                }else{
                    $this->message = 'Updated Client successfully.';
                }
                $this->status = true;
                $this->redirect = true;
                $this->jsondata = [];
            }
       return $this->populateresponse();
    }
}
