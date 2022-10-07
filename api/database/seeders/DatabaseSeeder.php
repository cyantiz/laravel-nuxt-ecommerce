<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // create user with role 'admin', email: nguyenvanhoangnhan@outlook.com, password: tmp_pwd (hashed)
        \App\Models\User::create([
            'email' => 'nguyenvanhoangnhan@outlook.com',
            'role' => 1,
            'password' => bcrypt('tmp_pwd'),
        ]);

        // create a user with role 2, email='nhan053qt@gmail.com', password= 'tmp_pwd' (hashed)
        \App\Models\User::create([
            'email' => 'nhan053qt@gmail.com',
            'role' => 2,
            'password' => bcrypt('tmp_pwd'),
        ]);

        \App\Models\Customer::create([
            'email' => 'nhan053qt@gmail.com',
            'name' => 'Nguyen Van Hoang Nhan',
            'phone' => '0989898989',
            'address' => 'Ha Noi',
            'province_code' => '01',
            'district_code' => '01',
            'commune_code' => '01',
        ]);


        // Product 
        \App\Models\Product::create([
            'name' => 'Product 1 - Keyboard 1',
            'price' => 100,
            'category' => 1,
            'brand' => 'Brand 1',
            'in_stock' => 100,
            'description' => 'Description 1',
        ]);
        \App\Models\Product::create([
            'name' => 'Product 2 - Keyboard 2',
            'price' => 200,
            'category' => 1,
            'brand' => 'Brand 2',
            'in_stock' => 200,
            'description' => 'Description 2',
        ]);
        \App\Models\Product::create([
            'name' => 'Product 3 - Switch 1',
            'price' => 300,
            'category' => 2,
            'brand' => 'Brand 3',
            'in_stock' => 300,
            'description' => 'Description 3',
        ]);
        \App\Models\Product::create([
            'name' => 'Product 4 - Keycap 1',
            'price' => 400,
            'category' => 3,
            'brand' => 'Brand 4',
            'in_stock' => 400,
            'description' => 'Description 4',
        ]);


        // ProductImage: 
        \App\Models\ProductImage::create([
            'product_id' => 1,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 1,
        ]);
        \App\Models\ProductImage::create([
            'product_id' => 1,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 0,
        ]);
        \App\Models\ProductImage::create([
            'product_id' => 2,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 1,
        ]);
        \App\Models\ProductImage::create([
            'product_id' => 2,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 0,
        ]);
        \App\Models\ProductImage::create([
            'product_id' => 2,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 0,
        ]);
        \App\Models\ProductImage::create([
            'product_id' => 3,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 1,
        ]);
        \App\Models\ProductImage::create([
            'product_id' => 3,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 0,
        ]);
        \App\Models\ProductImage::create([
            'product_id' => 4,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 1,
        ]);
        \App\Models\ProductImage::create([
            'product_id' => 4,
            'image_url' => 'https://via.placeholder.com/1280x720',
            'is_thumbnail' => 0,
        ]);

        // Keyboard (product #1, #2)
        \App\Models\Keyboard::create([
            'key_layout' => '67 buttons',
            'switch_name' => 'Switch 1',
            'keycap' => 'Keycap 1',
            'hot_swappable' => 1,
            'connections_type' => 'Connections 1',
            'accessories' => 'Accessories 1',
            'operating_system' => 'Operating System 1',
            'weight' => 1,
            'length' => 1,
            'width' => 1,
            'depth' => 1,
            'product_id' => 1,
        ]);
        \App\Models\Keyboard::create([
            'key_layout' => '67 buttons',
            'switch_name' => 'Switch 2',
            'keycap' => 'Keycap 2',
            'hot_swappable' => 1,
            'connections_type' => 'Connections 2',
            'accessories' => 'Accessories 2',
            'operating_system' => 'Operating System 2',
            'weight' => 1,
            'length' => 1,
            'width' => 1,
            'depth' => 1,
            'product_id' => 2,
        ]);

        \App\Models\MechaSwitch::create([
            'product_id' => 3, 
            'type' => 'linear',
            'pre_lubed' => 1,
        ]);

        \App\Models\Keycap::create([
            'product_id' => 4,
            'profile' => "OEM",
            'material' => "PBT Plastic",
        ]);
        \App\Models\Keycap::create([
            'product_id' => 5,
            'profile' => "OEM",
            'material' => "PBT Plastic",
        ]);
        \App\Models\Keycap::create([
            'product_id' => 6,
            'profile' => "OEM",
            'material' => "PBT Plastic",
        ]);

        \App\Models\Cart::create([
            'customer_id' => 1,
        ]);
        
    }
}
