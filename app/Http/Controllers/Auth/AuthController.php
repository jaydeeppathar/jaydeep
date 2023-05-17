<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;


class AuthController extends AdminController
{
    /**
     * Write code on Method
     *
     * @return response()
    */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data  = User::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($data){
                    $status = "";
                    if($data->status == '1'){
                        $status = '<span class="badge rounded-pill badge-light-primary me-1">Active</span>';
                    }else{
                        $status = '<span class="badge rounded-pill badge-light-danger me-1">Deactive</span>';
                    }
                    return $status;
                    
                })
                ->addColumn('action', function($data){
                    return '<div class="table-actions">
                            <a href="'. route('user.edit',$data) .'" class="btn btn-primary btn-flat btn-sm" style="color:white; padding:4px 10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">Edit</a>

                            <a class="btn btn-danger btn-flat btn-sm remove-crud" data-action="'. route('user.destroy',$data) .'" data-id="'. $data->id .'" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete" style="padding:4px 10px;">Delete</a>
                        </div>';
                    
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('auth.login');
    }

     /**
     * Write code on Method
     *  
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        
    }  

        /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.home');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.register');
    }

    /**
     * Write code on Method
     *
     * @return response()
    */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'retype_password' => 'required|min:6|same:password',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        auth()->login($check);
        return redirect()->route('dashboard')->withSuccess('Great! You have Successfully loggedin');

        
    }

    /**
     * Write code on Method
     *
     * @return response()
    */
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect()->route('login');
    }
}
