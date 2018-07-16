@extends('layouts.frontend.index')

@section('content')
    @if(empty($phrase))
        <h2>Phrase is empty</h2>
    @else
        <div id="ajaxBox">
            @include('frontend.english.phrases.random')
        </div>
    @endif
@endsection