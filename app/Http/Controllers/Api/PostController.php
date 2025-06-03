<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Elenco dei post creati dall'utente loggato
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = Auth::user(); // user login via JWT
        $posts = Post::where('user_id', $user->id)->get();
        return response()->json($posts);
    }
}
