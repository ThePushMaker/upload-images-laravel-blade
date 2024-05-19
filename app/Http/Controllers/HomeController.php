<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // obtener a quien sigue el usuario
        $ids = auth()->user()->following->pluck('id')->toArray();
        
        $posts = Post::whereIn('user_id', $ids)->paginate(20);
        
        return view('home', [
            'posts' => $posts
        ]);
    }
}