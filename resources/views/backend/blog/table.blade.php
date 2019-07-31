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
        @foreach ($posts as $post)
        <tr>

            <td>
                <div class="row">

                    <form method="POST" action="{{route('backend.blog.destroy',$post->id)}}">
                        @method('DELETE')
                        @csrf

                        <a href="{{route('backend.blog.edit',$post->id)}}" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
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
