<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

class AdminHomeController extends AdminController
{
     public function index()
    {
        // $users = User::where('status',1)->count();
        // $contatcUS = ContactUs::count();
        // $services = Service::count();
        // $office = Office::count();
        // $serviceArea = ServiceArea::count();
        return view('admin.dashboard');
    }
}
