<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     function __construct()
    {
        // $pages = Page::get();
        view()->share('adminTheme', 'adminTheme.default'); 
    }
}
