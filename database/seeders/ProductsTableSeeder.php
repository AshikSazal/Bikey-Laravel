<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bikes = [
            'Mountain Bike X1', 'Road Bike Speedster', 'Hybrid Bike A1', 'Electric Bike Z2',
            'Mountain Bike XT', 'Road Bike Pro', 'Hybrid Bike E2', 'Electric Bike X3'
        ];

        $parts = [
            'Bike Pump', 'Pedals', 'Handlebars', 'Saddle', 'Bicycle Light', 'Bell', 'Lock', 'Chain',
            'Bike Bell', 'Water Bottle Holder', 'Front Rack', 'Rear Rack', 'Bike Computer'
        ];

        $images = ['mt15.png','r15.png','helmet.jpg'];

        // Generate and insert bike records
        foreach (range(1, 25) as $index) {
            $bikeName = $bikes[array_rand($bikes)];
            \App\Models\Product::create([
                'name' => $bikeName,
                'description' => json_encode([
                    'power' => rand(250, 750) . 'W',
                    'tyre' => rand(26, 29) . ' inch',
                    'suspension' => ['Front', 'Full'][array_rand(['Front', 'Full'])],
                    'brakes' => ['Disc', 'V-Brake'][array_rand(['Disc', 'V-Brake'])],
                    'color' => ['Red', 'Blue', 'Green', 'Black', 'White'][array_rand(['Red', 'Blue', 'Green', 'Black', 'White'])],
                ]),
                'quantity' => rand(5, 20),
                'price' => rand(200000, 500000),
                'image' => 'images/'.$images[rand(0,1)],
                'category' => 'bike',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Generate and insert part records
        foreach (range(1, 25) as $index) {
            $partName = $parts[array_rand($parts)];
            \App\Models\Product::create([
                'name' => $partName,
                'description' => json_encode([
                    'type' => ['Standard', 'Premium'][array_rand(['Standard', 'Premium'])],
                    'material' => ['Aluminum', 'Steel', 'Carbon Fiber'][array_rand(['Aluminum', 'Steel', 'Carbon Fiber'])],
                    'color' => ['Black', 'Silver', 'Red', 'Blue'][array_rand(['Black', 'Silver', 'Red', 'Blue'])],
                    'weight' => round(rand(10, 150) / 100, 2) . 'kg',
                ]),
                'quantity' => rand(10, 50),
                'price' => rand(2000, 10000),
                'image' => 'images/'.$images[2],
                'category' => 'parts',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
