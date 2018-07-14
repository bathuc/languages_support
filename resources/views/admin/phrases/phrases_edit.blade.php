@extends('layouts.admin.index')
@section('content')

<section class="content-header">
    <h1>Phrase Edit</h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="box">
            <div class="box-body">
                    <p>Back</p>
                    <a href="/admin/phrases" class="btn btn-default btn-flat pull-right">Back</a>
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
                                <th>Phrase:</th>
                                <td>
                                    <p class="text-red" id="phrase_error"></p>
                                    <input name="phrase" id="phrase" value="{{ $phrase->phrase }}" type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            <tr>
                                <th>Meaning:</th>
                                <td>
                                    <p class="text-red" id="meaning_error"></p>
                                    <input name="meaning" id="meaning" value="{{ $phrase->meaning }}" type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            <tr>
                                <th>Example:</th>
                                <td>
                                    <p class="text-red" id="loginid_error"></p>
                                    <input name="example" id="example" value="{{ $phrase->example }}" type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            <tr>
                                <th>Example 1</th>
                                <td>
                                    <p class="text-red" id="example1_error"></p>
                                    <input id="example1" name="example1" value="{{ $phrase->example1 }}" type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <button id="confirmInfo" type="button" class="btn btn-primary btn-flat">Edit</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </form>
                </div>

            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            function validatePhrase() {
                $('#phrase_error').html("");
                if($.trim($('#phrase').val()) == ''){
                    $('#phrase_error').html( 'The field is require');
                    return false;
                }
                if($('#phrase').val().length > 255) {
                    $('#phrase_error').html( 'phrase must be less than 255 characters');
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
                if($('#phrase').val() != '{{ $phrase->phrase }}') {
                    $.ajax({
                        type: 'post',
                        url: '{{route("admin.phrases.coundPhrase")}}',
                        data: {'phrase': $('#phrase').val().trim()},
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (result) {
                            if (result.count > 0) {
                                $('#phrase_error').html( 'This phrase is already exist');
                            }
                            else {
                                var valPhrase = validatePhrase();
                                var valMeaning = validateMeaning();
                                if( valPhrase && valMeaning ) {
                                    $('#infoForm').submit();
                                }
                            }
                        }
                    });
                }
                else {
                    var valPhrase = validatePhrase();
                    var valMeaning = validateMeaning();
                    if( valPhrase && valMeaning ) {
                        $('#infoForm').submit();
                    }
                }
            });

            $('#comfirmDelete').click(function(){
                var r = confirm("Are you sure to delete this phrase?");
                if (r == true) {
                    $('#dellForm').submit();
                }
            });
        });
    </script>
    <style>
        input {
            width: 40% !important;
        }
    </style>
</section>

@endsection
