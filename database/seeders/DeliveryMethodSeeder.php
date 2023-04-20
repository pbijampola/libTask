<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods=[
            [
                'name'=>'Pick From Shop',
                'price'=>0.00,
                'description'=>'Pick from shop which is near you',
            ],
            [
                'name'=>'Hand Delivery',
                'price'=>0.00,
                'description'=>'Hand delivery on your own',
            ],
            [
                'name'=>'Delivery Company',
                'price'=>15000.00,
                'description'=>'Delivery by company which is near you',
            ]
        ];
        foreach ($methods as $method) {
            \App\Models\DeliveyMethod::create($method);
        }
    }
}
