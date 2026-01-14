<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Vendor;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $vendors = Vendor::all();

        foreach($vendors as $vendor){
            Product::create([
                'name' => $vendor->name . ' Product 1',
                'price' => rand(50,200),
                'stock' => 20,
                'vendor_id' => $vendor->id,
            ]);

            Product::create([
                'name' => $vendor->name . ' Product 2',
                'price' => rand(30,150),
                'stock' => 15,
                'vendor_id' => $vendor->id,
            ]);

            Product::create([
                'name' => $vendor->name . ' Product 3',
                'price' => rand(10,100),
                'stock' => 10,
                'vendor_id' => $vendor->id,
            ]);
        }
    }
}
