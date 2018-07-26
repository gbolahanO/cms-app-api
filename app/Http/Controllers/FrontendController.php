<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $news = Category::find(1)->post;
        $lifestyle = Category::find(2)->post;
        $fresh = Category::find(3)->post;

        return response()->json([
            'news' => $news,
            'lifstyle' => $lifestyle,
            'fresh' => $fresh
        ]);

    }
}
