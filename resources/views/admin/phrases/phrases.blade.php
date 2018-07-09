@extends('layouts.admin.index')
@section('content')
    <section class="content-header">
        <h1>Phrase Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Phrases</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <form role="form">
                        <p>Add a phrase</p>
                        <a href="{{ route('admin.phrases.new') }}" class="btn btn-primary btn-flat">New Phrase</a>
                    </form>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <p class="box-note"><span>From {{ $phrases->firstItem() }} To {{ $phrases->lastItem() }} </span> <span>Total: {{ $phrases->total() }} phrases</span></p>
                    <div class="box-tools">
                        {!! $phrases->links() !!}
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>id</th>
                            <th>word</th>
                            <th>meaning</th>
                            <th>example</th>
                        </tr>
                        @foreach($phrases as $phrase)
                            <tr class="user-row pointer" data-text="{{ $phrase->id }}">
                                <td>{{ $phrase->id }}</td>
                                <td>{{ $phrase->phrase }}</td>
                                <td>{{ $phrase->meaning }}</td>
                                <td>{{ $phrase->example }}</td>
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
                window.location.href = 'phrases/edit/'+$(this).attr('data-text');
            })
        });
    </script>
@endsection