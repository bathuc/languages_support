@extends('layouts.frontend.index')

@section('content')
    <h1>Tense</h1>
    <table class="table table-bordered info-table" summary="Explanation on English tenses" cellspacing="0">
        <tbody>

        @for($i=0; $i<count($tenses)+1; $i++)
            <tr>
                @for($j = 0; $j<4; $j++)
                    @php $index = $i*4 + $j; @endphp
                    @if(isset($tenses[$index]))
                        <td>
                            <a href="{{ route('tense.detail', $tenses[$index]['id']) }}">{{ $tenses[$index]['name_eng'] }}</a>
                        </td>
                    @endif
                @endfor
            </tr>
        @endfor
        </tbody>
    </table>

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