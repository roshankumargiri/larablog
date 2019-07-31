@extends('layouts.backend.main')
@section('title','MyBlog | Blog index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
            <small>Edit Post</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="{{route('backend.blog.index')}}">Blog</a>
            </li>
            <li class="active">
                Edit Post
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            @include('backend.blog.editform')

        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@include('backend.blog.script')
