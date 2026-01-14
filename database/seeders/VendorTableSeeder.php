<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    public function run()
    {
        Vendor::create(['name'=>'Vendor A']);
        Vendor::create(['name'=>'Vendor B']);
        Vendor::create(['name'=>'Vendor C']);
    }
}