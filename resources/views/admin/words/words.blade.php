@extends('layouts.admin.index')
@section('content')
    <section class="content-header">
        <h1>ユーザー管理</h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Words</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <form role="form">
                        <p>Add a word</p>
                        <a href="{{ route('admin.words.new') }}" class="btn btn-primary btn-flat">new word</a>
                    </form>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <p class="box-note"><span>{{ $words->firstItem() }} 件目～{{ $words->lastItem() }}件目</span> <span>計: {{ $words->total() }}件</span></p>
                    <div class="box-tools">
                         {!! $words->links() !!}
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
                        @foreach($words as $word)
                            <tr class="user-row pointer" data-text="{{ $word->id }}">
                                <td>{{ $word->id }}</td>
                                <td>{{ $word->word }}</td>
                                <td>{{ $word->meaning }}</td>
                                <td>{{ $word->example }}</td>
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
                console.log();
                window.location.href = 'words/edit/'+$(this).attr('data-text');
            })
        });
    </script>
@endsection