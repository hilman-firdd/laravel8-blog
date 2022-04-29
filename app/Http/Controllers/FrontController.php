<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.front', [
            'blog' => Blog::inRandomOrder()->limit(3)->get()
        ]);
    }

    public function blogs()
    {
        return view('front.blogs', [
            'blogs' => Blog::latest()->get()
        ]);
    }

    public function blog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blog->view++;
        $blog->save();
        
        return view('front.blog', [
            'blog' => Blog::where('slug', $slug)->first()
        ]);
    }
}
