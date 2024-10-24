<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){
        $blo=Blog::latest()->paginate(4);
        $sleder=Blog::latest()->take(5)->get();
        return view('theme.index',compact('blo','sleder'));
    }

    public function cutegory($id){

        $categoryName=Category::find($id)->name;
        $blo=Blog::where('category_id', $id )->paginate(8);
        return view('theme.cutegory',compact('blo','categoryName'));
    }

    
    public function contact(){
        return view('theme.contact');
    }



}
