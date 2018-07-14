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


<br><br><br>

<div class="wrapper">
    <span id="hira_show" class="inline" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $word['word'] }}</span><br><br>
    <div class="show-meaning inline" style="display: none">
        <span id="meaning" >Meaning: {{ $word['meaning'] }}</span><br>
        @if(!empty($word['example']))
            <span id="example" >{{ $word['example'] }}</span><br>
        @endif
        @if(!empty($word['example1']))
            <span id="example1" >{{ $word['example1'] }}</span><br>
        @endif
    </div>
</div>

<br><br>
<button class="btn btn-primary btn-next">Next Word</button>
{{--<button class="btn btn-primary btn-show-meaning">Show Meaning</button>--}}

<script>
    $(document).ready(function () {
        $('.btn-next').click(function(){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url:  '{{ route('word.random') }}',
                data: {
                    'wordNumber': $('input[name=wordNumber]:checked').val(),
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
    .word-wrapper {
        display: inline-block;
        margin-right: 50px;
    }
</style>

