@extends('layouts.frontend.index')

@section('content')
    <h1 id="head1">Karakana Game</h1>
    <div id="ajaxBox">
        @include('frontend.japan.katakana.random')
    </div>
@endsection