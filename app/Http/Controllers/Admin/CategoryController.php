<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use DataTables;
use Auth;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
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
                            $btn = '<a href="'.route('category.show',[$row->id]).'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Show"><i class="fa fa-eye"></i></a>';
                            $btn = $btn.' <a href="'. route('category.edit',[$row->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
                            $btn = $btn.' <button class="btn btn-danger btn-flat btn-sm remove-crud" data-id="'. $row->id .'" data-action="'. route('category.destroy',$row->id) .'"  data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <i class="fa fa-trash"></i></button>';

                            // $btn = $btn.' <a href="'. route('leave.list',[$row->id]) .'" class="btn btn-warning btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit">Show leave</a>';
                        return $btn;    
                    })

                    ->rawColumns(['action','status'])
                    ->make(true);
        }


        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        $input['user_id'] = Auth::user()->id;

        Category::create($input);
        return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        
        $category = Category::find($id);
        $category->update($input);
        return redirect()->route('category.index','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index','Student Delete Successfully');
    }

    
}
