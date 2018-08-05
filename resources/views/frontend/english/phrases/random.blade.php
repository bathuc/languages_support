@php
    $check20 = ($phrasesNumber == 20)? 'checked' : '';
    $check50 = ($phrasesNumber == 50)? 'checked' : '';
    $check100 = ($phrasesNumber == 100)? 'checked' : '';
    $checkRandom = ($phrasesNumber == 'random')? 'checked' : '';
@endphp

<div class="d-flex justify-content-between align-items-center pt-3 w-75">
    <div>
        <input type="radio" name="phrasesNumber" value="20" {{ $check20 }}> First 20 phrases
    </div>
    <div>
        <input type="radio" name="phrasesNumber" value="50" {{ $check50 }}> First 50 phrases
    </div>
    <div>
        <input type="radio" name="phrasesNumber" value="100" {{ $check100 }}> First 100 phrases
    </div>
    <div>
        <input type="radio" name="phrasesNumber" value="random" {{ $checkRandom }}> Random
    </div>
    <div class=" d-flex align-items-center">
        <label for="showTime" class="pr-2">Show Time</label>
        <input type="number" name="showTime" class="form-control" value="{{ $showTime }}">
    </div>
</div>

<div class="d-flex justify-content-between pt-4">
    <div class="word-wrap">
        <div class="page-content">
            <div class="wrapper-phrase">
                <span id="phrase_show">{{ $phrase['phrase'] }}</span>
                <div class="show-meaning pt-2" style="display: none">
                    <p id="meaning" >{{ $phrase['meaning'] }}</p>
                    @if(!empty($phrase['example']))
                        <span id="example" >{{ $phrase['example'] }}</span><br>
                    @endif
                    @if(!empty($phrase['example1']))
                        <span id="example1" >{{ $phrase['example1'] }}</span><br>
                    @endif
                </div>
            </div>
            <button class="btn btn-primary btn-lg btn-next">Next Phrase</button>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="table table-bordered info-table" cellspacing="0" cellpadding="0">
            <tbody>
            @for($i=0; $i<count($phrase12)+1; $i++)
                <tr>
                    @for($j = 0; $j<2; $j++)
                        @php $index = $i*2 + $j; @endphp
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


