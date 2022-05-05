<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{    
    
    
    public function index()
    {

       // $projects = posty::table('users')->lists('id','name');

       // return view('pages.todo', ['projects'=> $projects);
        //return view('posts.index', ['projects' => $projects]);
        $posts = Post::get();
        $categories = User::all();

        return view('posts.index', compact('posts','categories'));


      //  $posts = Post::get();

        //return view('posts.index', ['posts' => $posts ]);
  // 'categories' => $categories,
       



    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        //$request->user()->posts()->create($request->only('body'));

        //return back();


        Post::create([
            'user_id' => $request->user_id,
            'body' => $request->body,
            //'email' => $request->email,
           // 'password' => Hash::make($request->password),
        ]);


        return redirect()->route('posts');

        //return back();
    }

}
