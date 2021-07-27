<?php

use Illuminate\Database\Seeder;

// Category
use App\Category;

// slug
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // me
        // categories
        $categories = [
            'Backend',
            'Frontend',
            'UX',
            'UI',
            'Network',
        ];

        /* v.1 - for
        for($i = 0; $i < count($categories); $i++) {
            
            // 1) Nuova istanza
            $newCategory = new Category(); // use App\Category;

            // 2) Valorizzazione
            $newCategory->name = $category[$i];
            $newCategory->slug = Str::slug($newCategory->name, '-');

            // 3) Salvataggio
            $newCategory->save();

            // !php artisan db:seed --class=CategoriesTableSeeder! - !fare il seeder!
        }
        v.1 - for */

        // popoliamo
        foreach($categories as $category) {
            
            // 1) Nuova istanza
            $newCategory = new Category(); // use App\Category;

            // 2) Valorizzazione
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($newCategory->name, '-'); //use Illuminate\Support\Str;

            // 3) Salvataggio
            $newCategory->save();

            // !php artisan db:seed --class=CategoriesTableSeeder! - !fare il seeder!
            // check DB
        }
        // me
    }
}
