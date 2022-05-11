<?php

namespace App\Http\Controllers\Admin;

use App\Category;

use App\Http\Controllers\Controller;

use App\Post;

use App\Tag;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

// use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withTrashed()->with(['category', 'tags'])->orderBy('created_at','desc')->limit(20)->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //recuperare tutte le categorie dal database per inserirle nella select
            //passare alla vista
            //ciclare con vista
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|string|max:150',
            'content'=>'required|string',
            'published_at'=>'nullable|before_or_equal:today',
            'category_id'=>'nullable|exists:categories,id',
            'tags'=>'exixts:tags,id',//deve esistere nella tabella tags, colonna id
        ]);

        $data = $request->all();

        $slug = Post::getUniqueSlug($data['title']);

        // dd($slug);

        $post = new Post();
        $post->fill( $data ); 
        $post->slug = $slug;

        $post->save();

        return redirect()->route('admin.posts.index');

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   
        //Validare i dati
        $request->validate([
            'title'=>'required|string|max:150',
            'content'=>'required|string',
            'published_at'=>'nullable|before_or_equal:today',
            'category_id'=>'nullable|exists:categories,id',
        ]);
        //Prendere id dati
        $data = $request->all();

        //Se il titolo nuovo è diverso dal titolo salvato
        if( $post->title != $data['title']){
            $post = new Post();
            //nuovo slug
            $slug = Post::getUniqueSlug($data['title']);
            $data['slug'] = $slug;
        }

        //controllo per avere un array from checkbox
        if (array_key_exists('tag', $data)) {
            $post->tags()->sync($data['tags']); //ci sono values in checkbox
        } else {
            $post->tags()->sync([]); //non ci sono
            // $post->tags()->detach();
        }
        

        //Aggiornare i dati
        $post->update($data);
        //Reindirizzare su index
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // $post->delete();
    
        // return redirect()->route('admin.posts.index');

        if($post->trashed()){
            $post->forceDelete();
        } else{
            $post->delete();
        }

        return redirect()->route('admin.posts.index');
    }

    public function forceDestroy(Post $post){
        $post->forceDelete();

        return redirect()->route('admin.posts.index');
    }
}
