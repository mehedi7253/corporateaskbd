@extends('pages.layouts.app')
@section('meta-content')
    <meta name="description" content="To get detailed ideas about resume writing, job interviews and
    LinkedIn profiles. Read Corporate Ask free hacks and guideline Blogs.">
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>Resume writing - Job Interview: Free Hacks & Guidelines | Corporate Ask</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mb-3">
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-sm-12 float-left mt-3">
                        <div class="card" id="blog">
                            <img src="{{ asset('blog/images/'.$blog->blog_image) }}" class="card-img-top"  alt="{{ $blog->blog_name }}" style="border-top-right-radius: 8px; border-top-left-radius: 8px;">
                            <div class="card-body">
                                <h1 style="font-size: 28px"><a href="{{ route('pages.blogs.show', ['name'=>$blog->url]) }}" class="text-decoration-none" style="font-family: 'Hind Siliguri'; font-size: 22px">{{ $blog->blog_name }}</a></h1>
                                {{-- <label class="text-muted font-italic p-2">
                                    <li class="float-left">Post Date: {{ date('Y-M-D', strtotime($blog->created_at)) }}</li>
                                </label> --}}
                                <div class="p-2">
                                    <p class="text-justify" style="font-family: 'Hind Siliguri'; font-size: 22px">
                                        
                                        @php
                                            echo (implode(' ', array_slice(explode(' ', strip_tags($blog->description)), 0, 50))."\n");
                                        @endphp
                                        <a href="{{ route('pages.blogs.show', ['name'=>$blog->url]) }}">...Read More</a>
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                              @php
                                  
                                  $like = DB::select(DB::raw("SELECT * FROM like_unlikes WHERE blog_id = '$blog->id'"));

                                    foreach($like  as $likeunlike){
                                        $blog_id    = $likeunlike->blog_id;
                                        $like_id    = $likeunlike->id;
                                        $ip_address = $likeunlike->user_ip;
                                    }
                                @endphp
                                    @if (\Request::ip() == $ip_address & $blog_id == $blog->id)

                                    <form action="{{ route('unlike.update_like', $likeunlike->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i></button>   
                                        <span>
                                            @php
                                                $like_count = DB::table('like_unlikes')->where('blog_id','=', $blog->id)->where('status','=','1')->count();
                                                echo $like_count;
                                            @endphp
                                            Like
                                        </span>  
                                    </form>       
                                    @else
                                    <form action="{{ route('like.new_like', $blog->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-up"></i></button>   
                                        <span>
                                            @php
                                                $like_count = DB::table('like_unlikes')->where('blog_id','=', $blog->id)->where('status','=','1')->count();
                                                echo $like_count;
                                            @endphp
                                            Like
                                        </span>  
                                    </form>           
                                    @endif
                                 
                                    <!--<a href="#" class="float-right text-decoration-none"><i class="fas fa-eye"></i>  0</a>-->
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="col-md-8 col-sm-12 float-left mt-5">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
