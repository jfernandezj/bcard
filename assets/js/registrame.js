$(function () {
    $('#registro').validate({
        errorLabelContainer: '#resContainer',
        errorClass: 'error',
        wrapper: 'li',
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 4
            },
            password2: {
                required: true,
                equalTo: '[name=password]'
            }
        },
        messages: {
            email: {
                required: "Por favor ingrese un correo.",
                email: "El correo debe tener un formato v&aacute;lido."
            },
            password: {
                required: 'Debe crear una contraseña.',
                minlength: 'La contraseña debe tener 4 caracteres como mínimo'
            },
            password2: {
                required: "Debe reingresar su contraseña",
                equalTo: "Las contraseñas no coinciden"
            }
        },
        submitHandler: function (form) {
            var email = $('[name="email"]').val();
            var password = $('[name="password"]').val();
            $.ajax({
                type: "POST",
                url: "registrame.php",
                data: "functionname=" + 'add' + '&email=' + email + '&password=' + password,
                success: function (data) {
//                    var a = data;
//                    setTimeout(function () {
//                        console.log(a);
//                        var form = $('[name="registro"]');
//                        var div = "";
//                        $('[name="email"]').parent().remove();
//                        $('[name="password"]').parent().remove();
//                        $('[name="password2"]').parent().remove();
//                        $('[name="enviar"]').parent().remove();
//
//                        if (a === "1") {
//                            div = "<div class='col-lg-6 col-lg-offset-3'><h2>Bienvenido!</h2>\n\
//                            <p>Te hemos enviado un correo donde podr&aacute;s continuar con el proceso de registro.</p></div><br><br><br>";
//                        } else {
//                            div = "<div class='col-lg-6 col-lg-offset-3'><p>Ya existe una cuenta registrada a este correo.</p>\n\
//                                   <p><a href='forgot_password.html'>Olvidaste tu contraseña?</a></p></div><br><br><br>";
//                        }
//                        form.append(div);
//                    }, 1000);
                }
            });
        }
    });
});