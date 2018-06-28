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

    <h1>Grammar Check</h1>
    <div id="hira">
        <span id="hira_show" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $random['rand_text'] }}</span><br>
        <span id="alert"></span>
        <span id="success"></span>
    </div>
    <br>
    <div id="main">
        <div id="entry_area">
            Type the Tense:<br>
            <form method="post" id="frm">
                <input type="text" id="enter_tense" name="enter_tense" autocomplete="off"><br>
            </form>
        </div>
    </div>
    <script>
        $('#enter_tense').focus();

        function runHiraTest(){
            $('#success').html('');
            $('#alert').html('');
            var tenseName = '{{ $random['tense_name'] }}';
            if($('#enter_tense').val().trim().toUpperCase() == tenseName.toUpperCase()){
                $('#success').html('correct');
            }
            else{
                $('#alert').html('incorrect');
            }
        };

        $('#frm').on('submit',function(e){
            e.preventDefault();
            runHiraTest();
        })

    </script>

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