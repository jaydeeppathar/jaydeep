<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use DataTables;

class ContactUsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = ContactUs::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    
                    ->addColumn('action',function($row){
                            $btn = ' <button class="btn btn-danger btn-flat btn-md remove-crud" data-id="'. $row->id .'" data-action="'. route('contactus.destroy',$row->id) .'"  data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <i class="fa fa-trash"></i></button>';

                            // $btn = $btn.' <a href="'. route('leave.list',[$row->id]) .'" class="btn btn-warning btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit">Show leave</a>';
                        return $btn;    
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.contactUs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ContactUs::create($input);
        return redirect()->route('contact');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactus = ContactUs::find($id);
        $contactus->delete();
        return redirect()->route('contactus.index');
    }
}
