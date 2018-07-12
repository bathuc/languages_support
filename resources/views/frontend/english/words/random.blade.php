
<h1 id="head1">Words Drill</h1>
<input type="radio" name="word" value="latestRand" checked> First 100 words
<input type="radio" name="word" value="Random"> Random
<br><br><br>

<div class="wrapper">
    <span id="hira_show" class="inline" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $word['word'] }}</span><br><br>
    <div class="show-meaning inline" style="display: none">
        <span id="meaning" >Meaning: {{ $word['meaning'] }}</span><br>
        @if(!empty($word['example']))
            <span id="example" >Example: {{ $word['example'] }}</span><br>
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
                    'latestRand': $('#word').val() == 'latestRand',
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
        height:80px;
    }
    .inline {
        display: inline;
    }
</style>

