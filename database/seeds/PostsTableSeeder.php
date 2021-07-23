<?php

use Illuminate\Database\Seeder;

// Metodo Post
use App\Post;

// Slug
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 10 Articoli
        for($i = 1; $i <= 10; $i++) {

            // Creazione Istanza
            $newPost = new Post();

            // Valorizzazione proprietà
            $newPost->title = "Titolo articolo " . $i;
            $newPost->content = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero iure laborum aliquid id, est dolores harum iusto odit hic numquam obcaecati velit ea accusantium illo accusamus cum distinctio eaque ipsam tenetur sint voluptates? Molestias quaerat ut id excepturi dolor natus non expedita, deserunt rerum, exercitationem, ipsa nesciunt dolore nemo tempora architecto hic perferendis vero. Fugiat, accusantium ab impedit ullam id corrupti ipsa unde, perferendis sequi adipisci, nihil facere. Voluptas illum amet inventore cumque voluptatem dolorem aspernatur qui voluptate laboriosam incidunt, repellendus vel maxime explicabo consectetur pariatur? Veniam earum obcaecati maiores eius minima in, distinctio consectetur nostrum nam possimus ipsa at!";
            $newPost->slug = Str::slug($newPost->title , '-');

            // Salvataggio (a DB)
            $newPost->save();

            //Esecuzione --- php artisan db:seed --class=PostsTableSeeder
            //Verificare il DB
        }
        // 10 Articoli

    }
}
