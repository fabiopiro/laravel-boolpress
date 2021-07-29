<?php

use Illuminate\Database\Seeder;
// Tag
use App\Tag;
// Str - slug()
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['PHP', 'Laravel', 'HTML', 'CSS', 'JavaScript', 'Vue.js'];

        foreach ($tags as $tag) {

            // 1) Creo Istanza - !use App\Tag;!
            $newTag = new Tag();

            // 2) Valorizzo
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag, '-'); // !use Illuminate\Support\Str;!

            // 3) Salvataggio
            $newTag->save();

            // Eseguo Seeder - php artisan db:seed --class=TagSeeder - Controllo il DB

        }
    }
}
