@extends('layouts.backend.main')
@section('title','MyBlog | Category index')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories
            <small>Display All Categories</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="{{route('backend.category.index')}}">Categories</a>
            </li>
            <li class="active">
                All Categories
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header clearfix">
                        <div class="pull-left">
                            <a href="{{route('backend.category.create')}}" class="btn btn-success"> Add Category</a>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        @if (session('message'))
                        <div class="alert alert-info">
                            {{session('message')}}
                        </div>
                        @elseif (session('error-message'))
                        <div class="alert alert-danger">
                            {{session('error-message')}}
                        </div>
                        @endif
                        @if (!$categories->count())
                        <div class="alert alert-danger">
                            <strong>No record found</strong>
                        </div>
                        @else
                        <table class="table table-borered">
                            <thead>
                                <tr>
                                    <td width='80'><b>Action</b></td>
                                    <td><b>Category Name</b></td>
                                    <td><b>Post Count</b></td>



                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>

                                    <td>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <form method="POST"
                                                    action="{{route('backend.category.edit',$category->id)}}">
                                                    @method('PUT')
                                                    @csrf
                                                    <button submit"
                                                        class="btn btn-xs btn-info {{ $category->id == 21 ? 'disabled':'' }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-xs-3">
                                                <form method="POST"
                                                    action="{{route('backend.category.destroy',$category->id)}}">
                                                    @method('DELETE')
                                                    @csrf


                                                    <button
                                                        onclick="return confirm('You are about to delete this category permanently. Are you sure you want to delete ?')"
                                                        submit"
                                                        class="btn btn-xs btn-danger {{ $category->id == 21 ? 'disabled':'' }}">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->posts->count()}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pull-left">
                            {{$categories->appends(Request::query())->render()}}
                        </div>
                        <div class="pull-right">

                            <small>{{$categoriesCount}}{{str_plural(' Item',$categoriesCount)}}</small>

                        </div>
                    </div>
                    @endif
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>


@endsection
@section('script')
<script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');

</script>
@endsection
