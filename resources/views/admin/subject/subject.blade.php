@extends('layouts.admin.index')
@section('content')
    <section class="content-header">
        <h1>Subject Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Subjects</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <form role="form">
                        <p>Add a Subject</p>
                        <a href="{{ route('admin.subject.new') }}" class="btn btn-primary btn-flat">New Subject</a>
                    </form>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <p class="box-note"><span>From {{ $subject->firstItem() }} To {{ $subject->lastItem() }} </span> <span>Total: {{ $subject->total() }} Subjects</span></p>
                    <div class="box-tools">
                        {!! $subject->links() !!}
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>id</th>
                            <th>English</th>
                            <th>Viet</th>
                        </tr>
                        @foreach($subject as $item)
                            <tr class="subject-row pointer" data-text="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name_eng }}</td>
                                <td>{{ $item->name_vi }}</td>
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
            $('.subject-row').click(function(){
                window.location.href = 'subject/edit/'+$(this).attr('data-text');
            })
        });
    </script>
@endsection