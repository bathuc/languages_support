@extends('layouts.frontend.index')

@section('content')
    <h1 id="head1">Words Drill</h1>
    <div class="login-main clearfix col-md-12">
        <form id="frmJS">
            <div class="pd10 clearfix border-bottom-solid">
                <div class="col-md-2 pd_t5 txt16">Form Id</div>
                <div class="col-md-2">
                    <input type="text" name="formId" id="formId" class="form-control">
                    <p class="formId-error"></p>
                </div>

                <div class="col-md-4">
                    <div class="col-md-4 txt16">Confirm Id</div>
                    <div class="col-md-8 txt16">
                        <input type="text" name="confirmId" id="confirmId" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="col-md-4 txt16">Submit Id</div>
                    <div class="col-md-8 txt16">
                        <input type="text" name="submitId" id="submitId" class="form-control">
                    </div>
                </div>

            </div>

            <div id="allField">
                <div id="fieldRow1" class="pd10 border-bottom-solid clearfix">
                    <div class="col-md-2 pd_t5 txt16">1. Field name</div>
                    <div class="col-md-3">
                        <input type="text" name="field1" id="field1" class="form-control">
                    </div>
                </div>
            </div>

            <div class="pd10 border-bottom-solid clearfix">
                <div class="col-md-2 pd_t5 txt16"></div>
                <div class="col-md-10">
                    <a href="javasript:void(0)" id="addALine" title="Add a line"><img src="/front/images/plus.png" class="cs-plus mg_r10" style="text-decoration: none">Add a line</a>
                    <a href="javascript:void(0)" id="removeALine" class="c-minus" title="Remove a line" style="margin-left:50px; text-decoration: none">
                        <img src="/front/images/minus.png" class="cs-plus mg_r10" alt="Remove a line">Remove a line
                    </a>
                </div>
            </div>

            <div class="pd10  clearfix">
            </div>

            <div class="pd10  clearfix">
                <div class="col-md-2 pd_t5 txt16"></div>
                <div class="col-md-10">
                    <button type="button" id="createJS" name="createJS" class="btn btn-standard " value="">Create JS</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            var rowId = 1;

            $('#addALine').click(function(){
                rowId++;
                $.ajax({
                    type: 'post',
                    url: '{{route("code.insert.row.js")}}',
                    data: {'rowId':rowId},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        $('#allField').append(result);
                    }
                });
            });

            $('#removeALine').click(function(){
                var text = 'Are you sure to delete field ' + rowId;
                if(confirm(text) && rowId > 0) {
                    $('#allField').children().last().remove();
                    rowId--;
                }
            });

            $('#createJS').click(function(){
                $("#frmJS").valid();
            });

            // --------------- form validate ---------------
            $.validator.addMethod("valid_email", function (value, element) {
                if(value!="") {
                    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if(!value.match(regex)) {
                        return false;
                    }
                }
                return true;
            });

            $("#frmJS").validate({
                rules: {
                    formId: { required: true },
                    confirmId: { required: true },

                },
                messages: {
                    formId: {
                        required: "formId  require",
                    },
                    confirmId: {
                        required: "Please confirm",
                    }
                },

                errorPlacement: function(error, element) {
                    if (element.attr("name") == "formId") {
                        $(".formId-error").html($(error).html());
                        error.insertBefore(element);
                    } else {
                        error.appendTo(element.parent().next());
                    }
                    /*// insert with condition
                    if (element.attr("name") == "reasons") {
                        error.insertAfter("#checkboxGroup");
                    } else {
                        error.appendTo(element.parent().next());
                    }*/
                }
            });
            // --------------- end form validate ---------------

        });
    </script>
    <style>
        input {
            max-width:150px;
        }
    </style>
@endsection