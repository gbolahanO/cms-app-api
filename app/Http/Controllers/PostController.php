<?php

namespace App\Http\Controllegtirs;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
       $post = Post::all();
       $category = Category::all();

       return response()->json([
           'posts' => $post,
           'category' => $category
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        if ($categories->count() == 0)
        {
            return response()->json([
                'error' => 'You must have a category'
            ]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'post_image' => 'required|max:2048|mimes:jpeg,jpg,png,bmp,gif'
        ]);

        if ($request->hasFile('post_image'))
        {

            $post_image = $request->post_image;

            $post_image_name = time().$post_image->getClientOriginalName();

            $post_image->move('uploads/posts/', $post_image_name);

        } else {
            $post_image_name = 'noimage.jpg';
        }

        $post = Post::create([
            'title' => $request->title,
            'post_slug' => str_slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'post_image' => 'uploads/post/' . $post_image_name,
            'user_id' => '1'
        ]);

        $post->save();

        session()->flash('success', 'Post Updated');
    }

    public function edit($id)
    {
        $post = Post::findorfail($id);

        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::findorfail($id);

        if ($request->hasFile('post_image'))
        {
            $post_image = $request->post_image;

            $post_image_name = time().$post_image->getClientOriginalName();

            $post_image->move('uploads/posts/', $post_image_name);

            $post->post_image = 'uploads/post/' . $post_image_name;
        }

        $post->title = $request->title;

        $post->post_slug = str_slug($request->title);

        $post->content = $request->content;

        $post->category_id = $request->category_id;

        $post->save();

        session()->flash('success', 'Post Updated');
    }

    public function destroy($id)
    {
        Post::destroy($id);
    }
}
