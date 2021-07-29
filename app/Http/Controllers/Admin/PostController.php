<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SLUG
use Illuminate\Support\Str;
// Metodo Post
use App\Post;
// Metodo Category
use App\Category;
// Tag
use App\Tag;

class PostController extends Controller
{
    private $postValidationArray = [
        'title' => 'required|max:255',
        'content' => 'required',
        'category_id' => 'nullable|exists:categories,id',


        'tags' => 'exists:tags,id', // exists:nome_tabella,nome_campo/colonna
        // exists - check if exists
    ];

    // private function generateSlug() {

    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // importo il MODEL Category - query all() - salvo $categories
        $categories = Category::all(); // use\App\Category
        
        // Many to Many
        // posts - tags
        $tags = Tag::all(); // !use App\Tag;! e compact

        // compact - passo categories alla vista
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        /*
        dd($data);
        */

        // VALIDAZIONE
        $request->validate($this->postValidationArray);
        // VALIDAZIONE
        // @error in create.blade.php

        //creazione e salvataggio
        // nuova istanza di classe Post

        $newPost = new Post();

        //SLUG !use Illuminate\Support\Str;!
        $slug = Str::slug($data['title'], '-');

        $existingPost = Post::where('slug', $slug)->first();

        $slugBase = $slug;
        $counter = 1;

        while($existingPost !=null) {
            // blocco istruzioni
            $slug = $slugBase . "-" . $counter;

            //istruzioni terminare il ciclo
            $existingPost = Post::where('slug', $slug)->first();
            $counter++;
        }

        $data['slug'] = $slug;
        //SLUG

        $newPost->fill($data);
        //aggiungere FILLABLE nel modello (Post)

        $newPost->save();

        // Tag
        // se tags(checkbox) esiste -> fai l'attach
        if (array_key_exists('tags', $data)) {
            $newPost->tags()->attach($data['tags']);
        }


        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // v.1 public function show($id)
    /* v.2 */ public function show(Post $post)
    {
        /* v.1
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
        */
        /* v.2 */ return view('admin.posts.show', compact('post'));

        /* ...views/admin/posts creo 'show.blade.php' */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // COME NELLA CREATE
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, /*$id*/ Post $post)
    {
        $data = $request->all();
        // dd($data);
        // VALIDAZIONE (identica allo store)
        $request->validate($this->postValidationArray);
        // VALIDAZIONE

        //SLUG
        if($post->title != $data['title']) {
            //CODICE COPIATO DA "Sopra"
            $slug = Str::slug($data['title'], '-');

            $existingPost = Post::where('slug', $slug)->first();

            $slugBase = $slug;
            $counter = 1;

            while($existingPost !=null) {
                // blocco istruzioni
                $slug = $slugBase . "-" . $counter;

                //istruzioni terminare il ciclo
                $existingPost = Post::where('slug', $slug)->first();
                $counter++;
            }
            //CODICE COPIATO DA "Sopra"
            $data['slug'] = $slug;
        }
        //SLUG
        $post->update($data);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
        ->route('admin.posts.index')
        ->with('deleted', $post->title);
    }
}
