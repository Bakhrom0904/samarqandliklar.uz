<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function categoryPosts()
    {
        return view('categoryPosts');
    }

    public function postDetail()
    {
        return view('postDetail');
    }

    public function contact()
    {
        return view('contact');
    }
}
