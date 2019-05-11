<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validations\Validate as Validations;

class ProductDetailController extends Controller
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
        $data['site_title'] = $data['page_title'] = 'Products Details List';
        $data['breadcrumb'] = '<ul class="page-breadcrumb breadcrumb"><li><a href="">Home</a><i class="fa fa-circle"></i></li><li><a href="#">Products Details</a><i class="fa fa-circle"></i></li><li><a href="#">List</a></li></ul>';
        $data['view'] = 'admin.productDetail.list';
        
        $where = 'status != "trashed"';
        $productsDetail  = _arefy(ProductDetail::list('array',$where));
        // dd($productsDetail);
        if ($request->ajax()) {
            return DataTables::of($productsDetail)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/productsdetail/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/productsdetail/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change status from active to inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a> ';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/productsdetail/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change status from inactive to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> ';
                }elseif($item['status'] == 'pending'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/productsdetail/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change status from pending to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> ';
                }
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
            ->editColumn('product_id',function($item){
                return ucfirst($item['product']['name']);
            })
            ->editColumn('type',function($item){
                return ucfirst($item['type']);
            })
            ->editColumn('username',function($item){
                return ucfirst($item['username']);
            })
            ->editColumn('image',function($item){
                if (!empty($item['product']['image'])) {
                    $imageurl = asset("images/Products/".$item['product']['image']);
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
            ->addColumn(['data' => 'product_id', 'name' => 'product_id','title' => 'Product Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'url', 'name' => 'url','title' => 'URL','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'username', 'name' => 'username','title' => 'Username','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'password', 'name' => 'password','title' => 'Password','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'type', 'name' => 'type','title' => 'Type','orderable' => false, 'width' => 120])
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
        $data['site_title'] = $data['page_title'] = 'Create Product Details';
        $data['view'] = 'admin/productDetail/add';
        $data['product'] = _arefy(Products::where('status','active')->get());
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
        $validator  = $validation->createProductDetail();
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $productdetail = new ProductDetail();
            $productdetail->fill($request->all());

            $productdetail->save();

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Product Detail has been Added successfully.";
            $this->redirect = url('admin/productsdetail');
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
        $data['site_title'] = $data['page_title'] = 'Edit Product Details';
        $data['view'] = 'admin/productDetail/edit';
        $id = ___decrypt($id);
        $where = ' id = '.$id;
        $data['productDetails'] = _arefy(ProductDetail::list('single',$where));
        $data['product'] = _arefy(Products::where('status','=','active')->get());
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
        $validator  = $validation->createProductDetail();
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }
        else{
            $productsDetails = ProductDetail::findOrFail($id);
            $data = $request->all();

            $productsDetails->update($data);

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Product Details has been Updated successfully.";
            $this->redirect = url('admin/productsdetail');
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
        $isUpdated               = ProductDetail::change($request->id,$userData);

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
