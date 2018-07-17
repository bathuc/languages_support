@extends('layouts.admin.index')
@section('content')

    <section class="content-header">
        <h1>Create New Subject</h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <p>Create New Subject</p>
                    <a href="{{ route('admin.subject') }}" class="btn btn-default btn-flat pull-right">Back</a>
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
                            <h4>■Subject Information</h4>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>English</th>
                                    <td>
                                        <p class="text-red" id="name_eng_error"></p>
                                        <input id="name_eng" name="name_eng" type="text" class="box_inline form-control w50">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Viet</th>
                                    <td>
                                        <p class="text-red" id="name_vi_error"></p>
                                        <input id="name_vi" name="name_vi" type="text" class="box_inline form-control w50">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button id="confirm" type="button" class="btn btn-primary btn-flat">
                                            Create
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                function validateEnglish() {
                    $('#name_eng_error').html("");
                    if ($.trim($('#name_eng').val()) == '') {
                        $('#name_eng_error').html('The field is require');
                        return false;
                    }
                    if ($('#name_eng').val().length > 255) {
                        $('#name_eng_error').html('subject must be less than 255 characters');
                        return false;
                    }

                    return true;
                }

                function validateViet() {
                    $('#name_vi_error').html('');
                    var name_vi = $('#name_vi').val();

                    if ($.trim(name_vi) == '') {
                        $('#name_vi_error').html('The field is require');
                        return false;
                    }

                    if (name_vi.length > 255) {
                        $('#name_vi_error').html('Viet must be less than 255 characters');
                        return false;
                    }

                    return true;
                }

                $("#confirm").click(function () {
                    // check loginID already exist
                    $.ajax({
                        type: 'post',
                        url: '{{route("admin.subject.coundsubject")}}',
                        data: {'name_eng': $('#name_eng').val().trim()},
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (result) {
                            if (result.count > 0) {
                                $('#name_eng_error').html('This Subject is already exist');
                            }
                            else {
                                // validate rules
                                var valEnglish = validateEnglish();
                                var valViet = validateViet();
                                if (valEnglish && valViet) {
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
