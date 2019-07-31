@extends('layouts.backend.main')
@section('title','MyBlog | Blog index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories
            <small>Add New Category</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="{{route('backend.category.index')}}">Categories</a>
            </li>
            <li class="active">
                Add Category
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action=" {{route('backend.category.store')}}" method="post" role="form" enctype="multipart/form-data">
                @include('backend.category.form')
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@include('backend.blog.script')
