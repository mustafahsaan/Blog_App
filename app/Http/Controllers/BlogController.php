<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //if(Auth::check()){
        $categories =Category::get();
       return view('theme.blogs.create',compact('categories'));
       // }
       // abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
       $data =$request->validated();

       $image=$request->image;
       $newImageName=time().'-'.$image->getClientOriginalName();
       $image->storeAs('blog', $newImageName,'public');
       $data['image']=$newImageName;
       $data['user_id']=Auth::user()->id;
       Blog::create($data);
       return back()->with('image-status','You Blog Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if($blog->user_id == Auth::user()->id){
            $categories =Category::get();
            return view('theme.blogs.edit',compact('categories','blog'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        if($blog->user_id == Auth::user()->id){
        $data =$request->validated();
        if($request->hasFile('image')){

            Storage::delete("public/blog/$blog->image");
       $image=$request->image;
       $newImageName=time().'-'.$image->getClientOriginalName();
       $image->storeAs('blog', $newImageName,'public');
       $data['image']=$newImageName;

             }

       $blog->update($data);
       return back()->with('update-status','You Update Blog Successfully');
            }
            abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->user_id == Auth::user()->id){
        Storage::delete("public/blog/$blog->image");
        $blog->delete();
        return back()->with('delete-status','You Delete Blog Successfully');
        }
        abort(403);
    }

    public function myBlogs()
    {
         if(Auth::check()){
        $blo= Blog::where('user_id',Auth::user()->id)->paginate(10);
       return view('theme.blogs.my-blogs',compact('blo'));
         }
        abort(403);
    }
}
