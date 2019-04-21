<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {

        $categories = Category::all();
        $posts = Post::paginate(2);
        $year = Carbon::now()->year;
        return view('front.home', compact('posts', 'categories', 'year'));
    }

    public function post($slug) {
        $categories = Category::all();
        $post = Post::findBySlugOrFail($slug);
        $comments = $post->comments;
        $year = Carbon::now()->year;
        return view('post', compact('post', 'comments', 'categories', 'year'));
    }
}
