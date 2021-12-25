<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\LikeUnlike;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class LikeunlikeController extends Controller
{
   
    public function new_like(Request $request, $id)
    {
        $like = LikeUnlike::all();

        foreach($like  as $sup){
            $ip_address = $sup->user_ip;
        }

        if ($request->ip() == $ip_address) {
            $user_ip_address = $request->ip();
            $blog  = new LikeUnlike();
            $blog->blog_id = $id;
            $blog->user_ip = $user_ip_address;
            $blog->status = '1';
            $blog->save();
         }else{
            $user_ip_address = $request->ip();
            $blog  = new LikeUnlike();
            $blog->blog_id = $id;
            $blog->user_ip = $user_ip_address;
            $blog->status = '1';
            $blog->save();
         }

        return back();

    }

    public function update_like(Request $request, $id)
    {
        $like = LikeUnlike::find($id);

        $like->status = '0';
        $like->delete();
        return back();
    }

    public function details()
    {
        $blog = Blog::all();

        $blogKey = 'blog_' . $blog->id;

        if (!Session::has($blogKey)) {
            $blog->increment('view_count');
            Session::put($blogKey,1);
        }
        // $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('pages.blogs.index',compact('blog'));

    }
}
