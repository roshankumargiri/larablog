@extends('layouts.backend.main')
@section('title','MyBlog | User index')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Display All Users</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="{{route('backend.user.index')}}">Users</a>
            </li>
            <li class="active">
                All Users
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
                            <a href="{{route('backend.user.create')}}" class="btn btn-success"> Add User</a>
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
                        @if (!$users->count())
                        <div class="alert alert-danger">
                            <strong>No record found</strong>
                        </div>
                        @else
                        <table class="table table-borered">
                            <thead>
                                <tr>
                                    <td width='80'><b>Action</b></td>
                                    <td><b>User Name</b></td>
                                    <td><b>User Email</b></td>
                                    <td><b>User Role</b></td>
                                    <td><b>Post Count</b></td>



                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>

                                    <td>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <form method="POST" action="{{route('backend.user.edit',$user->id)}}">
                                                    @method('GET')
                                                    @csrf
                                                    <button submit"
                                                        class="btn btn-xs btn-info {{ $user->id == 1 ? 'disabled':'' }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-xs-3">
                                                <form method="POST"
                                                    action="{{route('backend.user.destroy',$user->id)}}">
                                                    @method('DELETE')
                                                    @csrf


                                                    <button
                                                        onclick="return confirm('You are about to delete this user permanently. Are you sure you want to delete ?')"
                                                        submit"
                                                        class="btn btn-xs btn-danger {{ $user->id == 1 ? 'disabled':'' }}">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>-</td>
                                    <td>{{$user->posts->count()}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pull-left">
                            {{$users->appends(Request::query())->render()}}
                        </div>
                        <div class="pull-right">

                            <small>{{$userCount}}{{str_plural(' Item',$userCount)}}</small>

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
