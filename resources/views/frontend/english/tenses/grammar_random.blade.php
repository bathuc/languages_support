
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
            <input type="text" id="enter_tense" name="enter_tense" onkeypress="return cachEnter(event)" autocomplete="off"><br>
        </form>
    </div>
</div>

<script>
    $('#enter_tense').focus();

    function cachEnter(e){
        if(e.keyCode == 13){
            //enter case
            runGrammarTest();
            return false;
        }
        return true;
    }
    function loadRandomText(){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'post',
            url:  '{{ route('tenses.grammar.random') }}',
            data: {},
            success: function(respond) {
                $('#ajaxBox').html(respond);
            }
        });
    }

    var tenseName = '{{ $random['tense_name'] }}';
    function runGrammarTest(){
        $('#success').html('');
        $('#alert').html('');
        if($('#enter_tense').val().trim().toUpperCase() == tenseName.toUpperCase()){
            $('#success').html('correct');
            setTimeout(loadRandomText, 1300)
        }
        else{
            $('#alert').html('incorrect');
        }
    };
</script>