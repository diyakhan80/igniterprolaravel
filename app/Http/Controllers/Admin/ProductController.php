<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validations\Validate as Validations;

class ProductController extends Controller
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
        $data['site_title'] = $data['page_title'] = 'Products List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Products</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.products.list';
        
        $products  = _arefy(Products::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($products)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/products/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/products/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from active to inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a> ';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/products/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from inactive to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> ';
                }elseif($item['status'] == 'pending'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/products/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from pending to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> ';
                }
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
            ->editColumn('name',function($item){
                return ucfirst($item['name']);
            })
            ->editColumn('type',function($item){
                return ucfirst($item['type']);
            })
            ->editColumn('image',function($item){
                if (!empty($item['image'])) {
                    $imageurl = asset("images/Products/".$item['image']);
                    return '<img src="'.$imageurl.'" height="80px" width="90px">';
                }else{
                    $imageurl = asset("images/avatar.png");
                    return '<img src="'.$imageurl.'" height="80px" width="80px">';
                }
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'image', 'name' => 'image',"render"=> 'data','title' => 'Product Image','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'name', 'name' => 'name','title' => 'Product Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'url', 'name' => 'url','title' => 'URL','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'type', 'name' => 'type','title' => 'Type','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'slug', 'name' => 'slug','title' => 'Slug','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['site_title'] = $data['page_title'] = 'Create Product';
        $data['view'] = 'admin/products/add';
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
        $validator  = $validation->createProduct();
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $product = new Products();
            $product->fill($request->all());

            if ($file = $request->file('image')){
                $photo_name = time().$request->file('image')->getClientOriginalName();
                $file->move('images/Products',$photo_name);
                $product['image'] = $photo_name;
            }
            $product->save();

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Product has been Added successfully.";
            $this->redirect = url('admin/products');
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
        $data['site_title'] = $data['page_title'] = 'Edit Products';
        $data['view'] = 'admin.products.edit';
        $id = ___decrypt($id);
        $data['products'] = _arefy(Products::where('id',$id)->first());
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
        $validation = new Validations($request);
        $validator  = $validation->createProduct('edit');
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }
        else{
            $products = Products::findOrFail($id);
            $data = $request->all();

            if ($file = $request->file('image')){
                $photo_name = time().$request->file('image')->getClientOriginalName();
                $file->move('images/Products',$photo_name);
                $data['image'] = $photo_name;
            }
            $products->update($data);

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Product has been Updated successfully.";
            $this->redirect = url('admin/products');
        }
        return $this->populateresponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request){
        $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
        $isUpdated               = Products::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Product successfully.';
            }else{
                $this->message = 'Updated Product successfully.';
            }
            $this->status = true;
            $this->redirect = true;
        }
     return $this->populateresponse();
    }
}
