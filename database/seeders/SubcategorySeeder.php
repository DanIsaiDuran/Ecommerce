<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            //Celulares y tablets
            [
                'category_id' => 1,
                'name' => 'Celulares y smarthpones',
                'slug' => Str::slug('Celulares y smarthpones'),
                'color' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares'),
                
            ],

            [
                'category_id' => 1,
                'name' => 'Smarthwatch',
                'slug' => Str::slug('Smarthwatch'),
                
            ],

            //Tv y audio
            [
                'category_id' => 2,
                'name' => 'Tv y audio',
                'slug' => Str::slug('Tv y audio'),
                
            ],

            [
                'category_id' => 2,
                'name' => 'Audio',
                'slug' => Str::slug('Audio'),
                
            ],

            [
                'category_id' => 2,
                'name' => 'Audio para autos',
                'slug' => Str::slug('Audio para autos'),
                
            ],

            //Consola y videojuegos
            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),
                
            ],

            [
                'category_id' => 3,
                'name' => 'Playstation',
                'slug' => Str::slug('Playstation'),
                
            ],

            [
                'category_id' => 3,
                'name' => 'Pc',
                'slug' => Str::slug('Pc'),
                
            ],

            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
                
            ],

            //Computación
            [
                'category_id' => 4,
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),
                
            ],

            [
                'category_id' => 4,
                'name' => 'Pc escritorio',
                'slug' => Str::slug('Pc escritorio'),
                
            ],

            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
                
            ],

            [
                'category_id' => 4,
                'name' => 'Accesorios',
                'slug' => Str::slug('Accesorios'),
                
            ],

            //Moda
            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' => true,
                'size' => true
                
            ],

            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color' => true,
                'size' => true
                
            ],

            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
                
            ],

            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes'),
                
            ],
        ];

        foreach($subcategories as $subcategory){
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
