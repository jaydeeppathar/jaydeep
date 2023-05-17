<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FrontSetting;


class FrontSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        
    public function run()
    {
        $setting = array(
            [
                'name' => 'Our Top Products Title',
                'slug' => 'our-top-products-title',
                'value' => 'Our Top Products',
            ],
           
        );
        foreach ($setting as $setting) {
            $find = FrontSetting::where('slug',$setting['slug'])->first();
            if (is_null($find)) {
                FrontSetting::create($setting);
            }
        } 
    }

    
}
