<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;
use Auth;
use \App\User;

class FrontendController extends Controller
{
    public function index()
    {
        $news = Category::find(1)->post;
        // $lifestyle = Category::find(2)->post;
        $firstLifestyle = Post::where('category_id', 2)->orderBy('created_at', 'desc')->take(1)->first();
        $secondLifestyle = Post::where('category_id', 2)->orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        $firstFresh = Post::where('category_id', 3)->orderBy('created_at', 'desc')->take(1)->first();
        $secondFresh = Post::where('category_id', 3)->orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        $fresh = Category::find(3)->post;
        $post = Auth::id();

        return response()->json([
            'auth' => $post,
            'news' => $news,
            'firstLifestyle' => $firstLifestyle,
            'secondLifestyle' => $secondLifestyle,
            'firstFresh' => $firstFresh,
            'secondFresh' => $secondFresh,
            'fresh' => $fresh
        ]);

    }

    public function single_post($slug)
    {
        $post = Post::where('post_slug', $slug)->firstorfail();
        $category = $post->category->name;
        return response()->json([
            "post" => $post,
            "category" => $category
            ]);
    }

    public function category_posts($id)
    {
        $category = Category::find($id);
        $category_post = $category->post;

        return response()->json([
            "category_posts" => $category_post
        ]);
    }
}
