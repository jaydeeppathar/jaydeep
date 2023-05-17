<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;

class CollectionController extends Controller
{
    public function test()
    {
        $items = collect(['one','two','three']);
        $items = new  collection(['one','two','three']);
        // $result = $items->sort();
        $user = User::get();
        
        $myNames = collect([
            ['userid'=>1, 'name'=>'Jaydeep'],
            ['userid'=>2, 'name'=>'Vivek'],
            ['userid'=>3, 'name'=>'Nikhil']
        ]);

        $result = collect(['1'])->containsOneItem();
        dd($result);
    }
}
