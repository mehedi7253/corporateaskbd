<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogpageController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blogs')->where('status','=','0')->where('type','=','bangla')->paginate(6);
        return view('pages.blogs.index', compact('blogs'));
    }

    public function englishblog()
    {
        $blogs = DB::table('blogs')->where('status','=','0')->where('type','=','english')->paginate(6);
        return view('pages.englishblogs.index', compact('blogs'));
    }


    public function show($name)
    { 
        $blogs = DB::select(DB::raw("SELECT * FROM blogs WHERE url = '$name'"));    
        $side_blogs = DB::table('blogs')->where('status','=','0')->where('type','=','bangla')->orderByDesc('blog_name')->paginate(5);

        // SELECT *, COUNT(blog_id) FROM like_unlikes GROUP BY blog_id HAVING COUNT(blog_id)>1;

        $most_like = DB::select(DB::raw('SELECT *, COUNT(like_unlikes.blog_id) As TotalLike FROM blogs, like_unlikes WHERE like_unlikes.blog_id = blogs.id GROUP BY blog_id HAVING COUNT(blog_id)>1'));

        return view('pages.blogs.show', compact('blogs','side_blogs', 'most_like'));
    }

    public function englishshow($ename)
    { 
        $blogs = DB::select(DB::raw("SELECT * FROM blogs WHERE url = '$ename'"));    
        $side_blogs = DB::table('blogs')
                ->where('status','=','0')
                ->where('type','=','english')
                ->orderByDesc('blog_name')
                ->paginate(5);

        $most_like = DB::select(DB::raw("SELECT *, COUNT(like_unlikes.blog_id) AS TotalLike FROM blogs, like_unlikes WHERE like_unlikes.blog_id = blogs.id AND blogs.type = 'english'  GROUP BY like_unlikes.blog_id HAVING COUNT(like_unlikes.blog_id)>1"));

        return view('pages.englishblogs.show', compact('blogs','side_blogs', 'most_like'));
    }
    
    public function visitor($id)
    {
        $blog = Blog::find($id);
        $visitors = $blog->visitor + 1;
        $blog->update(['visitor' => $visitors]);
        
    }
}
