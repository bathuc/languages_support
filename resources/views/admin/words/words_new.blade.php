@extends('layouts.admin.index')
@section('content')

<section class="content-header">
    <h1>Add New Word</h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="box">
            <div class="box-body">
                    <p>Create New Word</p>
                    <a href="{{ route('admin.words') }}" class="btn btn-default btn-flat pull-right">Back</a>
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
                    @if(!empty($subject))
                        <div class="box-bor clearfix">
                        <h4>■Word Information</h4>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Subject</th>
                                <td>
                                    <select name="subjectId" class="box_inline form-control w50">
                                        @foreach($subject as $item)
                                            @if($item->id == $subjectIdOld)
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->name_vi }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name_vi }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Word</th>
                                <td>
                                    <p class="text-red" id="word_error"></p>
                                    <input id="word" name="word" type="text" class="box_inline form-control w50" autofocus>
                                </td>
                            </tr>
                            <tr>
                                <th>Meaning</th>
                                <td>
                                    <p class="text-red" id="meaning_error"></p>
                                    <input id="meaning" name="meaning" type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            <tr>
                                <th>Example</th>
                                <td>
                                    <p class="text-red" id="example_error"></p>
                                    <input id="example" name="example" type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            {{--<tr>
                                <th>Example 1</th>
                                <td>
                                    <p class="text-red" id="example1_error"></p>
                                    <input id="example1" name="example1" type="text" class="box_inline form-control w50">
                                </td>
                            </tr>--}}
                            <tr>
                                <th></th>
                                <td>
                                    <button id="confirm" type="button" class="btn btn-primary btn-flat">Create</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
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

            $("#confirm").click(function() {
                // check loginID already exist
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
                            // validate rules
                            var valWord = validateWord();
                            var valMeaning = validateMeaning();
                            if( valWord && valMeaning ) {
                                $('#formFrm').submit();
                            }
                        }
                    }
                });
            });
        });
    </script>
    <style>
        select {
            /*height: 35px;*/
            /*width: 210px;*/
            text-align: center;
        }
    </style>
</section>

@endsection
