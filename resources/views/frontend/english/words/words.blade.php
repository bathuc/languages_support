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
                    if(e.keyCode == 39) { // right
                        getNextWord();
                    }
                    else if(e.keyCode == 40) {
                        $('#hira_show').click();
                    }
                });
                function getNextWord() {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'post',
                        url: '{{ route('word.random') }}',
                        data: {
                            'wordNumber': $('input[name=wordNumber]:checked').val(),
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