@extends('layouts.backend.main')
@section('title','MyBlog | Blog index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Add New User</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="{{route('backend.user.index')}}">Users</a>
            </li>
            <li class="active">
                Add User
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action=" {{route('backend.user.store')}}" method="post" role="form" enctype="multipart/form-data">
                @include('backend.user.form')
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@include('backend.blog.script')
