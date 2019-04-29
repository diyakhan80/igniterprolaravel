<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialMedia;
use App\Models\Review;
use App\Models\ContactAddress;
use App\Models\StaticPages;
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

    public function contactAddressList(Request $request, Builder $builder){
        $data['site_title'] = $data['page_title'] = 'Contact Address List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Contact Address</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.contactaddress.list';
        
        $contactaddress  = _arefy(ContactAddress::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($contactaddress)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/contact/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> ';
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
            ->editColumn('phone',function($item){
                return '+91-'.$item['phone'];
            })
            ->editColumn('whatsapp',function($item){
                if (!empty($item['whatsapp'])) {
                    return '+91-'.$item['whatsapp'];
                }else{
                    return 'N/A';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'address', 'name' => 'address','title' => 'Office Address','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'email', 'name' => 'email','title' => 'E-mail','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'phone', 'name' => 'phone','title' => 'Contact Number','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'whatsapp', 'name' => 'whatsapp','title' => 'Whatsapp Number','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => '', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    public function reviewsList(Request $request, Builder $builder){
        $data['site_title'] = $data['page_title'] = 'Reviews List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Reviews</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.reviews.list';
        
        $reviews  = _arefy(\Models\Review::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($reviews)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                if($item['status'] == 'pending'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/reviews/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from pending to active?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a> |';
                }elseif($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/reviews/status/?id=%s&status=pending',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from active to pending?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> |';
                }
                $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/reviews/status/?id=%s&status=trashed',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('images/delete.png').'"
                        data-ask="Would you like to Delete?" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
            ->editColumn('name',function($item){
                return ucfirst($item['name']);
            })
            ->editColumn('comments',function($item){
                return str_limit($item['comments'],100);
            })
            ->editColumn('phone',function($item){
                return '+91-'.$item['phone'];
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'name', 'name' => 'name','title' => 'Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'email', 'name' => 'email','title' => 'E-mail','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'phone', 'name' => 'phone','title' => 'Contact Number','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'comments', 'name' => 'comments','title' => 'Comments','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    public function staticPagesList(Request $request, Builder $builder){
        $data['site_title'] = $data['page_title'] = 'Static Pages List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Static Pages</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.static.list';
        
        $staticPages  = _arefy(StaticPages::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($staticPages)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/static/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> ';
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
            ->editColumn('title',function($item){
                return ucfirst($item['title']);
            })
            ->editColumn('description',function($item){
                return str_limit($item['description'],100);
            })
            ->editColumn('slug',function($item){
                return $item['slug'];
            })
            ->editColumn('image',function($item){
                if(!empty($item['image'])){
                    $imageurl = asset("images/staticpage/".$item['image']);
                    return '<img src="'.$imageurl.'" height="70px" width="100px">';
                }else{
                    $imageurl = asset("images/avatar.png");
                    return '<img src="'.$imageurl.'" height="70px" width="100px">';
                }
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'image', 'name' => 'image',"render"=> 'data','title' => 'Image','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'title', 'name' => 'title','title' => 'Title','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'slug', 'name' => 'slug','title' => 'Slug','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'description', 'name' => 'description','title' => 'Description','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
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

    public function editcontactAddress(Request $request,$id)
    {   
        $data['site_title'] = $data['page_title'] = 'Edit Contact Address';
        $data['view'] = 'admin.contactaddress.edit';
        $id = ___decrypt($id);
        $data['contact'] = _arefy(ContactAddress::where('id',$id)->first());
        return view('admin.home',$data);
    }

    public function editStaticPages(Request $request,$id)
    {   
        $data['site_title'] = $data['page_title'] = 'Edit Static Pages';
        $data['view'] = 'admin.static.edit';
        $id = ___decrypt($id);
        $data['static'] = _arefy(StaticPages::where('id',$id)->first());
        return view('admin.home',$data);
    }

    public function staticPagesEdit(Request $request, $id){
      $id = ___decrypt($id);
      $validation = new Validations($request);
      $validator  = $validation->staticpage('edit');
      if ($validator->fails()) {
          $this->message = $validator->errors();
      }else{
          $staticpage = StaticPages::findOrFail($id);
          $input = $request->all();

          if ($file = $request->file('image')){
            $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
            $file->move('images/staticpage',$photo_name);
            $input['image'] = $photo_name;
          }

          $staticpage->update($input);

          $this->status   = true;
          $this->modal    = true;
          $this->alert    = true;
          $this->message  = "Static Page has been Updated successfully.";
          $this->redirect = url('admin/static');
      }
      return $this->populateresponse();
    }

    public function contactAddressEdit(Request $request, $id)
    {
        $id = ___decrypt($id);
        $validation = new Validations($request);
        $validator  = $validation->contactAddress('edit');
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $contactAddress = ContactAddress::findOrFail($id);
            $data = $request->all();

            $contactAddress->update($data);

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Contact Address has been Updated successfully.";
            $this->redirect = url('admin/contact');
        }
        return $this->populateresponse();
    }

    public function changeStatus(Request $request){
        $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
        $isUpdated               = \Models\Review::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Reviews successfully.';
            }else{
                $this->message = 'Updated Reviews successfully.';
            }
            $this->status = true;
            $this->redirect = true;
        }
     return $this->populateresponse();
    }
}
