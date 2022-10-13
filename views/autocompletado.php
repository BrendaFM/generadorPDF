<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocompletado</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    
<div class="container mt-3">
    <h3>Buscador Asíncrono</h3>
    <a href="../index.php">Volver al índice</a>
    <hr>    

    <form action="" id="formulario-busqueda" autocomplete="off">
        <div class="form-group">
            <label for="ubigeo" class="mb-2"><b>Escriba el ubigeo:</b>  <span id="total-items"></span> </label>
            <input type="search" class="form-control form-control-sm" id="ubigeo" autofocus="true">
            <small>Ubigeo encontrado: <span id="codigo-ubigeo"></span></small>
        </div>
    </form>
</div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <!-- Bootstrap autocomplete -->
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>

    <script>

        $(document).ready(function(){

            $("#formulario-busqueda").submit(function(event){
                //preventDefault = detiene el submit
                event.preventDefault();
            });

            $("#ubigeo").autoComplete({
                resolver: 'custom',
                minLength: 3,
                noResultsText: 'No encontrado',
                events: {
                    search: function(query, callback){
                        $.ajax({
                            url: '../controllers/Ubigeo.controller.php',
                            type: 'GET',
                            dataType: 'JSON',
                            data: {'operacion' : 'getUbigeo', 'valorBuscado': query}
                        }).done(function (res){
                            // res = response(respuesta Obtenida, bloque JSON)
                            callback(res);
                            $("#total-items").html(res.length);
                            // console.log(res);
                        });
                    }
                }
            }); // Fin de autoComplete

            // Identificando elemento seleccionado
            $("#ubigeo").on('autocomplete.select', function(event, item){
                //console.log(item['ubigeo']);
                $("#codigo-ubigeo").html(item['ubigeo']);
                $("#total-items").html('');
            });

        // $("#formulario-busqueda").keyup(function(e){
        //     if(e.keyCode == 27){
        //         $("#ubigeo").val('');
        //     }
        // });

            $("#ubigeo").keyup(function(e){
                if($(this).val() == "" || e.keyCode == 27){
                    $("#codigo-ubigeo").html("");
                    $("#total-items").html("");
                }
            })

            // Busqueda utilizando archivos planos
            /* 
            $("#ubigeo").autoComplete({
                resolverSettings:{
                    url:'js/data-test.json'
                }
            });
             */
        });

    </script>
</body>
</html>