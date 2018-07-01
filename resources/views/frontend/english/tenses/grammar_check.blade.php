@extends('layouts.frontend.index')

@section('content')
    <div id="ajaxBox">
        @include('frontend.english.tenses.grammar_random')
    </div>

    <style>
        .info-table a{
            text-decoration: none;
        }
        .table-bordered {
            border: none;
        }
        #hira_show {
            font-size: 282%;
            margin-top: 230px;
        }
    </style>
@endsection