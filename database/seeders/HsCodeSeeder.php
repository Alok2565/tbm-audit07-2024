<?php

namespace Database\Seeders;

use App\Models\HsCode;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HsCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hsCode =[
            ['hs_code' =>'30012010','desc'=>'Liquid extracts of liver'],
            ['hs_code' =>'30012020','desc'=>' Liver extracts, dry'],
            ['hs_code' =>'30012030','desc'=>'Snake Venom'],
            ['hs_code' =>'30012090','desc'=>'Other'],
            ['hs_code' =>'30021210','desc'=>'For diphtheria'],
            ['hs_code' =>'30021220','desc'=>'For tetanus'],

        ];

        foreach ($hsCode as $key => $hsCode_items) {
            HsCode::create($hsCode_items);
        }

    }
}
