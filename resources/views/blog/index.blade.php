@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(!$posts->count())
            <div class="alert alert-danger">
                <p> Nothing Found</p>
            </div>
            @elseif(isset($categoryName))
            <div class="alert alert-info">
                <p> Category: <b>{{' '.$categoryName}}</b></p>
            </div>
            @elseif(isset($searchWord))
            <div class="alert alert-info">
                <p> Search results for: <b>{{' '.$searchWord}}</b></p>
            </div>
            @elseif(isset($userName))
            <div class="alert alert-info">
                <p> Posts By: <b>{{' '.$userName}}</b></p>
            </div>
            @endif
            @foreach($posts as $post)
            <article class="post-item">
                @if($post->image_url)
                <div class="post-item-image">
                    <a href="{{route('blog.show',$post->slug)}}">
                        <!-- <img src="/img/{{$post->image}}" alt=""> -->
                        <img src="{{$post->image_url}}" alt="">
                    </a>
                </div>
                @endif
                <div class="post-item-body">
                    <div class="padding-10">
                        <h2><a href="{{route('blog.show',$post->slug)}}">{{$post->title}}</a></h2>
                        <p>{!!$post->excerpt_html !!}</p>
                    </div>

                    <div class="post-meta padding-10 clearfix">
                        <div class="pull-left">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="{{route('user',$post->user->slug)}}">
                                        {{$post->user->name}}</a></li>
                                <li><i class="fa fa-clock-o"></i><time> {{$post->date}}</time></li>
                                <li><i class="fa fa-folder"></i><a href="{{route('category',$post->category->slug)}}">
                                        {{$post->category->title}}</a></li>
                                <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                            </ul>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('blog.show',$post->slug)}}">Continue Reading &raquo;</a>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            <nav>
                {{$posts->links()}}
            </nav>
        </div>

        @include('partials.sidebar')
    </div>
</div>

@endsection
