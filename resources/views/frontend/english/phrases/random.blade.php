@php
    $check20 = ($phrasesNumber == 20)? 'checked' : '';
    $check50 = ($phrasesNumber == 50)? 'checked' : '';
    $check100 = ($phrasesNumber == 100)? 'checked' : '';
    $checkRandom = ($phrasesNumber == 'random')? 'checked' : '';
@endphp

<h1 id="head1">Phrases Game</h1>
<div class="phrase-wrapper">
    <input type="radio" name="phrasesNumber" value="20" {{ $check20 }}> First 20 phrases
</div>
<div class="phrase-wrapper">
    <input type="radio" name="phrasesNumber" value="50" {{ $check50 }}> First 50 phrases
</div>
<div class="phrase-wrapper">
    <input type="radio" name="phrasesNumber" value="100" {{ $check100 }}> First 100 phrases
</div>
<div class="phrase-wrapper">
    <input type="radio" name="phrasesNumber" value="random" {{ $checkRandom }}> Random
</div>
<div class="phrase-wrapper">
    Show Time <input type="number" name="showTime" value="{{ $showTime }}">
</div>
<br><br><br>

<span id="hira_show" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $phrase['phrase'] }}</span><br><br>
<div class="page-content">
    <div class="wrapper inline">
        <div class="show-meaning inline" style="display: none">
            <p id="meaning" >{{ $phrase['meaning'] }}</p>
            @if(!empty($phrase['example']))
                <span id="example" >{{ $phrase['example'] }}</span><br>
            @endif
            @if(!empty($phrase['example1']))
                <span id="example1" >{{ $phrase['example1'] }}</span><br>
            @endif
        </div>
        <br><br>
        <button class="btn btn-primary btn-next">Next Phrase</button>
    </div>
    <div class="table-wrapper inline">
        <table class="table table-bordered info-table" cellspacing="0" cellpadding="0">
            <tbody>
            @for($i=0; $i<count($phrase12)+1; $i++)
                <tr>
                    @for($j = 0; $j<3; $j++)
                        @php $index = $i*3 + $j; @endphp
                        @if(isset($phrase12[$index]))
                            <td>
                                <a href="javascript:void(0)" class="phrase"
                                   data-phrase-id="{{ $phrase12[$index]['id'] }}">{{ $phrase12[$index]['phrase'] }}</a>
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

<script>
    $(document).ready(function () {
        $('.btn-next').click(function(){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url:  '{{ route('phrases.random') }}',
                data: {
                    'phrasesNumber': $('input[name=phrasesNumber]:checked').val(),
                    'showTime': $('input[name=showTime]').val(),
                },
                success: function(respond) {
                    $('#ajaxBox').html(respond);
                }
            });
        });

        var showTime = {{ $showTime }} * 1000;
        setTimeout(function(){ $('.show-meaning').show(); }, showTime);

        $('.btn-show-meaning').click(function(){
            $('.show-meaning').show();
        });

        $('.phrase').click(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '{{ route('phrases.random') }}',
                data: {
                    'phraseId': $(this).data('phrase-id'),
                    'phrasesNumber': $('input[name=phrasesNumber]:checked').val(),
                    'showTime': $('input[name=showTime]').val(),
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
        width: 60%
    }
    .table-wrapper {
        width: 39%;
    }
    .phrase-wrapper {
        display: inline-block;
        margin-right: 50px;
    }
    .info-table a {
        text-decoration: none;
    }
    #meaning {
        font-size: 25px;
    }
    .show-meaning{
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
</style>

