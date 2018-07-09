@extends('layouts.admin.index')
@section('content')

<section class="content-header">
    <h1>Add New Phrase</h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="box">
            <div class="box-body">
                    <p>Create New Phrase</p>
                    <a href="{{ route('admin.phrases') }}" class="btn btn-default btn-flat pull-right">Back</a>
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                <form method="POST" id="formFrm">
                    {{ csrf_field() }}

                    <?php if(!empty($message)):?>
                        <?php if($message['success']):?>
                            <div class="alert alert-success"> {{ $message['message'] }} </div>
                        <?php else:?>
                            <div class="alert alert-danger"> {{ $message['message'] }} </div>
                        <?php endif?>
                    <?php endif?>
                    <div class="box-bor clearfix">
                        <h4>■Phrase Information</h4>
                        <table class="table">
                            <tbody><tr>
                                <th>Phrase</th>
                                <td>
                                    <p class="text-red" id="phrase_error"></p>
                                    <input id="phrase" name="phrase" type="text" class="box_inline form-control w30">
                                </td>
                            </tr>
                            <tr>
                                <th>Meaning</th>
                                <td>
                                    <p class="text-red" id="meaning_error"></p>
                                    <input id="meaning" name="meaning" type="text" class="box_inline form-control w30">
                                </td>
                            </tr>
                            <tr>
                                <th>Example</th>
                                <td>
                                    <p class="text-red" id="example_error"></p>
                                    <input id="example" name="example" type="text" class="box_inline form-control w30">
                                </td>
                            </tr>
                            </tbody></table>

                        <div class="col-md-12">
                            <button id="confirm" type="button" class="btn btn-primary btn-flat pull-right">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            function validatePhrase() {
                $('#phrase_error').html("");
                if($.trim($('#phrase').val()) == ''){
                    $('#phrase_error').html( 'The field is require');
                    return false;
                }
                if($('#phrase').val().length > 255) {
                    $('#phrase_error').html( 'word must be less than 255 characters');
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

            $("#confirm").click(function() {
                // check loginID already exist
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
                            // validate rules
                            var valPhrase = validatePhrase();
                            var valMeaning = validateMeaning();
                            if( valPhrase && valMeaning ) {
                                $('#formFrm').submit();
                            }
                        }
                    }
                });
            });
        });
    </script>
</section>

@endsection
