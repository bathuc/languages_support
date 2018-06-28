@extends('layouts.frontend.index')

@section('content')
    <h1 id="head1">Hiragana Game</h1>
    <div id="ajaxBox">
        @include('frontend.japan.hiragana.random')
    </div>
@endsection