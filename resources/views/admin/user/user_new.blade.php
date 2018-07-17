@extends('layouts.admin.index')
@section('content')

    <section class="content-header">
        <h1>Create New User</h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <p>Create New User</p>
                    <a href="{{ route('admin.user') }}" class="btn btn-default btn-flat pull-right">Back</a>
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
                            <h4>■User Information</h4>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        <p class="text-red" id="name_error"></p>
                                        <input id="name" name="name" type="text" class="box_inline form-control w50">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <p class="text-red" id="email_error"></p>
                                        <input id="email" name="email" type="text" class="box_inline form-control w50">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td>
                                        <p class="text-red" id="password_error"></p>
                                        <input id="password" name="password" type="text" class="box_inline form-control w50">
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
                function validateName() {
                    $('#name_error').html("");
                    if ($.trim($('#name').val()) == '') {
                        $('#name_error').html('The field is require');
                        return false;
                    }

                    return true;
                }

                function validateEmail() {
                    $('#email_error').html('');
                    if ($.trim($('#email').val()) == '') {
                        $('#email_error').html('The field is require');
                        return false;
                    }

                    return true;
                }

                function validatePassword() {
                    $('#password_error').html('');
                    if ($.trim($('#password').val()) == '') {
                        $('#password_error').html('The field is require');
                        return false;
                    }

                    return true;
                }

                $("#confirm").click(function () {
                    // check loginID already exist
                    $.ajax({
                        type: 'post',
                        url: '{{route("admin.user.counduser")}}',
                        data: {'email': $('#email').val().trim()},
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (result) {
                            if (result.count > 0) {
                                $('#email_error').html('This email is already exist');
                            }
                            else {
                                // validate rules
                                var valName = validateName();
                                var valEmail = validateEmail();
                                var valPassword = validatePassword();
                                if (valName && valEmail && valPassword) {
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
