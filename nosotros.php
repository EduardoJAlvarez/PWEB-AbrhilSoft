<?php 
require 'php/conherramientas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nosotros</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
    <link rel="stylesheet" href="css/hamburgers.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="css/herramientas.css">
<link rel="shortcut icon" href="imagenes/icon.png" />
</head>
<body>
<div class="tittle" >
    <h1 style="text-align: center;">¿Quienes somos ?</h1>
</div>
<div class="contenido" style="text-align: center; width:500px; position:absolute; left:30%;">    
Somos una empresa con casí una década de experiencia brindando soluciones para el área de Recursos Humanos y nóminas, desarrollamos herramientas sencillas, prácticas, de fácil interpretación y uso, que cumplan con todos los aspectos fiscales y legales, cubriendo y facilitando la operación los procesos más importantes del área de inicio a fin, pero sobre todo facilitando la toma de decisiones a nivel directivo de manera ágil y oportuna.
</div>

    <!--Sidebar -->
    <l id="sidebar">
    <div class="contenedorbtn">
        <button class="hamburger hamburger--spin" type="button" id="toggle-btn" onclick="toggleSidebar()">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
    </div>
     <nav class="contenedor">
              <?php include('menu.php'); ?>
     </nav>

    </div>
      <script>
        var hamburger = document.querySelector(".hamburger");
        hamburger.addEventListener("click", function() {
          hamburger.classList.toggle("is-active");
        });
      </script>
      <script src="js/pushbar.js"></script>
    <?php if($mostrarModal){?>
        <script>
        $('#exampleModal').modal('show');
        </script>
    <?php } ?>
    <script>
    function confirmar(Mensaje){
        return (confirm(Mensaje))?true:false;
    }
    </script>
  </div>  
</body>
</html>