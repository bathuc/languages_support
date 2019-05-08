@extends('layouts.frontend.index')

@section('content')
    <div class="pt-3"></div>
    <h1 class="title">Tenses</h1>

    <table class="table table-bordered info-table" summary="Explanation on English tenses" cellspacing="0">
        <tbody>

            @for($i=0; $i<count($tenses)+1; $i++)
                <tr>
                    @for($j = 0; $j<4; $j++)
                    @php $index = $i*4 + $j; @endphp
                    @if(isset($tenses[$index]))
                        <td>
                            <a href="{{ route('tense.detail', $tenses[$index]['id']) }}">{{ $tenses[$index]['name_eng'] }}</a>
                        </td>
                    @endif
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>

    <div class="pt-2"></div>
    <p class="error-text txt20 fw-bold color-red"></p>
    <h1 class="title">Random Game</h1>
    <table class="table table-bordered info-table" id="kana_choice" summary="Explanation on English tenses" cellspacing="0">
        <tbody>
        <thead>
        <tr>
            <td id="chooseAll" class="deactivate">Choose All</td>
            <td id="common" class="deactivate">Common Tense</td>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
            @for($i=0; $i<count($tenses)/4; $i++)
                <tr id="row_{{$i}}" >
                    <td class="headrow deactivate" data-row="{{ $i }}">
                        <span>Choose</span>
                    </td>
                    @for($j = 0; $j<4; $j++)
                        @php $index = $i*4 + $j; @endphp
                        @if(isset($tenses[$index]))
                            <td  class="clickable inactive" data-id="{{ $tenses[$index]['id'] }} }}">
                                <span>{{ $tenses[$index]['name_eng'] }}</span>
                            </td>
                        @endif
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>

    <form method="post" id="frm">
        {{ csrf_field() }}
        <input type="hidden" name="chooseId">
        <input type="radio" name="typeCheck" value="example" checked/> Example sentence
        <input type="radio" name="typeCheck" value="use"/>Describe tense
        <input id="startTest" type="button" class="btn btn-primary" value="Test Grammar">
    </form>

    <script>
        $(document).ready(function () {
            $('#startTest').click(function(){
                var chooseId = [];
                $('.clickable').each(function(index){
                    if($(this).hasClass('active')){
                        chooseId.push($(this).data('id'));
                    }
                });
                if(chooseId.length >= 2) {
                    $('input[name=chooseId]').val(JSON.stringify(chooseId));
                    $('#frm').submit();
                }
                else{
                    $('.error-text').html('Please choose at least 2 tenses');
                }
            });

            function setStatus(element,status) {
                if(status == 0){
                    //set inactive
                    element.removeClass('active').addClass('inactive');
                }else{
                    //set active
                    element.removeClass('inactive').addClass('active');
                }
            }

            function setToggle(element) {
                var active = element.hasClass('activate');
                if(active){
                    element.removeClass('activate').addClass('deactivate');
                }
                else{
                    element.removeClass('deactivate').addClass('activate');
                }
            }

            function rowToggle(head,index) {
                var active = head.hasClass('activate');
                setToggle(head);
                $('#row_'+ index + ' td.clickable').each(function(index){
                    setStatus($(this), !active);
                });
            }

            $('.clickable').click(function(){
                setStatus($(this),!$(this).hasClass('active'));
            });

            $('.headrow').click(function(){
                rowToggle($(this),$(this).data('row'));
            });

            $('#chooseAll').click(function(){
                var active = $(this).hasClass('activate');
                setToggle($(this));
                if(active){
                    $('.clickable').removeClass('active').addClass('inactive');
                    $('.headrow').removeClass('activate').addClass('deactivate');
                }else{
                    $('.clickable').removeClass('inactive').addClass('active');
                    $('.headrow').removeClass('deactivate').addClass('activate');
                }
            });
        });
    </script>
    <style>
        #frm input{
            margin-left: 20px;
        }
    </style>
@endsection