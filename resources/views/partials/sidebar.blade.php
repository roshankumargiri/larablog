<div class="col-md-4">
    <aside class="right-sidebar">

        <div class="search-widget">
            <form action="{{route('post.search')}}" method="GET">
                <div class="input-group">
                    <input name="q" type="text" class="form-control input-lg" placeholder="Search for..."
                        value="{{old('q')}}">
                    <span class="input-group-btn">
                        <button type="submit" class="form-control input-lg"><i class="fa fa-search"></i></button>

                        <i class="fa fa-search"></i>
                        </input>
                    </span>
                </div>
            </form>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>

            <div class="widget-body">
                <ul class="categories">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{route('category',$category->slug)}}"><i
                                class="fa fa-angle-right"></i>{{$category->title}}</a>
                        <span class="badge pull-right">{{$category->posts->count()}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach($popular_posts as $popular_post)
                    <li>
                        <div class="post-image">
                            <a href="{{route('blog.show',$popular_post->slug)}}">
                                <img src="{{$popular_post->image_url}}" />
                            </a>
                        </div>
                        <div class="post-body">
                            <h6><a href="{{route('blog.show',$popular_post->slug)}}">{{$popular_post->title}}</a></h6>
                            <div class="post-meta">
                                <span>{{$popular_post->date}}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- <div class="widget">
                        <div class="widget-heading">
                            <h4>Tags</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="tags">
                                <li><a href="#">PHP</a></li>
                                <li><a href="#">Codeigniter</a></li>
                                <li><a href="#">Yii</a></li>
                                <li><a href="#">Laravel</a></li>
                                <li><a href="#">Ruby on Rails</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">Vue Js</a></li>
                                <li><a href="#">React Js</a></li>
                            </ul>
                        </div>
                    </div> -->

    </aside>
</div>
