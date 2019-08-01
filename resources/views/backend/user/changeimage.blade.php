@extends('layouts.backend.main')
@section('title','MyBlog | Blog index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            user
            <small>change User Image</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="{{route('backend.user.index')}}">User</a>
            </li>
            <li class="active">
                Change Profile Image
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action=" {{route('backend.user.updateimage',$user->id)}}" method="post" role="form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box ">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile Image</h3>
                    </div>
                    <div class="box-body text-center">
                        <div class="form-group{{$errors->has('image') ? ' has-error' : ''}}">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new img-thumbnail" style="width: 200px;">
                                    <img src="{{($user->image_url) ? $user->image_url : 'http://placehold.it/200x150&text=No+Image'}}"
                                        alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists img-thumbnail"
                                    style="max-width: 200px; max-height: 150px;">
                                </div>
                                <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select
                                            image</span><span class="fileinput-exists">Change</span><input type="file"
                                            name="image"></span>
                                    <a href="#" class="btn btn-default fileinput-exists"
                                        data-dismiss="fileinput">Remove</a>
                                </div><br>
                                <button class="btn btn-info" type="submit">Change Image</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@include('backend.blog.script')
