<!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">    
        
    </head>
<body>
    <div class="container mt-4 mb-4">
        <table class="table-sm" id="table-users">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Género</th>
                    <th>Operación</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){

            //DATATABLE CARGA POR AJAX DE JQUERY
            // var tabla = $("#table-users").DataTable();
            // tabla.destroy();
            //     $.ajax({
            //         url: '../controllers/user.controller.php',
            //         type: 'GET',
            //         data: {'operacion':'listarUsuarios'},
            //         success: function(result){
            //             $("#table-users tbody").html(result);
            //             $("#table-users").DataTable({pageLength : 50});
            //         }
            //     });

            //DATATABLE USANDO SERVER SIDE

            //data contiene la estructura de la tabla, type tipo, row es fila
            function listarUsuarios(){
                var tabla = $("#table-users").DataTable();
                tabla.destroy();

                tabla = $("#table-users").DataTable({
                    "processing" : true,
                    "order"      : [[1, "asc"], [2, "asc"]],
                    "serverSide" : true,
                    "sAjaxSource": '../controllers/user.ss.controller.php',
                    "pageLength" : 50,
                    "columnDefs" : [
                        {
                            "data": null,
                            render: function(data,type,row){
                                return `<a class='btn btn-sm btn-danger' data-id='${data[0]}' href='#'>Eliminar</a>`;
                            },
                            "targets":5
                        }
                    ] 
                });
            }   

            listarUsuarios();
   
        });
    </script>
</body>
</html>