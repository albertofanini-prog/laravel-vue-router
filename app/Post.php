<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    protected $fillable = [
        'title',
        'content',
        'published_at',
        'category_id',
        'slug',
    ];

    public static function getUniqueSlug($title){
        //Creare slug
        $slug = Str::slug( $title );
        // dd($slug);

        //Variabile di appoggio per alleggerire while
        $slug_base = $slug;

        //Contatore per slug
        $counter = 1;

        //Controllare che non sia doppio
            //Cercare il primo slug creato con quel determinato titolo
        $post_present = Post::where('slug', $slug)->first();

        //Ciclo while per controllare che slug sia disponibile
            //In caso aggiunge $counter
        while( $post_present ){

            $slug = $slug_base . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
