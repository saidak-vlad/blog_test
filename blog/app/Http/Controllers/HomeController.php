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
}
