@extends('layouts.admin.index')
@section('content')
    <section class="content-header">
        <h1>Words Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Words</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            @if(session()->has('flash_success'))
                <div class="alert alert-success"> {{ session()->get('flash_success') }} </div>
            @endif

            <div class="box">
                <div class="box-body">
                    <p>Add a word</p>
                    <a href="{{ route('admin.words.new') }}" class="btn btn-primary btn-flat">new word</a>
                    <button  class="btn btn-primary btn-flat pull-right update-sound">Update Sound Link</button>
                    <form id="frmSound">
                        <input type="hidden" name="updateSound" value="update"/>
                    </form>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <p class="box-note"><span>From {{ $words->firstItem() }} To {{ $words->lastItem() }} </span> <span>Total: {{ $words->total() }}words</span></p>
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
            });
            $('.update-sound').click(function(){
                $('#frmSound').submit();
            });
        });
    </script>
@endsection