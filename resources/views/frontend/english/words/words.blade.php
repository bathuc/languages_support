@extends('layouts.frontend.index')

@section('content')
    @if(empty($word))
        <h2>Word is empty</h2>
    @else
        <div id="ajaxBox">
            @include('frontend.english.words.random')
        </div>
        <script>
            $(document).ready(function () {
                $('body').on('keydown', function(e) {
                    var wordNumber = parseInt($('input[name=wordNumber]:checked').val()) ;
                    if(e.keyCode == 39) { // right
                        getNextWord();
                    }
                    else if(e.keyCode == 40) {  //down
                        $('#hira_show').click();
                    }
                    else if(e.keyCode == 33 && wordNumber > 0) {  //page up
                        var checkboxId = '#wordRadio' + (wordNumber - 1);
                        $(checkboxId).click();
                    }
                    else if(e.keyCode == 34 && wordNumber < 3) {  //page down
                        var checkboxId = '#wordRadio' + (wordNumber + 1);
                        $(checkboxId).click();
                    }
                });
                function getNextWord() {
                    var range = $('#range').val();
                    var wordNumber = $('input[name=wordNumber]:checked').val();
                    if(wordNumber == undefined) {
                        wordNumber = range;
                    }
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'post',
                        url: '{{ route('word.random') }}',
                        data: {
                            'wordNumber': wordNumber,
                            'showTime': $('input[name=showTime]').val(),
                            'subjectId': $('#dropDownId').val(),
                        },
                        success: function (respond) {
                            $('#ajaxBox').html(respond);
                        }
                    });
                }
            });
        </script>
    @endif
@endsection