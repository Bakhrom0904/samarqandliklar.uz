<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request; 
use Mail;
use App\Mail\Message;

class MainController extends Controller
{
    public function index()
    {
        $specialPosts=Post::where('is_special',1)->limit(6)->latest()->get();
        $latestPosts=Post::limit(6)->latest()->get();
        $popularPosts=Post::limit(4)->orderBy('view','DESC')->get();
        return view('index',compact('specialPosts','latestPosts','popularPosts'));
    }

    public function categoryPosts($slug)
    {
        $category=Category::where('slug',$slug)->first();
        return view('categoryPosts',compact('category'));
    }

    public function postDetail($slug)
    {
        $post=Post::where('slug',$slug)->first();
        $post->increment('view');
        $post->save();

        $otherPosts=Post::where('category_id',$post->category_id)->where('id','!=',$post->id)->limit(3)->latest()->get();
        return view('postDetail',compact('post','otherPosts'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $data=$request->all();

        Mail::to('bahromislomov0409@gmail.com')->send(new Message($data));
        return back()->with('message','Sizning xabaringiz muvvafiqiyatli yuborildi');
    }

    public function search(Request $request)
    {
        $key=$request->key;
        $posts=Post::where('title_uz','like','%'.$key.'%')
            ->orWhere('title_ru','like','%'.$key.'%')
            ->orWhere('body_uz','like','%'.$key.'%')
            ->orWhere('body_ru','like','%'.$key.'%')
            ->get();
        return view('search',compact('posts','key'));
    }
}
