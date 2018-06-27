@extends('layouts.admin.index')
@section('content')

<section class="content-header">
    <h1>Word Edit</h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="box">
            <div class="box-body">
                    <p>Back</p>
                    <a href="/admin/words" class="btn btn-default btn-flat pull-right">Back</a>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                @if(!empty($message['info']))
                    @if($message['info']['success'])
                        <div class="alert alert-success"> {{ $message['info']['message'] }} </div>
                    @else
                        <div class="alert alert-danger"> {{ $message['info']['message'] }} </div>
                    @endif
                @endif

                @if(!empty($message['pass']))
                    @if($message['pass']['success'])
                        <div class="alert alert-success"> {{ $message['pass']['message'] }} </div>
                    @else
                        <div class="alert alert-danger"> {{ $message['pass']['message'] }} </div>
                    @endif
                @endif

                <div class="box-bor clearfix">
                    <form method="post" id="infoForm">
                        {{ csrf_field() }}
                        <h4>Edit</h4>
                        <input name="edittype" value="editinfo" type="hidden">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Word:</th>
                                <td>
                                    <p class="text-red" id="word_error"></p>
                                    <input name="word" id="word" value="{{ $word->word }}" type="text" class="box_inline form-control w30">
                                </td>
                            </tr>
                            <tr>
                                <th>Meaning:</th>
                                <td>
                                    <p class="text-red" id="meaning_error"></p>
                                    <input name="meaning" id="meaning" value="{{ $word->meaning }}" type="text" class="box_inline form-control w30">
                                </td>
                            </tr>
                            <tr>
                                <th>Example:</th>
                                <td>
                                    <p class="text-red" id="loginid_error"></p>
                                    <input name="example" id="example" value="{{ $word->example }}" type="text" class="box_inline form-control w30">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="col-md-12">
                            <button id="confirmInfo" type="button" class="btn btn-primary btn-flat pull-right">Edit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            function validateWord() {
                $('#word_error').html("");
                if($.trim($('#word').val()) == ''){
                    $('#word_error').html( 'The field is require');
                    return false;
                }
                if($('#word').val().length > 255) {
                    $('#word_error').html( 'word must be less than 255 characters');
                    return false;
                }

                return true;
            }

            function validateMeaning() {
                $('#meaning_error').html('');
                var meaning = $('#meaning').val();

                if($.trim(meaning) == ''){
                    $('#meaning_error').html( 'The field is require');
                    return false;
                }
                return true;
            }

            $('#confirmInfo').click(function(){
                if($('#word').val() != '{{ $word->word }}') {
                    $.ajax({
                        type: 'post',
                        url: '{{route("admin.words.coundWord")}}',
                        data: {'word': $('#word').val().trim()},
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (result) {
                            if (result.count > 0) {
                                $('#word_error').html( 'This word is already exist');
                            }
                            else {
                                var valWord = validateWord();
                                var valMeaning = validateMeaning();
                                if( valWord && valMeaning ) {
                                    $('#infoForm').submit();
                                }
                            }
                        }
                    });
                }
                else {
                    var valWord = validateWord();
                    var valMeaning = validateMeaning();
                    if( valWord && valMeaning ) {
                        $('#infoForm').submit();
                    }
                }
            });

            $('#comfirmDelete').click(function(){
                var r = confirm("Are you sure to delete this word?");
                if (r == true) {
                    $('#dellForm').submit();
                }
            });
        });
    </script>
</section>

@endsection
