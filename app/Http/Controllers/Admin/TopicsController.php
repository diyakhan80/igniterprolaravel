<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validations\Validate as Validations;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Topics;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class TopicsController extends Controller
{
    
    public function __construct(Request $request){
        $this->middleware('auth');
        parent::__construct($request);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder){
        $data['site_title'] = $data['page_title'] = 'Topic List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">subject</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.topics.list';
        
        $topics  = _arefy(Topics::where('status','!=','trashed')->get());

        if ($request->ajax()) {
            return DataTables::of($topics)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/topics/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/topics/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['heading'].' status from active to inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a>';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/topics/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['heading'].' status from inactive to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
                }elseif($item['status'] == 'pending'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/topics/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['heading'].' status from pending to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
                }
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
             ->editColumn('heading',function($item){
                return ucfirst($item['heading']);
            })

            ->editColumn('course',function($item){
              
              $course = _arefy(Course::list('single',$item['course_id'])); 
              return ucfirst($course['name']);
            })

            ->editColumn('subject',function($item){

              $subject = _arefy(Subject::list('single',$item['subject_id']));
              return ucfirst($subject['name']);
              })

            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'heading', 'name' => 'heading','title' => 'Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'slug', 'name' => 'slug','title' => 'Slug','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'course', 'name' => 'course','title' => 'Course','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'subject', 'name' => 'subject','title' => 'Subject','orderable' => false, 'width' => 120])
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
        $data['site_title'] = $data['page_title'] = 'Create topics';
        $data['view'] = 'admin/topics/add';
        $data['courses'] = _arefy(Course::list('array'));
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
        //pp($request->all());
        $validation = new Validations($request);
        $validator  = $validation->createTopics();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['heading']            =!empty($request->heading)?$request->heading:'';
            $data['content']        	=!empty($request->content)?$request->content:'';
            $data['course_id']          =!empty($request->course_id)?$request->course_id:'';
            $data['subject_id']         =!empty($request->subject_id)?$request->subject_id:'';
            $data['slug']          		=!empty($request->slug)?$request->slug:'';
            if(!empty($request->topic_picture)){
               $image = $request->file('topic_picture');
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
               $image->move($destinationPath, $input['imagename']);
               $data['topic_picture'] = $input['imagename'];
            }
            $data['status']             = 'active';
            $data['updated_at']         =date('Y-m-d H:i:s');
            $data['created_at']         =date('Y-m-d H:i:s');

         
            $inserId = Topics::add($data);
            if($inserId){
                $this->status = true;
                $this->modal  = true;
                $this->alert    = true;
                $this->message  = "Topics has been added successfully.";
                $this->redirect = url('admin/topics');
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
        $data['site_title'] = $data['page_title'] = 'Edit subject';
        $data['view'] = 'admin.topics.edit';
        $id = ___decrypt($id);
        $data['id'] = $id;
        ///$data['subject'] = _arefy(Subject::list('single',$id));
        $data['topic']  = _arefy(Topics::list('single',$id));
        
        $data['subject'] = _arefy(Subject::list('single',$data['topic']['subject_id']));
        $data['course'] = _arefy(Course::list('single',$data['topic']['course_id']));
        ///$data['courses'] = _arefy(Course::list('array'));
        //dd($data['course']);
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
        $validator  = $validation->createTopics('edit');
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['heading']            =!empty($request->heading)?$request->heading:'';
            $data['content']          =!empty($request->content)?$request->content:'';
            $data['course_id']          =!empty($request->course_id)?$request->course_id:'';
            $data['subject_id']         =!empty($request->subject_id)?$request->subject_id:'';
            $data['slug']             =!empty($request->slug)?$request->slug:'';
            if(!empty($request->topic_picture)){
               $image = $request->file('topic_picture');
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
               $image->move($destinationPath, $input['imagename']);
               $data['topic_picture'] = $input['imagename'];
            }
            $data['status']             = 'active';
            $data['updated_at']         =date('Y-m-d H:i:s');
            $data['created_at']         =date('Y-m-d H:i:s');

         
            $inserId = Topics::change(___decrypt($id),$data);
            if($inserId){
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Topic has been updated successfully.";
                $this->redirect = url('admin/topics');
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
        $validation = new Validations($request);
        $validator = $validation->changeStatus();

        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
            $isUpdated               = Topics::change($request->id,$userData);

            if($isUpdated){
                if($request->status == 'trashed'){
                    $this->message = 'Deleted Subject successfully.';
                }else{
                    $this->message = 'Updated Subject successfully.';
                }
                $this->status = true;
                $this->redirect = true;
                $this->jsondata = [];
            }
        }
       return $this->populateresponse();
    }

    /*public function subjectList(Request $request,$course_id){
		//$course_id = ___decrypt($course_id);
		//$course_id = $this->_stateCountryIDForCountryName($course_id);
		$subject = \DB::table("subject")
		    ->where("course_id",$course_id)
		    ->where("status","active")
		    ->get();
		return json_encode($subject);
    }*/
    public function courseList(Request $request){
       $language = \App::getLocale();
       $where = '';
       if(!empty($request->search)){
           $where .= "name LIKE '%{$request->search}%'";
       }

       $courseList = Course::list(
           'array',
           $where,
           ['name as text', 'id as id']
       );
       return response()->json([
           'results'    => $courseList,
       ]);
   }
   public function subjectList(Request $request){
       $language = \App::getLocale();
       $where = '';
       if(!empty($request->search)){
           $where .= "name LIKE '%{$request->search}%'";
       }
       if(!empty($request->course_id)){
           $where .= "course_id = $request->course_id";
       }

       $courseList = Subject::list(
           'array',
           $where,
           ['name as text', 'id as id']
       );
       return response()->json([
           'results'    => $courseList,
       ]);
   }
}
