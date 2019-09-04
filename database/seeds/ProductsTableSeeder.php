<?php

use Illuminate\Database\Seeder;
use ecommerce\Products;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::query()->truncate();
        for( $i=1;$i<=10;$i++) {                
            Products::create([
                'name' => 'producto',
                'price' => (9.99 + $i),
                'stock' => 10+$i,
                'user_id' => 1,
                'likes_count' => 5,
                'description' => 'Esto es la descripcion'
            ]);
        }
    }
}
