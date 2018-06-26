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
                                <th>名前:</th>
                                <td>
                                    <p class="text-red" id="name_error"></p>
                                    <input name="name" id="name" value="{{ $user->name }}" type="text" class="box_inline form-control w30" placeholder="ユーザー1">
                                </td>
                            </tr>
                            <tr>
                                <th>ログインID:</th>
                                <td>
                                    <p class="text-red" id="loginid_error"></p>
                                    <input name="loginid" id="loginid" value="{{ $user->loginid }}" type="text" class="box_inline form-control w30" placeholder="user01">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="col-md-12">
                            <button id="confirmInfo" type="button" class="btn btn-primary btn-flat pull-right">適用</button>
                        </div>
                    </form>
                </div>

                <div class="box-bor clearfix">
                    <h4>■パスワード変更</h4>
                    <form method="post" id="passForm">
                        {{ csrf_field() }}
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>新しいパスワード:</th>
                                <td>
                                    <p class="text-red" id="password_error"></p>
                                    <input name="edittype" value="editpass" type="hidden">
                                    <input type="password" name="password" id="password" class="box_inline form-control w30" placeholder="********">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="col-md-12">
                            <button id="confirmPassword" type="button" class="btn btn-primary btn-flat pull-right">適用</button>
                        </div>
                    </form>
                </div>

                <div class="box-bor clearfix">
                    <h4>■ユーザーのロック / 解除</h4>
                    <p>ユーザーを削除します。</p>

                    <div class="col-md-12">
                        <div class="pull-right">
                            <label class="switch">
                                <?php $locked = ($user->locked)? 'checked' : ''; ?>
                                <input id="lockuser" type="checkbox" {{ $locked }}>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            function validateInfo() {
                $('#name_error').html('');
                $('#loginid_error').html('');
                var name = $('#name').val(),
                    loginid = $('#loginid').val(),
                    valid = true;

                if($.trim(name) == '') {
                    $('#name_error').html( '{{ NotificationAdmin::MSG_006 }}');
                    valid = false;
                }

                if(name.length > 255) {
                    $('#name_error').html( '{{ NotificationAdmin::MSG_004 }}');
                    valid = false;
                }

                if($.trim(loginid) == '') {
                    $('#loginid_error').html( '{{ NotificationAdmin::MSG_007 }}');
                    valid = false;
                }

                if(loginid.length > 255) {
                    $('#loginid_error').html( '{{ NotificationAdmin::MSG_004 }}');
                    valid = false;
                }

                return valid;
            }

            function validatePassword() {
                $('#password_error').html('');
                var password = $('#password').val();

                if($.trim(password) == '') {
                    $('#password_error').html( '{{ NotificationAdmin::MSG_008 }}');
                    return false;
                }

                if(password.length > 255) {
                    $('#password_error').html( '{{ NotificationAdmin::MSG_004 }}');
                    return false;
                }

                var regex = /^[A-Za-z0-9\d=!"#$%&'()*+,-./:;<=>?@\[\]\^_`{}|~]{8,}$/;
                if (!regex.test(password))
                {
                    $('#password_error').html( '{{ NotificationAdmin::MSG_008 }}');
                    return false;
                }

                return true;
            }

            $('#confirmInfo').click(function(){
                if($('#loginid').val() != '{{ $user->loginid }}') {
                    $.ajax({
                        type: 'post',
                        url: '{{route("users_cound_loginid")}}',
                        data: {'loginid': $('#loginid').val().trim()},
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (result) {
                            if (result.count > 0) {
                                $('#loginid_error').html( '{{ NotificationAdmin::MSG_010 }}');
                            }
                            else {
                                // validate rules
                                if(validateInfo()) {
                                    $('#infoForm').submit();
                                }
                            }
                        }
                    });
                }
                else {
                    if(validateInfo()) {
                        $('#infoForm').submit();
                    }
                }
            });

            $('#confirmPassword').click(function(){
                if(validatePassword()) {
                    $('#passForm').submit();
                }
            });

            $('#lockuser').on('change',function(){
                var check = ($(this).is(':checked'))? 1 : 0;
                $.ajax({
                    type: 'post',
                    url: '{{route("users_lockuser")}}',
                    data: {'id': <?php echo $id ?>, 'locked': check},
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                });
            });

            $('#comfirmDelete').click(function(){
                var r = confirm("{{ NotificationAdmin::MSG_012 }}");
                if (r == true) {
                    $('#dellForm').submit();
                }
            });
        });
    </script>
</section>

@endsection
