<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/4wqx4j9cpb6doqzr81ox1xrsx2e9fgddsqtvmdx1mwij8gr8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <textarea id="mieditor"></textarea>
  <hr>
  <button type="button" id="registrar">Registrar Comentario</button>
  <button type="button" id="ultimo">Retornar ultimo</button>
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      // implementando editor rtf
      tinymce.init({
          selector: 'textarea#mieditor',
          menubar:false,
          height: 400,
          plugins: [
              'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
              'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
              'insertdatetime', 'media', 'table', 'help', 'wordcount'
          ],
          toolbar: 'undo redo | blocks |' +
          'fontfamily fontsize bold italic backcolor underline forecolor | alignleft aligncenter ' +
          'alignright alignjustify | bullist numlist outdent indent | ' +
          'removeformat',
      });

      function registrarComentario(){
        //leer el valor de la caja rtf
        let comentario = tinymce.get("mieditor").getContent();
        $.ajax({
          url: '../controllers/comentario.controller.php',
          type: 'GET',
          data: {'operacion':'registrar', 'comentario':comentario},
          success:function(result){
            console.log("registrado correctamente");
          }
        });
      }

      function getUltimoComentario(){
        $.ajax({
          url: '../controllers/comentario.controller.php',
          type: 'GET',
          dataType:'JSON',
          data: {'operacion':'getUltimo'},
          success:function(result){
            tinymce.get("mieditor").setContent(result.comentario);
          }
        });
      }

      $("#registrar").click(registrarComentario);
      $("#ultimo").click(getUltimoComentario);
    });
  </script>
</body>
</html>