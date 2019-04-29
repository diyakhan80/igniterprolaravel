<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validations\Validate as Validations;

class SocialMediaController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('auth');
        parent::__construct($request);
        
    }

    public function socialMediaList(Request $request, Builder $builder){
        $data['site_title'] = $data['page_title'] = 'Social Media List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Social Media</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.socialmedia.list';
        
        $socialmedia  = _arefy(SocialMedia::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($socialmedia)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/social/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> ';
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'url', 'name' => 'url','title' => 'URL','orderable' => false, 'width' => 120])
            // ->addColumn(['data' => 'description', 'name' => 'description','title' => 'Description','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => '', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    public function editSocialMedia(Request $request,$id)
    {   
        $data['site_title'] = $data['page_title'] = 'Edit Social Media';
        $data['view'] = 'admin.socialmedia.edit';
        $id = ___decrypt($id);
        $data['social'] = _arefy(SocialMedia::where('id',$id)->first());
        return view('admin.home',$data);
    }

    public function socialMediaEdit(Request $request, $id)
    {
        $id = ___decrypt($id);
        $validation = new Validations($request);
        $validator  = $validation->socialMedia();
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }
        else{
            $socialMedia = SocialMedia::findOrFail($id);
            $data = $request->all();

            $socialMedia->update($data);

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Social Media has been Updated successfully.";
            $this->redirect = url('admin/social');
        }
        return $this->populateresponse();
    }
}
