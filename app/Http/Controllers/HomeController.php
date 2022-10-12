<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

    $categories = Category::all();
    $posts = Post::latest()->get();

    return view('index',
    compact('categories','posts'));

    }
}