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

<br><br><br>

<div class="wrapper">
    <span id="hira_show" class="inline" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $phrase['phrase'] }}</span><br><br>
    <div class="show-meaning inline" style="display: none">
        <span id="meaning" >Meaning: {{ $phrase['meaning'] }}</span><br>
        @if(!empty($phrase['example']))
            <span id="example" >{{ $phrase['example'] }}</span><br>
        @endif
        @if(!empty($phrase['example1']))
            <span id="example1" >{{ $phrase['example1'] }}</span><br>
        @endif
    </div>
</div>

<br><br>
<button class="btn btn-primary btn-next">Next Phrase</button>
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
                },
                success: function(respond) {
                    $('#ajaxBox').html(respond);
                }
            });
        });

        setTimeout(function(){ $('.show-meaning').show(); }, 3000);

        $('.btn-show-meaning').click(function(){
            $('.show-meaning').show();
        });
    });
</script>
<style>
    .wrapper{
        height:100px;
    }
    .inline {
        display: inline;
    }
    .phrase-wrapper {
        display: inline-block;
        margin-right: 50px;
    }
</style>

