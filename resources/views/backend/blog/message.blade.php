@if (session('message'))
<div class="alert alert-info">
    {{session('message')}}
</div>


@elseif (session('trash-message'))
<div class="alert alert-info">
    <?php list($message,$postId)= session('trash-message')?>
    <form method="Post" action="{{route('backend.blog.restore',$postId)}}">
        @csrf
        @method('PUT')
        {{$message}}

        <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-undo"></i> Undo</button>
    </form>
</div>

@endif
