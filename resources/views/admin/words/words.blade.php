@extends('layouts.admin.index')
@section('content')
    <section class="content-header">
        <h1>Words Management</h1>
        <ol class="breadcrumb">

            <form id="frmForm" method="post">
                {{ csrf_field() }}
                <div class="form-wrapper">
                    <div class="form-group row">
                        <input type="hidden" name="type" value="findWord"/>
                        <label class="col-md-3">Find Word</label>
                        <div class="col-md-7">
                            <input id="word" name="word" type="text" class="form-control" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-submit col-md-2">Find</button>
                    </div>
                </div>
            </form>
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
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="updateSound"/>
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
                            <th>subject</th>
                            <th>example</th>
                            <th>update_at</th>
                        </tr>
                        @foreach($words as $word)
                            <tr class="user-row pointer" data-text="{{ $word->id }}">
                                <td>{{ $word->id }}</td>
                                <td>{{ $word->word }}</td>
                                <td>{{ $word->meaning }}</td>
                                <td>{{ $word->subject->name_vi}}</td>
                                <td>{{ $word->example }}</td>
                                <td>{{ $word->updated_at }}</td>
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
    <style>
        .content-header{
            padding-bottom: 8px;
        }
        .breadcrumb{
            padding: 7px 30px !important;
        }
    </style>
@endsection