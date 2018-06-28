
<div id="hira">
    <span id="kana_show" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $random['katakana_text'] }}</span><br>
    <span id="alert"></span>
    <span id="success"></span>
</div>
<div id="main">
    <div id="entry_area">
        Type the rōmaji:<br>
        <input type="text" id="enter_romaji" name="enter_romaji" onkeypress="return cachEnter(event)" autocomplete="off"><br>
    </div>
</div>
<script>
    $('#enter_romaji').focus();
    function cachEnter(e){
        if(e.keyCode == 13){
            //enter case
            runKanaTest();
            return false;
        }
        return true;
    }

    function loadRandomText(){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'post',
            url:  '{{ route('katakana.random') }}',
            data: {},
            success: function(respond) {
                $('#ajaxBox').html(respond);
            }
        });
    }

    function runKanaTest(){
        $('#success').html('');
        $('#alert').html('');
        var randRomaji = '{{ $random['romaji'] }}';
        if($('#enter_romaji').val().trim() == randRomaji){
            $('#success').html('correct');
            setTimeout(loadRandomText, 1300);
        }
        else{
            $('#alert').html('incorrect');
        }
    };

</script>