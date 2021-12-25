@extends('pages.layouts.app')
@section('meta-content')
    @foreach ($blogs as $meta)
        @if($meta->url == 'how-to-prepare-for-a-job-interview')
            <meta name="description" content="Meta Description: The question of fear for job seekers or freshers is, ‘How to prepare for a job interview?' Here is the important tips you should know about an interview.">
            @elseif($meta->url == 'how-to-prepare-for-your-career')
            <meta name="description" content="How to prepare for your career, what activities should be practiced from student life. Detailed guidelines and important tips, that you must know">
        @endif
    @endforeach
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>
        @foreach ($blogs as $title)
         @if($title->url == 'how-to-prepare-for-a-job-interview')
           How to prepare for a job interview
         @elseif($title->url == 'how-to-prepare-for-your-career')
          Prepare for your career
          @endif
        @endforeach - Corporate Ask</title>
        
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-8 col-sm-12 float-left mt-5 mb-5">
                <div class="card" style="border: 2px solid #E22440; border-radius: 10px;">
                    <div class="card-header">
                        <h1  class="font-weight-bold" style="font-size: 28px; font-family: 'Hind Siliguri';">{{$blog->blog_name}}</h1>
                    </div>
                    <img src="{{asset('blog/images/'.$blog->blog_image)}}" style="height: 300px" class="card-img-top">
                    <div class="card-body">
                        <label class="text-info p-2">
                            <a href="{{ url('/Niaz-Ahmed') }}" class="float-left about_li"><i class="fa fa-user"> Niaz Ahmed</i></a>
                        </label>
                        <label class="text-info about_li p-2 float-right">
                            <li><i class="fa fa-comment"></i> 0 Comment</li>
                        </label>

                        <hr/>
                        <div class="text-justify" style="font-family: 'Hind Siliguri'; font-size: 18px">
                            <p class="text-justify">
                                @php echo $blog->description @endphp
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


            <div class="col-md-4 col-sm-12 float-left">
                <div class="card mt-5" style="border: 2px solid red; border-radius: 10px;">
                    <div class="card-header" style="background-color: #E22440;">
                        <h3 class="text-center text-white">Recent Blogs</h3>
                    </div>
                    <div class="card-body" style="border-bottom: 1px solid silver">
                        <ul>
                            @foreach($side_blogs as $side_blog)
                                <li style="color: red; font-family: 'Hind Siliguri'; font-size: 18px"><a href="{{ route('blog.enblogshow', ['ename'=>$side_blog->url]) }}" style="color: black;">{{ $side_blog->blog_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class="card mt-3" style="border: 2px solid red; border-radius: 10px;">

                    <div class="card-header"  style="background-color: #E22440;">
                        <h3 class="text-center text-white">Most Likes</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach($most_like as $most_likes)
                                <li style="color: red; font-family: 'Hind Siliguri'; font-size: 18px"><a href="{{ route('blog.enblogshow', ['ename'=>$most_likes->url]) }}" style="color: black;">{{ $most_likes->blog_name }} <sup class="text-danger"> {{ $most_likes->TotalLike }} Like</sup> </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
