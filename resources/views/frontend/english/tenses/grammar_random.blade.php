
@php
    $simpleCheck = ($simpleRand == true) ? 'checked' : '';
    $normalCheck = ($simpleRand == false) ? 'checked' : '';
    $randomText =  ($simpleRand == true) ? $random['rand_simple_text'] : $random['rand_text'];

    $exampleFlag = session()->get('type') == 'example' ? true : false;
@endphp
<div class="pt-4"></div>
<h1 class="title">Grammar Check</h1>
<div class="pt-3"></div>
@if($exampleFlag)
    <input id="firstRadio" type="radio" name="randText" value="simple" {{ $simpleCheck }}/><label for="firstRadio" class="radioText text-success">Simple</label>
    <input id="secondRadio" type="radio" name="randText" value="normal" {{ $normalCheck }}/><label for="secondRadio" class="radioText text-success">Normal</label>
@endif
<div id="hira">
    <span id="hira_show" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102);">{{ $randomText }}</span><br>
    <span id="alert"></span>
    <span id="success"></span>
</div>
<br>
<div id="main">
    <div id="entry_area">
        {{--Type the Tense:<br>
        <form method="post" id="frm">
            <input type="text" id="enter_tense" name="enter_tense" onkeypress="return cachEnter(event)" autocomplete="off"><br>
        </form>--}}
        check:
        <table class="table table-bordered info-table" summary="Explanation on English tenses" cellspacing="0">
            <tbody>

            @for($i=0; $i<count($tenses)+1; $i++)
                <tr>
                    @for($j = 0; $j<4; $j++)
                        @php $index = $i*4 + $j; @endphp
                        @if(isset($tenses[$index]))
                            <td>
                                <label for="eng_{{ $index }}" class="check-rume" onclick="testChecked(this,'{{ $tenses[$index]['name_eng'] }}')"> {{ $tenses[$index]['name_eng'] }}
                                    <input type="checkbox" id="eng_{{ $index }}" name="eng_{{ $index }}">
                                    <span class="checkmark"></span>
                                </label>
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
    $('#enter_tense').focus();

    $('input[name=randText]').on('change',function(){
        console.log($(this).val());
        if($(this).val() == 'simple'){
            $('#hira_show').html('{{ $random['rand_simple_text'] }}');
        }
        else {
            $('#hira_show').html('{{ $random['rand_text'] }}');
        }
    });
    function testChecked(element,name){
        if(name == '{{ $random['tense_name'] }}'){
            $('#alert').html('');
            $('#success').html('correct');
            setTimeout(loadRandomText, 1300);
        }else{
            $('#alert').html('incorrect');
            //$(element).find('input').prop('checked',false);
        }
    }
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
            data: {
                'simpleRand' : ($('input[name=randText]:checked').val() == 'simple')? 1 : 0,
            },
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
<style>
    #hira_show{
        line-height: 1.4;
    }
    h3 {
        display: inline;
        color: darkgreen;
        margin: 0 10px;
    }
    .radioText{
        font-size: 18px;
        margin-left: 5px;
        margin-right: 20px;
        font-weight: bold;
    }
</style>