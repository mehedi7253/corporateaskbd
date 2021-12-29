<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursepageController extends Controller
{
     public function index()
    {
        $categorys = category::paginate(10);
        return view('pages.courses.index', compact('categorys'));
    }

    public function show($tutorials)
    {
        $category = DB::select(DB::raw("SELECT * FROM categories WHERE url = '$tutorials'"));  
      
        // foreach($category as $categories){
        //     $category_url = $categories->url;
        // }  

        $courses = DB::select(DB::raw("SELECT * FROM categories, courses WHERE categories.id = courses.category_id AND categories.url = '$tutorials'"));
    
        return view('pages.courses.show', compact('courses', 'category'));
    }
}
