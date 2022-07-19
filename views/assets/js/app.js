$(document).ready(function (){

    //Envio de paquetes
    $('#fromCorrespondencia').submit(function (e){
        let data = new FormData($('#fromCorrespondencia')[0]); // para inicializar los datos a enviar
        e.preventDefault();
        $.ajax({
            type : $(this).attr("method"),
            url: $(this).attr("action"),
            data: data,
            contentType: false,
            processData: false,
            success: function (response){
                if (response.message === 'Error al insertar datos'){
                    console.log('Error mysql Cabeza Hogar -> ' + response.mysql);
                }

                if (response.message === 'Exito al registrar datos'){
                    //para ocultar el campo otro_metodo_envio
                    $("#otro_metodo_envio").css("display", "none");
                    //para eliminar los datos de los input en el formulario
                    $('#fromCorrespondencia').trigger('reset');
                }

                Swal.fire({
                    position: 'center',
                    icon: response.option,
                    title: response.message,
                    allowOutsideClick: false
                });
            }
        });
    });

    //Recepcion de paquetes
    $('#receiveCorrespondencia').submit(function (e){
        let data = new FormData($('#receiveCorrespondencia')[0]); // para inicializar los datos a enviar
        e.preventDefault();
        $.ajax({
            type : $(this).attr("method"),
            url: $(this).attr("action"),
            data: data,
            contentType: false,
            processData: false,
            success: function (response){
                if (response.message === 'Error al insertar datos'){
                    console.log('Error mysql Cabeza Hogar -> ' + response.mysql);
                }

                if (response.message === 'Envio recibido con exito'){
                    $('#receiveCorrespondencia').trigger('reset');
                }

                Swal.fire({
                    position: 'center',
                    icon: response.option,
                    title: response.message,
                    text: response.text,
                    allowOutsideClick: false
                });
            }
        });
    });

    //login
    $('#fromLogin').submit(function (e){
        let data = new FormData($('#fromLogin')[0]); // para inicializar los datos a enviar
        e.preventDefault();
        $.ajax({
            type : $(this).attr("method"),
            url: $(this).attr("action"),
            data: data,
            contentType: false,
            processData: false,
            success: function (response){

                grecaptcha.reset(); //reiniciar el reCAPCHA
                $('#clave').trigger('reset');

                Swal.fire({
                    position: 'center',
                    icon: response.option,
                    title: response.message,
                    text: response.text,
                    allowOutsideClick: false
                });

                if(response.message === 'exito al iniciar sesion'){
                    window.location.href = response.url;
                }
            }
        });
    });
});