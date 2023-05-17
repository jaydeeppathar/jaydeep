<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use DataTables;


class SubCategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SubCategory::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    
                    ->addColumn('category_id', function($row){
                            return $row->category->name;
                        })  

                    ->addColumn('status',function($row){
                         if ($row->status == 0) {
                             $status = '<label class="badge badge-danger" style="background-color:red;">Deactive</label>';
                         }elseif ($row->status == 1) {
                             $status = '<label class="badge badge-success" style="background-color:green;">Active</label>';
                        }
                         return $status;
                     })

                   ->addColumn('image', function($row){
                            $url= asset('upload/subcategory/'.$row->image);
                            $image = '<img src="'.$url.' " width="130" height="90" " class="" align="center" />';
                            return $image;
                        })

                   ->addColumn('action',function($row){
                        $btn = '';
                            $btn = '<a href="'.route('category.show',[$row->id]).'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Show"><i class="fa fa-eye"></i></a>';
                            $btn = $btn.' <a href="'. route('sub-category.edit',[$row->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
                            $btn = $btn.' <button class="btn btn-danger btn-flat btn-sm remove-crud" data-id="'. $row->id .'" data-action="'. route('sub-category.destroy',$row->id) .'"  data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <i class="fa fa-trash"></i></button>';

                            // $btn = $btn.' <a href="'. route('leave.list',[$row->id]) .'" class="btn btn-warning btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit">Show leave</a>';
                        return $btn;    
                    })

                    ->rawColumns(['action','image','status'])
                    ->make(true);
        }

        return view('admin.subcategory.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name','id');
        return view('admin.subcategory.create',compact('category'));
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

        if(isset($input['image'])){
            $path = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('upload/subcategory'), $path);
            $input['image'] = $path;
        }

        SubCategory::create($input);
        return redirect()->route('sub-category.index');
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
        $category = Category::pluck('name','id');
        $subcategory = SubCategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory','category'));
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

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('upload/subcategory'), $filename);
            $input['image']= $filename;
        }
        
        $subcategory = SubCategory::find($id);
        $subcategory->update($input);
        return redirect()->route('sub-category.index','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->route('sub-category.index','Student Delete Successfully');
    }
}
