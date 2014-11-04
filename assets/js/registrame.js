//$('#registro').validate({
//    errorElement: 'span',
//    errorClass: 'help-inline alert-error',
//    focusInvalid: false,
//    rules: {
//        email: {
//            required: true,
//            email: true
//        },
//        password: {
//            required: true
//        }
//    },
//    messages: {
//        email: {
//            required: "Por favor ingrese un correo.",
//            email: "Por favor ingrese un correo válido."
//        },
//        password: {
//            required: "Ingrese su nombre."
//        }
//    },
//    invalidHandler: function (event, validator) { //display error alert on form submit   
//        $('.alert-error').show();
//    },
//    highlight: function (e) {
//        $(e).closest('.control-group').removeClass('info').addClass('alert-error');
//    },
//    success: function (e) {
//        $(e).closest('.control-group').removeClass('error').addClass('info');
//        $(e).remove();
//    },
//    errorPlacement: function (error, element) {
//        if (element.is(':checkbox') || element.is(':radio')) {
//            var controls = element.closest('.controls');
//            if (controls.find(':checkbox,:radio').length > 1)
//                controls.append(error);
//            else
//                error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
//        }
//        else if (element.is('.select2')) {
//            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
//        }
//        else if (element.is('.chzn-select')) {
//            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
//        }
//        else
//            error.insertAfter(element);
//    },
//    submitHandler: function (form) {
//        var dataForm = $(form).serialize();
//        $.ajax({
//            type: "POST",
//            url: "[:__BASE_URL:]admin/login/add",
//            data: dataForm
//        }).done(function (data) {
//            try {
//                var r = JSON.parse(data);
//                $.gritter.add({
//                    title: 'Bienvenido!',
//                    text: "<i>Por favor confirma tu correo para poder iniciar sesión.</i>",
//                    class_name: 'btn-success'
//                });
//                show_box('login-box');
//            } catch (e) {
//                $.gritter.add({
//                    title: 'Error!',
//                    text: "<i>Si el problema persiste envienos un mensaje :).</i>",
//                    class_name: 'gritter-error'
//                });
//
//            }
//        });
//    }
//});


$(function () {
    $('#registro').validate({
        debug: true,
        errorElement: 'span',
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Por favor ingrese un correo.",
                email: "El correo debe tener un formato v&aacute;lido."
            },
            password: {
                required: 'Ingrese una password de mas de 4 d&iacute;gitos.'
            }
        },
        errorPlacement: function (error, element) {

        },
        invalidHandler: function(event, validator){
            console.log('event-> '+event);
            console.log('validator-> '+validator);
        },
        submitHandler: function (form) {
//            $(form).ajaxSubmit();
            console.log('exito!');
        }
    });
});