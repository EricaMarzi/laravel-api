<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::whereIsPublished(true)->orderbyDesc('created_at')->get();
        return view('guest.home', compact('posts'));
    }
}
