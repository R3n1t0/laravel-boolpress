<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $posts = Post::with('category','tags')->paginate(5);
        $categories = Category::all();
        $tags = Tag::all();

        return response()->json(compact('posts', 'categories', 'tags'));
    }

    public function show($slug){

        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        return response()->json($post);

    }

    public function getPostByCategory($slug_category){

        $category = Category::where('slug', $slug_category)->whith('posts')->first();

        return response()->json($category);

    }

    public function getPostByTag($slug_tag){

        $tag = Tag::where('slug', $slug_tag)->whith('posts')->first();

        return response()->json($tag);

    }
}
