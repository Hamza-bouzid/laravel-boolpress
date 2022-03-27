<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;

class PostController extends Controller
{
    public function index() {
        
        $posts = Post::with(["category", "tags"])->get();
        
        return response()->json($posts);
       
    }

    //Search
    public function search($title) {
        
        //Richiesta titolo che contiene $title
         $posts = Post::where('title', 'like', '%'.$title.'%')->get();

         return response()->json($posts);
       
    }

    public function show($slug)
    {

       $post = Post::where('slug', $slug)->with(["category", "tags"])->first();
       if( empty($post) ) {
         return response()->json(["message" => "Post Not Found"], 404);
       }
        return response()->json($post);
         
    }
}
