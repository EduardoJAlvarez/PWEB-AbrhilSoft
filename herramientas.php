<?php 
require 'php/conherramientas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
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
<div class="contaneir">
      <form action="" method="POST" enctype="multipart/form-data">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar al carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
        <input type="hidden" required name="id" placeholder="" id="id"  require="">
      <label for="">ID:</label>
      <input type="number" name="id" class="form-control <?php echo (isset($error['id']))?"is-invalid":""?>" id="id" value="<?php echo $id;?>">
      <div class="invalid-feedback">
      <?php echo (isset($error['id']))?$error['id']:""?>
      </div>
      <label for="">Herramienta:</label>
      <input type="text" name="herramienta" class="form-control <?php echo (isset($error['']))?"is-invalid":""?>" id="herramienta" value="<?php echo $herramienta;?>">
      <div class="invalid-feedback">
      <?php echo (isset($error['herramienta']))?$error['herramienta']:""?>
      </div>
      <label for="">Cantidad:</label>
      <input type="number" name="cantidad" class="form-control <?php echo (isset($error['cantidad']))?"is-invalid":""?>" id="cantidad" value="<?php echo $cantidad;?>"><br>
      <div class="invalid-feedback">
      <?php echo (isset($error['cantidad']))?$error['cantidad']:""?>
      </div>
        </div>
      </div>
      <div class="modal-footer">
      <button value="btnAgregar" <?php echo $accionAgregar;?> class="btn btn-success" type="submit" name="accion">Agregar</button>
      <button value="btnModificar" <?php echo $accionModificar;?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
      <button value="btnEliminar" onclick="return confirm('¿Realmente deseas borrar?');" <?php echo $accionEliminar;?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
      <button value="btnCancelar" <?php echo $accionCancelar;?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
      </div>
    </div>
  </div>
</div>


      </form>
      <nav class="navbar">
<p>Inventario de las Herramientas</p>
<form action="jefes.php" method="POST" >
        <input type="text" class="txtb" name="busqueda" id="busqueda" placeholder="Ingrese lo que desea buscar...">
        <input type="submit" class="subb btn btn-primary" value="Buscar" class="btn" >
    </form></nav>
    <div class="tablabootherra">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th><div>Foto</div></th>
                    <th><div>ID<div></th>
                    <th><div>Herramienta</div></th>
                    <th><div>Cantidad</div></th>
                    <th><div>Precio</div></th>
                    <th><div>Opciones</div></th>
                </tr>
            </thead>
            <?php foreach($productos as $producto){ ?>
                <tr>
                    <td><img class="img-thumbnail" width="100px" src="imagenes/<?php echo $empleado['foto'];?>"/></td>
                    <td><?php echo $producto['id'];?></td>
                    <td><?php echo $producto['herramienta'];?></td>
                    <td><?php echo $producto['cantidad'];?></td>
                    <td><?php echo $producto['precio'];?></td>
                    <td>
                    <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $empleado['id'];?>">
                    <input type="hidden" name="herramienta" value="<?php echo $empleado['herramienta'];?>">
                    <input type="hidden" name="cantidad" value="<?php echo $empleado['cantidad'];?>">
                    <input type="hidden" name="txtFoto" value="<?php echo $empleado['foto'];?>">
                    <input type="submit" value="Modificar" class="btn btn-info" name="accion">
                    <button value="btnEliminar" onclick="return confirm('¿Realmente deseas borrar?');" type="submit" class="btn btn-danger" name="accion">Eliminar</button>
                    </form></td>
                </tr>
            <?php } ?>
        </table>
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