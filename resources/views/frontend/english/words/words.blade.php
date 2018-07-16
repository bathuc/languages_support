@extends('layouts.frontend.index')

@section('content')
    @if(empty($word))
        <h2>Word is empty</h2>
    @else
        <div id="ajaxBox">
            @include('frontend.english.words.random')
        </div>
    @endif
@endsection