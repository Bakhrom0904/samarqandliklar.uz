<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData=$request->all();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $image_name=time().'.'.$file->getClientOriginalExtension();
            $file->move('site/images/posts/',$image_name);
            $requestData['image']=$image_name;
        }
        $requestData['slug']=Str::slug($request->title_ru);
        $post=Post::create($requestData);
        $post->tags()->attach($request->tags);
        return redirect()->route('admin.posts.index')->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title_uz'=>'required',
            'title_ru'=>'required',
            'category_id'=>'required',
            'body_uz'=>'required',
            'body_ru'=>'required',
        ]);
        
        $requestData=$request->all();

         if(empty($request->is_special))
        {
            $requestData['is_special']=0;
        }

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $image_name=time().'.'.$file->getClientOriginalExtension();
            $file->move('site/images/posts/',$image_name);
            $requestData['image']=$image_name;
        }
        $requestData['slug']=Str::slug($request->title_ru);
        $post->update($requestData);
//        $post->tags()->sync($request->tags);
        return redirect()->route('admin.posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::destroy($id);
        return redirect()->route('admin.posts.index')->with('success','Post deleted successfully');

    }
}
