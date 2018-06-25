@extends('layouts.frontend.index')

@section('content')
    <h1 id="head1">Katakana Drill</h1>
    @if(!$testFlag)
        @include('frontend.japan.katakana.selection')
    @else
        @php
            $randKeys = array_rand($katakana, 4);
            $randText = $katakana[$randKeys[0]]['name'] . $katakana[$randKeys[1]]['name'] . $katakana[$randKeys[2]]['name'] . $katakana[$randKeys[3]]['name'] ;
            $randRomaji = $katakana[$randKeys[0]]['romaji'] . $katakana[$randKeys[1]]['romaji'] . $katakana[$randKeys[2]]['romaji'] . $katakana[$randKeys[3]]['romaji'] ;
        @endphp
        <div id="kana">
            <span id="kana_show" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $randText }}</span><br>
            <span id="alert"></span>
            <span id="success"></span>
        </div>
        <div id="main">
            <div id="entry_area">
                Type the rōmaji:<br>
                <form method="post" id="frm">
                    <input type="text" id="enter_romaji" name="enter_romaji" autocomplete="off"><br>
                    {{--<input type="submit" value="Submit"/>--}}
                </form>
            </div>
        </div>
        <script>
            $('#enter_romaji').focus();
            function randomData(){

            }
            function runKanaTest(){
                $('#success').html('');
                $('#alert').html('');
                if($('#enter_romaji').val() == '{{$randRomaji}}'){
                    $('#success').html('correct');
                }
                else{
                    $('#alert').html('incorrect');
                }
            };

            $('#frm').on('submit',function(e){
                e.preventDefault();
                runKanaTest();
            })
        </script>
    @endif
@endsection