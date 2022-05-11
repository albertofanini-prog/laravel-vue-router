<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //recuperare tutti i post
        // $posts = Post::all();
        // $posts = Post::with(['category', 'tags'])->limit(16)->get();
        $posts = Post::with(['category', 'tags'])->where('published_at','!=',null)->orderBy('published_at','desc')->paginate(12);

        //ritornare in formato json
        return response()->json([
            'posts' => $posts,
            'succes'=> true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //recuperare il post con slug corrispondente
            //Colonna slug deve essere uguale a $slug
            //first restituisce singolo post
        $post = Post::with(['category','tags'])->where('slug',$slug)->first();

        //alternativa a ::with(['category','tags'])
        // $post->category;
        // $post->tags;

        //se il post c'è
        if( $post ){
        // ritornare la risposta
            // in formato json
            //     assegnare i valori
            return response()->json([
                'post' => $post,
                'success' => true
            ]);
        }

        //altrimenti
            //risposta in json
        return response()->json([
            //messaggio
            'message' => 'Post not found',
            'success' => false
        ], 404);//<-errore

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
