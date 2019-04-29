<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validations\Validate as Validations;
use App\Models\Course;
use File;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class CourseController extends Controller
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
        $data['site_title'] = $data['page_title'] = 'Course List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Courses</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.courses.list';
        
        $courses  = _arefy(Course::where('status','=','active')->get());
        if ($request->ajax()) {
            return DataTables::of($courses)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/courses/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/courses/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['course_name'].' status from active to inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a> ';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/courses/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['course_name'].' status from inactive to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> ';
                }elseif($item['status'] == 'pending'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/courses/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['course_name'].' status from pending to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> ';
                }
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
             ->editColumn('course_name',function($item){
                return ucfirst($item['course_name']);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'course_name', 'name' => 'course_name','title' => 'Course Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'description', 'name' => 'description','title' => 'Description','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => '', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     /**/
    public function create(Request $request){
        $data['site_title'] = $data['page_title'] = 'Create Course';
        $data['view'] = 'admin/courses/add';
        return view('admin.home',$data);
    }
    
    public function store(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createCourse();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['course_name']        =!empty($request->course_name)?$request->course_name:'';
            $data['description']        =!empty($request->description)?$request->description:'';
            
            if(!empty($request->course_picture)){
             $image = $request->file('course_picture');
               $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
               $path = public_path().'/uploads/course';
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true);
                }

               $destinationPath = public_path('uploads/course');
               $img = Image::make($image->getRealPath());
               $img->resize(264, 337, function ($constraint) {
                   $constraint->aspectRatio();
               })->save($destinationPath . '/' . $input['imagename']);

               $destinationPath = public_path('images/image');
               $image->move($destinationPath, $input['imagename']);
               $data['course_picture'] = $input['imagename'];
            }

            // if ($file = $request->file('course_picture')){
            //     $photo_name = time().$request->file('course_picture')->getClientOriginalName();
            //     $file->move('uploads/course',$photo_name);
            //     $data['course_picture'] = $photo_name;
            // }

            $data['status']             = 'pending';
            $data['updated_at']         =date('Y-m-d H:i:s');
            $data['created_at']         =date('Y-m-d H:i:s');

         
            $inserId = Course::add($data);

            if($inserId){
                $this->status = true;
                $this->modal  = true;
                $this->alert    = true;
                $this->message  = "Course has been added successfully.";
                $this->redirect = url('admin/courses');
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
    public function edit(Request $request,$id)
    {   
        $data['site_title'] = $data['page_title'] = 'Edit Course';
        $data['view'] = 'admin.courses.edit';
        $id = ___decrypt($id);
        $data['course'] = _arefy(Course::list('single','id='.$id));
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
        $validator  = $validation->createCourse('edit');
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['course_name']        =!empty($request->course_name)?$request->course_name:'';
            $data['description']        =!empty($request->description)?$request->description:'';
            if(!empty($request->course_picture)){
             $image = $request->file('course_picture');
               $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
               $path = public_path().'/uploads/course';
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true);
                }

               $destinationPath = public_path('uploads/course');
               $img = Image::make($image->getRealPath());
               $img->resize(264, 337, function ($constraint) {
                   $constraint->aspectRatio();
               })->save($destinationPath . '/' . $input['imagename']);

               $destinationPath = public_path('images/image');
               $image->move($destinationPath, $input['imagename']);
               $data['course_picture'] = $input['imagename'];
            }
            $data['updated_at']         = date('Y-m-d H:i:s');
            $data['created_at']         = date('Y-m-d H:i:s');

         
            $inserId = Course::change(___decrypt($id),$data);
            if($inserId){
                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Course has been updated successfully.";
                $this->redirect = url('admin/courses');
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
            $isUpdated               = Course::change($request->id,$userData);

            if($isUpdated){
                if($request->status == 'trashed'){
                    $this->message = 'Deleted Doctor successfully.';
                }else{
                    $this->message = 'Updated Doctor successfully.';
                }
                $this->status = true;
                $this->redirect = true;
                $this->jsondata = [];
            }
       return $this->populateresponse();
    }
}
