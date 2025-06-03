<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Apri la home
     *
     * @return Renderable
     */
    public function home(): Renderable
    {
        $utenti = User::all();
        $posts = Post::all();
        return view('home')->with([
            "utenti" => $utenti,
            "posts" => $posts,
        ]);
    }

    /**
     * Home page del sito
     * @return Renderable
     */
    public function index(): Renderable
    {
        $posts = Post::where("featured", "=", 0)->orderBy("date", "desc")->paginate(4);
        $first_post = Post::where("featured", "=", 1)->first(); // Prende e rimuove il primo elemento
        return view('index')->with([
            "posts" => $posts,
            "first_post" => $first_post,
        ]);
    }
}
