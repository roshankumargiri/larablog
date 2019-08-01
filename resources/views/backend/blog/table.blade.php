<table class="table table-borered">
    <thead>
        <tr>
            <td width='80'><b>Action</b></td>
            <td><b>Title</b></td>
            <td width='150'><b>Author</b></td>
            <td width='150'><b>Category</b></td>
            <td width='150'><b>Date</b></td>

        </tr>
    </thead>
    <tbody>
        <?php $request = request(); ?>
        @foreach ($posts as $post)
        <tr>

            <td>
                <div class="row">

                    <form method="POST" action="{{route('backend.blog.destroy',$post->id)}}">
                        @method('DELETE')
                        @csrf
                        @if(check_user_permissions($request,"Blog@edit",$post->id))
                        <a href="{{route('backend.blog.edit',$post->id)}}" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i>
                        </a>
                        @else
                        <a href="#" class="btn btn-xs btn-info disabled">
                            <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if(check_user_permissions($request,"Blog@destroy",$post->id))
                        <button type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                        @else
                        <button type="button" onclick="return false;" class="btn btn-xs btn-danger disabled">
                            <i class="fa fa-trash"></i>
                        </button>
                        @endif
                    </form>

                </div>
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category->title}}</td>
            <td>
                <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}
                </abbr> |
                {!!$post->publicationLabel()!!}
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
