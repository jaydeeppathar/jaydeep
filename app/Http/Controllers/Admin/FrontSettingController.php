<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\FrontSetting;


class FrontSettingController extends AdminController
{
     public function __construct()
    {
        parent::__construct();
        $this->frontSetting = new FrontSetting;
    }

    public function indexFront()
    {   
        $input = [];
        $setting = $this->frontSetting->getFrontSetting();
        return view('admin.setting.index',compact('setting'));
    }
    
    public function createFront(Request $request)
    {
        $setting = $request->all();
 
        unset($setting['_token'],$setting['_method']);
        
        if ($image = $request->file('front-logo')) {
            $destinationPath = 'upload/setting/';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $setting['front-logo'] = "$profileImage";
        }
        foreach ($setting as $key => $value) {
            info($key);
            $dd = FrontSetting::where('slug',$key)->first();
            $dd->update(['value' => $value]);
        }    
        return redirect()->route('front.setting')->with('success','Fornt Setting Successfully Updated.');
    }
}
