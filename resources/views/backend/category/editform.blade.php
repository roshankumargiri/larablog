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
            <form action=" {{route('backend.category.update',$category->id)}}" method="post" role="form"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="col-xs-9">
                    <div class="box">

                        <div class="box-body">
                            <div class="form-group{{$errors->has('title') ? ' has-error' : ''}}">
                                <label for="title">Title</label>
                                <input type="text" name="title" placeholder="Enter Title here" id="title"
                                    class="form-control" value="{{ $category->title }}">
                                @if ($errors->has('title'))
                                <span class="help-block">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                            <div class="form-group{{$errors->has('slug') ? ' has-error' : ''}}">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ $category->slug }}">
                                @if ($errors->has('slug'))
                                <span class="help-block">{{$errors->first('slug')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <button class="btn btn-info" type="submit">Update Category</button>
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
