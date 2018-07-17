@extends('layouts.admin.index')
@section('content')
    <section class="content-header">
        <h1>User Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <form role="form">
                        <p>Add a User</p>
                        <a href="{{ route('admin.user.new') }}" class="btn btn-primary btn-flat">New User</a>
                    </form>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <p class="box-note">
                        <span class="text-red">User management will not show super admin</span><br/>
                        <span>From {{ $user->firstItem() }} To {{ $user->lastItem() }} </span> <span>Total: {{ $user->total() }} Users</span>
                    </p>
                    <div class="box-tools">
                        {!! $user->links() !!}
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        @foreach($user as $item)
                            <tr class="user-row pointer" data-text="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <style>
            .pointer {cursor: pointer;}
        </style>

    </section>
    <script>
        $(document).ready(function(){
            $('.user-row').click(function(){
                window.location.href = 'user/edit/'+$(this).attr('data-text');
            })
        });
    </script>
@endsection