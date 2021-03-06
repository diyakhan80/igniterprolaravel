<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Users;
use App\Models\Agent;
use App\Models\Client;
use App\Models\Project;
use App\Models\Projectpayment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Validations\Validate as Validations;
use Intervention\Image\ImageManagerStatic as Image;
use PDF;
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
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Projects</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.project.list';
        $where = 'status != "trashed"';
        $project  = _arefy(Project::list('array',$where));
        // dd($project);
        if ($request->ajax()) {
            return DataTables::of($project)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/project/list/%s',___encrypt($item['id']))).'"  title="Project Payment List"><i class="fa fa-cc-visa"></i></a> | ';
                if ($item['balance'] != 0) {
                    $html   .= '<a href="'.url(sprintf('admin/project/payment/%s',___encrypt($item['id']))).'"  title="Make Payment"><i class="fa fa-money"></i></a> | ';
                }
                $html   .= '<a href="'.url(sprintf('admin/project/%s',___encrypt($item['id']))).'"  title="View Detail"><i class="fa fa-eye"></i></a> | ';
                $html   .= '<a href="'.url(sprintf('admin/project/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                if($item['status'] == 'ongoing'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/project/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['project_name'].' status from ongoing to completed?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a>';
                }elseif($item['status'] == 'completed'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/project/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['project_name'].' status from completed to delay?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
                }elseif($item['status'] == 'pending'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/project/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['project_name'].' status from pending to ongoing?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
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
            ->editColumn('client',function($item){
                return ucfirst($item['client']['name']);
            })
            ->editColumn('agent',function($item){
                if(!empty($item['agent']['name'])){
                    return ucfirst($item['agent']['name']);
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('email',function($item){
                return $item['client']['email'];
            })
            ->editColumn('project_price',function($item){
                return 'Rs.'. IND_money_format($item['project_price']);
            })
            ->editColumn('balance',function($item){
                return 'Rs.'. IND_money_format($item['balance']);
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
            ->addColumn(['data' => 'client', 'name' => 'name','title' => 'Client Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'email', 'name' => 'email','title' => 'Client E-mail','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'name', 'name' => 'name','title' => 'Project Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'project_type', 'name' => 'project_type','title' => 'Project Type','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'project_price', 'name' => 'project_price','title' => 'Project Price','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'balance', 'name' => 'balance','title' => 'Balance','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'project_duration','name' => 'project_duration','title' => 'Project Duration','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'agent', 'name' => 'name','title' => 'Agent Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'agent_total_recieved_amount', 'name' => 'agent_total_recieved_amount','title' => 'Agent Recieved Amount','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    public function paymentList(Request $request, Builder $builder,$id){
        $data['site_title'] = $data['page_title'] = 'Projects Payment List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Project Payment</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.project.paymentlist';
        $id = ___decrypt($id);
        $projectPayment  = _arefy(Projectpayment::where('project_id',$id)->get());
        // dd($projectPayment);
        if ($request->ajax()) {
            return DataTables::of($projectPayment)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/project-payment/invoice/%s',___encrypt($item['id']))).'"  title="Project Payment List"><i class="fa fa-cc-visa"></i></a>';
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
            ->editColumn('payment_method',function($item){
                return ucfirst($item['payment_method']);
            })
            ->editColumn('recieved_payment',function($item){
                return 'Rs.'.IND_money_format($item['recieved_payment']);
            })
            ->editColumn('agent_commission',function($item){
              if (!empty($item['agent_commission'])) {
                  return 'Rs.'.IND_money_format($item['agent_commission']);
              }else{
                  return 'N/A';
                }
            })
            ->editColumn('balance',function($item){
                return 'Rs.'.IND_money_format($item['balance']);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'recieved_payment', 'name' => 'recieved_payment','title' => 'Recieved Payment','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'balance', 'name' => 'balance','title' => 'Balance Amount','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'payment_method', 'name' => 'payment_method','title' => 'Payment Method','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'agent_commission', 'name' => 'agent_commission','title' => 'Agent Commission','orderable' => false, 'width' => 120])
            
            ->addColumn(['data' => 'status', 'name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    public function projectInvoice(Request $request,$id){
        $id = ___decrypt($id);
        $where =  "id = ".$id;
        $data['projectpayment']=Projectpayment::list('single',$where);
        //$data['client']=Projectpayment::list('single',$where);

        //dd(_arefy($data['projectpayment']));

        //$data['view']='admin.project.invoice';
        return view('admin.project.invoice')->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     /**/
    public function create(Request $request){
        $data['site_title'] = $data['page_title'] = 'Create Project';
        $data['view'] = 'admin/project/add';
        $data['clients']  = _arefy(Client::where('status','!=','trashed')->get());
        $data['agent']  = _arefy(Agent::where('status','!=','trashed')->get());
        return view('admin.home',$data);
    }
    
    public function store(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createProject();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
        	$data['client_id']                  = !empty($request->client_id)?$request->client_id:'';
            $data['project_name']               = !empty($request->project_name)?$request->project_name:'';
            $data['project_type']              	= !empty($request->project_type)?$request->project_type:'';
            $data['project_price']      		= !empty($request->project_price)?$request->project_price:'';
            $data['balance']                    = $data['project_price'] - $request->recieved_payment;
            $data['project_duration']         	= !empty($request->project_duration)?$request->project_duration:'';
            $data['project_start_from']         = !empty($request->project_start_from)?$request->project_start_from:'';
            $data['project_agent_id']         	= !empty($request->project_agent_id)?$request->project_agent_id:NULL;
            $data['agent_commission']         	= !empty($request->agent_commission)?$request->agent_commission:NULL;
            $data['created_at']     	    	= date('Y-m-d H:i:s');
            $data['updated_at']         		= date('Y-m-d H:i:s');
            if ($request->recieved_payment > 0) {
                $data['status'] = 'ongoing';
            }else {
                $data['status'] = 'pending';
            }
            $inserId = Project::add($data);

            $payment['project_id']              = $inserId;
            $payment['recieved_payment']        = !empty($request->recieved_payment)?$request->recieved_payment:'';
            $payment['payment_method']          = !empty($request->payment_method)?$request->payment_method:'';
            $payment['next_payment']            = !empty($request->next_payment)?$request->next_payment:'';
            $payment['next_delivery']           = !empty($request->next_delivery)?$request->next_delivery:'';
            $payment['agent_commission']        = !empty($request->agent_commission)?$request->agent_commission:NULL;
            $payment['status']                  = 'pending';
            $payment['created_at']              = date('Y-m-d H:i:s');
            $payment['updated_at']              = date('Y-m-d H:i:s');
            $payment['balance']                 = $data['project_price'] - $payment['recieved_payment'];

            $paymentstore = Projectpayment::add($payment);
         
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
        $data['site_title']      = $data['page_title'] = 'Edit Project';
        $data['view']            = 'admin.project.edit';
        $id = ___decrypt($id);
        $data['client']            = _arefy(Client::where('status','!=','trashed')->get());
        $data['project']         = _arefy(Project::list('single','id='.$id));
        $data['agent']           = _arefy(Agent::where('status','!=','trashed')->get());
        return view('admin.home',$data);
    }

    public function show($id)
    {  
        $data['site_title'] = $data['page_title'] = 'View Project';
        $data['view'] = 'admin.project.view';
        $id = ___decrypt($id);
        $data['project'] = _arefy(Project::list('single','id='.$id));
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
            $data['client_id']                  = !empty($request->client_id)?$request->client_id:'';
            $data['project_name']               = !empty($request->project_name)?$request->project_name:'';
            $data['project_type']              	= !empty($request->project_type)?$request->project_type:'';
            $data['project_price']      		= !empty($request->project_price)?$request->project_price:'';
            $data['project_duration']         	= !empty($request->project_duration)?$request->project_duration:'';
            $data['project_start_from']         = !empty($request->project_start_from)?$request->project_start_from:'';
            $data['project_agent_id']         	= !empty($request->project_agent_id)?$request->project_agent_id:NULL;
            $data['agent_commission']         	= !empty($request->agent_commission)?$request->agent_commission:NULL;
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

    public function export_pdf($id)
    {
        $id=___decrypt($id);
        // Fetch all customers from database
        $data['site_title'] = $data['page_title'] = 'View Project';
        $data['project'] = _arefy(Project::list('single','id='.$id));

       /* return view('admin.home',$data);
        // Send data to the view using loadView function of PDF facade*/
        $pdf = PDF::loadView('admin.project.view',$data);
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('customers.pdf');
    }

    public function makePayment(Request $request,$id){
        $id = ___decrypt($id);
        $data['site_title'] = $data['page_title'] = 'Project Payment';
        $data['view'] = 'admin/project/projectpayment';
        $where =  "id = ".$id;
        $wheres=  "project_id = ".$id;
        $data['projectPayment'] = _arefy(Project::list('single',$where));
        $data['agentPayment'] = _arefy(projectPayment::list('array',$wheres));
         //d($data['agentPayment']);
        $data['totalAgentCommission']=0;
         foreach ($data['agentPayment'] as $key) {
             $data['totalAgentCommission']+=$key['agent_commission'];
         }
        return view('admin.home',$data);
    }

    public function paymentDone(Request $request,$id){
        // dd($request->all());
        $id = ___decrypt($id);
        $validation = new Validations($request);
        $validator  = $validation->createProjectPayment();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['project_id']                 = !empty($request->id)?$request->id:'';
            $data['recieved_payment']           = !empty($request->recieved_payment)?$request->recieved_payment:'';
            $data['payment_method']             = !empty($request->payment_method)?$request->payment_method:'';
            $data['next_payment']               = !empty($request->next_payment)?$request->next_payment:NULL;
            $data['next_delivery']              = !empty($request->next_delivery)?$request->next_delivery:NULL;
            $data['agent_commission']           = !empty($request->agent_commission)?$request->agent_commission:NULL;
            $data['created_at']                 =  date('Y-m-d H:i:s');
            $data['updated_at']                 =  date('Y-m-d H:i:s');
            $data['balance']                    =  $request->balance - $request->recieved_payment;
            if ($data['balance'] != 0) {
              $data['status'] = 'pending';
            }else{
              $data['status'] = 'paid';
            }
            
            $projectpayment = Projectpayment::add($data);

            $lastId = $data['project_id'];
            $projectId['balance'] = $data['balance'];
            $projectId['agent_total_recieved_amount']=$request->total_agent_amount+$request->agent_commission;
            $projectData = Project::change($lastId,$projectId);

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
}