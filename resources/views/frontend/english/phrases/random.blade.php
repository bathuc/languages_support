
@php

@endphp

<h1 id="head1">Phrases Game</h1>
<input type="radio" name="phrases" value="latestRand" checked> First 100 phrases
<input type="radio" name="phrases" value="Random"> Random
<br><br><br>

<div class="wrapper">
    <span id="hira_show" class="inline" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $phrase['phrase'] }}</span><br><br>
    <div class="show-meaning inline" style="display: none">
        <span id="meaning" >Meaning: {{ $phrase['meaning'] }}</span><br>
        <span id="example" >Example: {{ $phrase['example'] }}</span><br>
    </div>
</div>

<br><br>
<button class="btn btn-primary btn-next">Next Phrase</button>
<button class="btn btn-primary btn-show-meaning">Show Meaning</button>

<script>
    $(document).ready(function () {
        $('.btn-next').click(function(){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url:  '{{ route('phrases.random') }}',
                data: {
                    'latestRand': $('#phrase').val() == 'latestRand',
                },
                success: function(respond) {
                    $('#ajaxBox').html(respond);
                }
            });
        });

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

