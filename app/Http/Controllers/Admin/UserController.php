<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Leave;
use Validator;
use Hash;
use DB;

class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->user = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('type',function($row){
                        if ($row->type == 0) {
                            $type = '<label class=""> User</label>';
                        }elseif ($row->type == 1) {
                            $type = '<label class="">Admin</label>';
                        }
                        return $type;
                    })
                    // ->addColumn('status',function($row){
                    //     if ($row->status == 0) {
                    //         $status = '<label class="badge badge-danger">Deactive</label>';
                    //     }elseif ($row->status == 1) {
                    //         $status = '<label class="badge badge-success">Active</label>';
                    //     }
                    //     return $status;
                    // })
                    // ->addColumn('joinDate',function($row){
                    //     return \Carbon\Carbon::parse($row->join_date)->format('d/m/Y');
                        
                    // })
                    ->addColumn('action',function($row){
                        $btn = '';
                            $btn = '<a href="'.route('user.show',[$row->id]).'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Show"><i class="fa fa-eye"></i></a>';
                        
                            $btn = $btn.' <a href="'. route('user.edit',[$row->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';

                            $btn = $btn.' <button class="btn btn-danger btn-flat btn-sm remove-crud" data-id="'. $row->id .'" data-action="'. route('user.destroy',$row->id) .'"  data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <i class="fa fa-trash"></i></button>';

                            // $btn = $btn.' <a href="'. route('leave.list',[$row->id]) .'" class="btn btn-warning btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit">Show leave</a>';
                        return $btn;    
                    })
                    ->rawColumns(['action','type'])
                    ->make(true);
        }

        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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

        $validator = Validator::make($input, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:confirm_password',
            'confirm_password'=>'required',
            'type'=>'required',
            'image' => 'mimes:jpeg,bmp,png',
        ]); 
        if ($validator->passes()) {
            $input['password'] = Hash::make($input['password']);
            $input = Arr::except($input,array('confirm_password'));
            if (isset($input['join_date'])) {
                $input['join_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $input['join_date'])->format('Y-m-d');
            }
            if(isset($input['image'])){
                $path = time().$request->image->getClientOriginalName();
                $request->image->move(public_path('upload/image'), $path);
                $input['image'] = $path;
            }
            // $input['status'] =  isset($input['status']) ? 1 : 0;

            $user = User::create($input);
            // notificationMsg('success',$this->crudMessage('add','User'));
            return redirect(route('user.index'));
        }
        
        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // if (!empty($user->join_date)) {
        //     $joinDate = \Carbon\Carbon::createFromFormat('Y-m-d', $user->join_date)->format('d/m/Y');
        // }
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'same:confirm_password',
            'image' => 'mimes:jpeg,bmp,png',
        ]); 

        if ($validator->passes()) {
            if(isset($input['image'])){
                $path = time().$request->image->getClientOriginalName();
                $request->image->move(public_path('upload/image'), $path);
                $input['image'] = $path;
            }
            if(isset($input['password'])){
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input,array('confirm_password'));
                $input = Arr::except($input,array('password'));    
            }
            if (isset($input['join_date'])) {
                $input['join_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $input['join_date'])->format('Y-m-d');
            }
            // $input['status'] =  isset($input['status']) ? 1 : 0;

            $user->update($input);

            // notificationMsg('success',$this->crudMessage('update','User'));
            return redirect(route('user.index'));
        }
        
        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        // notificationMsg('success',$this->crudMessage('delete','User'));
        return redirect(route('user.index'));
    }

    public function changeProfileImg(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'image' => 'mimes:jpeg,bmp,png',
        ]); 

        if ($validator->passes()) {
            if(isset($input['image'])){
                $path = time().$request->image->getClientOriginalName();
                $request->image->move(public_path('upload/image'), $path);
            }
            $user = User::where('id',auth()->user()->id)->update(['image' => $path]);
            notificationMsg('success',$this->crudMessage('update','User Profile Image'));
            return redirect(route('home'));
        }
        
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function updateProfile()
    {
        $user = User::where('id',auth()->user()->id)->first();
        return view('admin.user.updateProfile',compact('user'));
    }

    public function changeProfileDetails(Request $request)
    {
        $input = $request->all();
        $user = User::where('id',$input['id'])->first();

        $validator = Validator::make($input, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'same:confirm_password',
            'image' => 'mimes:jpeg,bmp,png',
        ]); 

        if ($validator->passes()) {
            if(isset($input['image'])){
                $path = time().$request->image->getClientOriginalName();
                $request->image->move(public_path('upload/image'), $path);
                $input['image'] = $path;
            }
            if(isset($input['password'])){
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input,array('confirm_password'));
                $input = Arr::except($input,array('password'));    
            }
            $user->update($input);

            notificationMsg('success',$this->crudMessage('update','User'));
            return redirect(route('update.profile'));
        }
        
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function leaveList($id)
    {
        $user = User::where('id',$id)->first();
        $data = Leave::select(DB::raw('count(id) as `countLeave`'),DB::raw("DATE_FORMAT(leave_date, '%m') perMonth"))
                    ->groupBy('perMonth')
                    ->orderBy('perMonth')
                    ->where('leave_status',1)
                    ->where('user_id',$id)
                    ->whereYear('leave_date', \Carbon\Carbon::now()->year)
                    ->get();
        return view('admin.user.leaveList',compact('user','data'));
    }

}
