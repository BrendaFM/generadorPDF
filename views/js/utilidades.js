$(document).ready(function(){
    function mostrarAlerta(texto){
        Swal.fire({
            icon: 'info',
            title: 'SENATI',
            text: texto,
            position: 'bottom-end',
            footer: ' ',
            background: '#F9FBFE',
            timer: 2000,
            toast:true,
            showConfirmButton:false
        });
    }

    $("#mostrar-1").click(function(){
        mostrarAlerta("Texto de prueba");
    });

    $("#botonToast").click(function(){
        $('#toast').toast('show');
    });

    $(".toast").on('hide.bs.toast',function(){
       console.log("El toast a sido finalizado"); 
    });
});