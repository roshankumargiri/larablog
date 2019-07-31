@extends('layouts.backend.main')
@section('title','MyBlog | Blog index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
            <small>Delete User</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="{{route('backend.user.index')}}">Users</a>
            </li>
            <li class="active">
                Delete User
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action=" {{route('backend.user.confirmdelete',$deluser->id)}}" method="post" role="form"
                enctype="multipart/form-data">
                @csrf
                <div class="col-xs-9">
                    <div class="box">
                        <p>You have specified the following user for deletion: </p>
                        User Name:{{$deluser->name}}
                        User Id: {{$deluser->id}}

                        <p>What should be done with content own by this user?</p>
                        <div class="form-group{{$errors->has('category_id') ? ' has-error' : ''}}">
                            <select name="newuser">
                                <option selected value="none">Delete all Content</option>
                                @foreach ($users as $user)
                                @if($user->id != $deluser->id)
                                <option value="{{$user->id}}">Assign to: {{$user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <button class="btn btn-danger" type="submit">Delete User</button>
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
