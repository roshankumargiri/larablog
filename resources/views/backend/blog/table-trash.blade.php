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
        <?php $request = request();?>
        @foreach ($posts as $post)
        <tr>

            <td>
                <div class="row">
                    <div class="col-xs-3">
                        <form method="POST" action="{{route('backend.blog.restore',$post->id)}}">
                            @method('PUT')
                            @csrf
                            @if(check_user_permissions($request,"Blog@restore",$post->id))
                            <button style="disply:inline-block" title="Restore" type="submit"
                                class="btn btn-xs btn-info ">
                                <i class="fa fa-undo"></i>
                            </button>
                            @else
                            <button style="disply:inline-block" onclick="return false;" title="Restore" type="submit"
                                class="btn btn-xs btn-info disabled">
                                <i class="fa fa-undo"></i>
                            </button>
                            @endif
                        </form>
                    </div>
                    <div class="col-xs-3">
                        <form method="POST" action="{{route('backend.blog.force-destroy',$post->id)}}">
                            @method('DELETE')
                            @csrf
                            @if(check_user_permissions($request,"Blog@forceDestroy",$post->id))
                            <button style="disply:inline-block"
                                onclick="return confirm('You are about to delete this post permanently. Are you sure you want to delete ?')"
                                title="Delete Permanent" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                            @else
                            <button style="disply:inline-block" onclick="return false;" title="Delete Permanent"
                                type="submit" class="btn btn-xs btn-danger disabled">
                                <i class="fa fa-times"></i>
                            </button>
                            @endif
                        </form>
                    </div>

                </div>
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category->title}}</td>
            <td>
                <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}
                </abbr>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
