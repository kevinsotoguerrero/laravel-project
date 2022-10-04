<?php
// in terminal-> php artisan make:controller PageController

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $search=$request->search;
        $posts=Post::where('title', 'LIKE', "%{$search}%")
        ->with('user')
        ->latest()->paginate();

        return view('home', ['posts' => $posts]);
    }

    public function blog()
    {
        /* $posts = [
            ['id' => 1, 'title' => 'PHP', 'slug' => 'php'],
            ['id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
        ]; */

        //$posts=Post::get(); //trae todos los datos
        //$posts=Post::first(); //trae el primero
        //$posts=Post::find(25); //encuentra el de id 25

        //dd($posts); // imprime en pantalla lo que tiene la variable y finaliza

        //para la paginacion en orden descendente de publicacion
        $posts=Post::latest()->paginate();

        return view('blog', ['posts' => $posts]);
    }


    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
