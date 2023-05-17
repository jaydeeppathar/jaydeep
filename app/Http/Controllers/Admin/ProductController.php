<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use DataTables; 
use Str; 

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('*');
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('category', function($row){
                        info($row->category->name);
                    return $row->category->name;
                    })
                
                ->addColumn('subcategory', function($row){
                        return $row->subcategory->sub_category_name;
                    })

                ->addColumn('image', function($row){
                    $url= asset('upload/product/'.$row->image);
                    $image = '<img src="'.$url.' " width="130" height="90" " class="" align="center" />';
                    return $image;
                })

                ->addColumn('status',function($row){
                     if ($row->status == 0) {
                         $status = '<label class="badge badge-danger" style="background-color:red;">Deactive</label>';
                     }elseif ($row->status == 1) {
                         $status = '<label class="badge badge-success" style="background-color:green;">Active</label>';
                    }
                     return $status;
                })


               ->addColumn('action',function($row){
                    $btn = '';
                        $btn = '<a href="'.route('product.show',[$row->id]).'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Show"><i class="fa fa-eye"></i></a>';
                        $btn = $btn.' <a href="'. route('product.edit',[$row->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
                        $btn = $btn.' <button class="btn btn-danger btn-flat btn-sm remove-crud" data-id="'. $row->id .'" data-action="'. route('product.destroy',$row->id) .'"  data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <i class="fa fa-trash"></i></button>';

                        // $btn = $btn.' <a href="'. route('leave.list',[$row->id]) .'" class="btn btn-warning btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit">Show leave</a>';
                    return $btn;    
                })

                ->rawColumns(['action','image','status','category','subcategory'])
                ->make(true);
        }

        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::get(["name", "id"]);
        $category = Category::pluck('name','id');
        $subcategory = SubCategory::pluck('sub_category_name','id');
        return view('admin.product.create',compact('subcategory','category'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $input['status'] = !isset($input['status']) ? 0 : 1;
        
        $input['slug'] = Str::slug($request->product_name);

        if(isset($input['image'])){
            $path = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('upload/product'), $path);
            $input['image'] = $path;
        }

        Product::create($input);

        $subcategory = SubCategory::pluck('sub_category_name','id');
        $category = Category::pluck('name','id');
        return redirect()->route('product.index',compact('category','subcategory'));
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
        $product = Product::find($id);
         // $category = Category::find($id);
          $category = Category::pluck('name','id');
        return view('admin.product.edit',compact('product','category'));
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
        $input = $request->all();
        
        $input['status'] = !isset($input['status']) ? 0 : 1;
        
        $input['slug'] = Str::slug($request->product_name);
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('upload/product'), $filename);
            $input['image']= $filename;
        }
        
        $product = Product::find($id);
        $product->update($input);
        return redirect()->route('product.index','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index','Student Delete Successfully');
    }

    public function fetchsubcategory(Request $request)
    {
        // $data = SubCategory::where("category_id", $request->category_id)->get(["name", "id"]);
        // info($data);

        $data = SubCategory::where("category_id", $request->category_id)->get(["sub_category_name", "id"]);
        info($data);
        return response()->json($data);
    }

}
