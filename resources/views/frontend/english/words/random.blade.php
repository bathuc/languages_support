@php
    $check20 = ($wordNumber == 20)? 'checked' : '';
    $check50 = ($wordNumber == 50)? 'checked' : '';
    $check100 = ($wordNumber == 100)? 'checked' : '';
    $checkRandom = ($wordNumber == 'random')? 'checked' : '';
@endphp

<h1 id="head1">Words Drill</h1>
<div class="word-wrapper">
    <input type="radio" name="wordNumber" value="20" {{ $check20 }} > First 20 words
</div>
<div class="word-wrapper">
    <input type="radio" name="wordNumber" value="50" {{ $check50 }}> First 50 words
</div>
<div class="word-wrapper">
    <input type="radio" name="wordNumber" value="100" {{ $check100 }}> First 100 words
</div>
<div class="word-wrapper">
    <input type="radio" name="wordNumber" value="random" {{ $checkRandom }}> Random
</div>
<div class="word-wrapper">
    Show Time <input type="number" name="showTime" value="{{ $showTime }}">
</div>
<div class="word-wrapper">
    <select name="subjectId" id="dropDownId" class="box_inline form-control w50">
        @foreach($subject as $item)
            @if($subjectId == $item->id)
                <option value="{{ $item->id }}" selected="selected">{{ $item->name_vi }}</option>
            @else
                <option value="{{ $item->id }}">{{ $item->name_vi }}</option>
            @endif
        @endforeach
    </select>
</div>
<br><br><br>

@if(!empty($word))
    <span id="hira_show"
          style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $word['word'] }}</span>
    <div class="page-content">
        <div class="wrapper inline">
            <div class="show-meaning" style="display: none">
                @if(!empty($word['sound']))
                    <audio autoplay class="audio">
                        <source src="{{$word['sound']}}" type="audio/mpeg">
                    </audio>
                @endif
                @if(!empty($word['ipa']))
                    <span>{{$word['ipa']}}</span><br>
                @endif
                <p id="meaning">​</i>{{ $word['meaning'] }}</p>
                @if(!empty($word['example']))
                    <span id="example">{{ $word['example'] }}</span><br>
                @endif
                @if(!empty($word['example1']))
                    <span id="example1">{{ $word['example1'] }}</span><br>
                @endif
            </div>
            <br><br>
            <button class="btn btn-primary btn-next">Next Word</button>
        </div>
        <div class="table-wrapper inline">
            <table class="table table-bordered info-table" cellspacing="0" cellpadding="0">
                <tbody>
                @for($i=0; $i<count($word12)+1; $i++)
                    <tr>
                        @for($j = 0; $j<4; $j++)
                            @php $index = $i*4 + $j; @endphp
                            @if(isset($word12[$index]))
                                <td>
                                    <a href="javascript:void(0)" class="word"
                                       data-word-id="{{ $word12[$index]['id'] }}">{{ $word12[$index]['word'] }}</a>
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>


    {{--<button class="btn btn-primary btn-show-meaning">Show Meaning</button>--}}
@else
    <h2>Word is empty</h2>
@endif
<script>
    $(document).ready(function () {
        $('.btn-next').click(function () {
            getNextWord();
        });

        $('#dropDownId').on('change', function () {
            getNextWord();
        });

        function getNextWord() {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '{{ route('word.random') }}',
                data: {
                    'wordNumber': $('input[name=wordNumber]:checked').val(),
                    'showTime': $('input[name=showTime]').val(),
                    'subjectId': $('#dropDownId').val(),
                },
                success: function (respond) {
                    $('#ajaxBox').html(respond);
                }
            });
        }

        var showTime = {{ $showTime }} * 1000;
        setTimeout(function () {
            $('.show-meaning').show();
        }, showTime);

        $('.btn-show-meaning').click(function () {
            $('.show-meaning').show();
        });

        var soundPath = "{{$word['sound']}}";
        var sounnd = new Audio(soundPath);
        $('#hira_show').click(function(){
            sounnd.play();
        });

        $('.word').click(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '{{ route('word.random') }}',
                data: {
                    'wordId': $(this).data('word-id'),
                    'wordNumber': $('input[name=wordNumber]:checked').val(),
                    'showTime': $('input[name=showTime]').val(),
                    'subjectId': $('#dropDownId').val(),
                },
                success: function (respond) {
                    $('#ajaxBox').html(respond);
                }
            });
        });
    });
</script>
<style>
    .inline {
        display: inline-block;
    }

    .wrapper {
        /*height: 100px;*/
        width: 60%
    }

    .table-wrapper {
        width: 39%;
    }

    .info-table a {
        text-decoration: none;
    }

    .word-wrapper {
        display: inline-block;
        margin-right: 50px;
    }

    #meaning {
        font-size: 25px;
    }

    .show-meaning {
        font-size: 20px;
    }

    input[type=number] {
        width: 50px;
        text-align: center;
    }

    .table-bordered {
        border: none;
        border-collapse: collapse;
    }

    table, tr, td {
        border: none;
    }

    #hira_show {
        cursor: pointer;
    }
</style>

