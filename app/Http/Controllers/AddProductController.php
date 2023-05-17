<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddProduct;

class AddProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addproduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
         $request->validate([
            'addmore.*.name' => 'required',
            'addmore.*.qty' => 'required',
            'addmore.*.price' => 'required',
        ]);

        $ProductStocks = AddProduct::pluck('id')->all();        
        
        // Create and Update Record Datatable
        foreach ($request->addMore as $key => $value) {

            if(!is_null($value['id'])){
                DB::table('add_products')->where('id', $value['id'])->update($value);
            }else{  
                ProductStock::create($value);                
            }
        }

        // Remove Record for Datatable
        foreach($ProductStocks as $key => $value){ 

            if (!in_array($value, array_keys($request->addMore))) {
                DB::table('add_products')->where('id', $value)-> delete($value);
            }            
        }

        $ProductStocks = ProductStock::pluck('id')->all();        

        return back()->with('success', 'Record Created Successfully.', compact('ProductStocks'));
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
        //
    }
}
