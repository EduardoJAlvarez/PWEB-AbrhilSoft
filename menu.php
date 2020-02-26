<ul class="menu">
          <div class="imagenf"> <li><img src="imagenes/image001.png"></li> </div>
        <li><a href="inicio.php"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="herramientas.php"><i class="fa fa-wrench"></i> Productos</a></li>
         <li><a href="carrito.php"><i class="fa fa-cart-plus"></i> Carrito</a></li>
         <li><a href="nosotros.php"><i class="fa fa-address-card"></i> Nosotros</a></li>       
         <li><a href="index.php" onclick="return confirm('¿Quieres cerrar sesión?')"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
        <div style="display:inline;"><img src="imagenes/image003.png" onclick="facebook();">
        <img src="imagenes/image004.png" onclick="twitter();" style="padding: 1.2em;">
        <img src="imagenes/image005.png" onclick="linkedin();" >
      </div>

      <script>
      function facebook(){
        header ("location:https://www.facebook.com/");
      }
      </script>