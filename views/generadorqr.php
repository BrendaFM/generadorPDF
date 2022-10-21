<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador QR</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>

    <style>
        .capa-qr{
            background-color: gray;
            padding: 20px;
            text-align: center;
        }
    </style>
    


    <div class="container mt-3">

        <div class="jumbotron">
            <h3>Generador de QR</h3>
            <a href="../index.php">Retornar al indice</a>
            <hr>

            <form action="">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="textoQR">Ingrese el texto a mostar:</label>
                        <input type="text" class="form-control" id="textoQR">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="calidad">Calidad</label>
                        <select name="" class="form-control" id="calidad">
                            <option value="L">Baja</option>
                            <option value="M">Media</option>
                            <option value="H">Alta</option>
                            <option value="B">Superior</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                    <label for="tamQR">Tamaño QR</label>
                        <select name="" class="form-control" id="tamQR">
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7" selected>7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="marco">Tamaño de marco</label>
                        <select name="" class="form-control" id="marco">
                            <option value="1">1</option>
                            <option value="2" selected>2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="generador">&nbsp;</label>
                        <button type="button" class="btn btn-block btn-outline-danger" id="generador">Generar QR</button>
                    </div>
                </div>
            </form>
        </div>

        <hr>

        <div class="capa-qr" id="contenedor"></div>
        
    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


    <script>

        $(document).ready(function(){
            function makeQR(){
                $.ajax({
                    url: '../controllers/qr.controller.php',
                    type: 'GET',
                    data: {
                        'operacion': 'generarQR',
                        'textoQR' : $("#textoQR").val(),
                        'calidad' : $("#calidad").val(),
                        'tamQR' : $("#tamQR").val(),
                        'marco' : $("#marco").val()
                    },
                    success: function(result){
                        $("#contenedor").html(result);
                    }
                });
            };

            $("#generador").click(makeQR);
        });

    </script>

</body>
</html>