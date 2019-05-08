@extends('layouts.frontend.index')

@section('content')
    <div class="head-title">
        <h1 class="title">{{ $tense->name_eng }}</h1>
        <div class="inline">
            @if($tense->id >1)
                <button type="button" class="btn btn-primary back-tense">Back Tense</button>
            @endif
            <button type="button" class="btn btn-primary next-tense">Next Tense</button>
        </div>
    </div>

    <table class="info-table" summary="Explanation on English tenses" cellspacing="0">
        <tbody><tr>
            <th style="width:20%;">Affirmative/Negative/Question</th>
            <th style="width:30%;">Use</th>
            <th style="width:20%;">Signal Words</th>
        </tr>
        <tr>
            <td>
                @foreach($tense->tenseExample as $example)
                    {{ $example->describe }}<br>
                @endforeach
            </td>
            <td>
                <ul>
                    @foreach($tense->tenseUse as $use)
                        <li>{{ $use->describe }}</li>&nbsp; <br>
                    @endforeach
                </ul>
            </td>
            <td>
                {{ $tense->signal_words }}
            </td>
        </tr>
        </tbody>
    </table>

    <script>
        $('.back-tense').click(function(){
            window.location = '{{route('tense.detail', $tense->id - 1)}}';
        });

        $('.next-tense').click(function(){
            window.location = '{{route('tense.detail', $tense->id + 1)}}';
        });
    </script>
    <style>
        table.info-table tr th {
            font-size: 0.9em;
            font-weight: normal;
            text-align: center;
            padding: 2px 5px;
            color: #000;
            background-color: #ffd35d;
            border: 1px solid silver;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        table.info-table td {
            border: 2px solid silver;
        }
        table.info-table tr th {
            font-size: 0.9em;
            font-weight: normal;
            text-align: center;
            padding: 2px 5px;
            color: #000;
            background-color: #ffd35d;
            border: 2px solid silver;
        }
        ul li{
            list-style-type:disc
        }
        .head-title {
            display: inline-block;
            width: 100%;
            overflow: hidden;
            clear: both;
            padding: 20px 0;
        }
        .head-title h1{
            margin: 0 auto;
        }
        #head1{
            float:left;
            width: 80%;
        }
        .inline{
            /*display: inline-block;*/
            float:right;
            width: 20%;
        }
        button.back-tense {
        }
        button.next-tense {
            margin-left:10px;
        }

    </style>
@endsection