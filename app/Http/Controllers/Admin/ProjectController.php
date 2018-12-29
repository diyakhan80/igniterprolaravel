<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Users;
use App\Models\Agent;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Validations\Validate as Validations;
use Intervention\Image\ImageManagerStatic as Image;

class ProjectController extends Controller
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
        $data['site_title'] = $data['page_title'] = 'Projects List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">project</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.project.list';
        
        $project  = _arefy(Project::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($project)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/project/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/project/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['project_name'].' status from active to inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a>';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/project/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['project_name'].' status from inactive to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
                }elseif($item['status'] == 'pending'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/project/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['project_name'].' status from pending to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
                }
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
             ->editColumn('name',function($item){
                return ucfirst($item['project_name']);
            })
              ->editColumn('project_duration',function($item){
                return ucfirst($item['project_duration']).' days';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'name', 'name' => 'name','title' => 'Project Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'project_price', 'name' => 'project_price','title' => 'Project Price','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'project_duration','name' => 'project_duration','title' => 'Project Duration','orderable' => false, 'width' => 120])
            ->addAction(['title' => '', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     /**/
    public function create(Request $request){
        $data['site_title'] = $data['page_title'] = 'Create Project';
        $data['view'] = 'admin/project/add';
        $data['user']  = _arefy(Users::where('status','!=','trashed')->where('type','=','client')->get());
        $data['agent']  = _arefy(Agent::where('status','!=','trashed')->get());
        return view('admin.home',$data);
    }
    
    public function store(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createProject();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
        	$data['user_client_id']             = !empty($request->user_client_id)?$request->user_client_id:'';
            $data['project_name']               = !empty($request->project_name)?$request->project_name:'';
            $data['project_type']              	= !empty($request->project_type)?$request->project_type:'';
            $data['project_price']      		= !empty($request->project_price)?$request->project_price:'';
            $data['project_duration']         	= !empty($request->project_duration)?$request->project_duration:'';
            $data['project_start_from']         = !empty($request->project_start_from)?$request->project_start_from:'';
            $data['project_agent_id']         	= !empty($request->project_agent_id)?$request->project_agent_id:'';
            $data['agent_commission']         	= !empty($request->agent_commission)?$request->agent_commission:'';
            $data['status']						= 'pending';
            $data['created_at']     	    	=date('Y-m-d H:i:s');
            $data['updated_at']         		=date('Y-m-d H:i:s');

            $inserId = Project::add($data);
         
            if($inserId){
                $this->status = true;
                $this->modal  = true;
                $this->alert    = true;
                $this->message  = "Project has been added successfully.";
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
/*    public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $data['site_title'] = $data['page_title'] = 'Edit Project';
        $data['view'] = 'admin.project.edit';
        $id = ___decrypt($id);
        $data['user']  = _arefy(Users::where('status','!=','trashed')->where('type','=','client')->get());
        $data['project'] = _arefy(Project::list('single','id='.$id));
        $data['agent']  = _arefy(Agent::where('status','!=','trashed')->get());
       // dd($data['agent']);
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
        $validation = new Validations($request);
        $validator  = $validation->createProject('edit');
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['user_client_id']             = !empty($request->user_client_id)?$request->user_client_id:'';
            $data['project_name']               = !empty($request->project_name)?$request->project_name:'';
            $data['project_type']              	= !empty($request->project_type)?$request->project_type:'';
            $data['project_price']      		= !empty($request->project_price)?$request->project_price:'';
            $data['project_duration']         	= !empty($request->project_duration)?$request->project_duration:'';
            $data['project_start_from']         = !empty($request->project_start_from)?$request->project_start_from:'';
            $data['project_agent_id']         	= !empty($request->project_agent_id)?$request->project_agent_id:'';
            $data['agent_commission']         	= !empty($request->agent_commission)?$request->agent_commission:'';
            $data['updated_at']         		= date('Y-m-d H:i:s');

            $inserId = Project::change(___decrypt($id),$data);
         
            if($inserId){
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Project has been updated successfully.";
                $this->redirect = url('admin/project');
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
 /*   public function destroy($id)
    {
        //
    }*/

    public function changeStatus(Request $request){
        $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
        $isUpdated               = Agent::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Doctor successfully.';
            }else{
                $this->message = 'Updated Doctor successfully.';
            }
            $this->status = true;
            $this->redirect = true;
        }
     return $this->populateresponse();
    }
}