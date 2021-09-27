<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('pages.index', ['posts' => $posts]);
    }

    public function show($slug)
    {
     $post = Post::where('slug', $slug)->firstOrFail();

     return view('pages.show', compact('post'));
    }
}
