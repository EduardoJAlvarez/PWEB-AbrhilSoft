<?php
include ("php/conexion.php");

$id=(isset($_POST['id']))?$_POST['id']:"";
$herramienta=(isset($_POST['herramienta']))?$_POST['herramienta']:"";
$cantidad=(isset($_POST['cantidad']))?$_POST['cantidad']:"";
$buscar=(isset($_POST['busqueda']))?$_POST['busqueda']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$error=array();
$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

switch($accion){
    case "btnAgregar":
        $setencia=$pdo->prepare("INSERT INTO herramientas (id,herramienta,cantidad,foto) values (:ID,:herramienta,:cantidad,:foto)");
        $setencia->bindParam(':ID',$id);
        $setencia->bindParam(':herramienta',$herramienta);
        $setencia->bindParam(':cantidad',$cantidad);

        $fecha= new DateTime();
        $nombrearchivo=($txtFoto!="")?$fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";

        $tmpfoto=$_FILES["txtFoto"]["tmp_name"];
        if($tmpfoto!=""){
            move_uploaded_file($tmpfoto,"imagenes/".$nombrearchivo);
        }

        $setencia->bindParam(':foto',$nombrearchivo);
        $setencia->execute();
        header('Location:herramientas.php');
        
    break;
    case "btnModificar":


        
        $setencia=$pdo->prepare("UPDATE herramientas SET id=:ID,herramienta=:herramienta,cantidad=:cantidad WHERE id=:ID");
        $setencia->bindParam(':ID',$id);
        $setencia->bindParam(':herramienta',$herramienta);
        $setencia->bindParam(':cantidad',$cantidad);
        $setencia->execute();

        $fecha= new DateTime();
        $nombrearchivo=($txtFoto!="")?$fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";
        $tmpfoto=$_FILES["txtFoto"]["tmp_name"];
        if($tmpfoto!=""){
            move_uploaded_file($tmpfoto,"imagenes/".$nombrearchivo);

            $setencia=$pdo->prepare("SELECT foto FROM usuarios WHERE ID=:ID");
            $setencia->bindParam(':ID',$id);
            $setencia->execute();
            $empleado=$setencia->fetch(PDO::FETCH_LAZY);
    
            if(isset($empleado["foto"])){
                if(file_exists("imagenes/".$empleado["foto"])){
                    if($empleado['foto']!="imagen.jpg"){
                    unlink("imagenes/".$empleado["foto"]);
        }
        } } }

        $setencia=$pdo->prepare("UPDATE herramientas SET foto=:foto WHERE id=:ID");
        $setencia->bindParam(':ID',$id);
        $setencia->bindParam(':foto',$nombrearchivo);
        $setencia->execute();

        header('Location:herramientas.php');
    break;
    case "btnEliminar":
        $setencia=$pdo->prepare("SELECT foto FROM usuarios WHERE ID=:ID");
        $setencia->bindParam(':ID',$txtID);
        $setencia->execute();
        $empleado=$setencia->fetch(PDO::FETCH_LAZY);

        if(isset($empleado["foto"])&&($empleado['foto']!="imagen.jpg")){
            if(file_exists("imagenes/".$empleado["foto"])){
                unlink("imagenes/".$empleado["foto"]);
            }
        }

        $setencia=$pdo->prepare("DELETE FROM usuarios WHERE ID=:ID");
        $setencia->bindParam(':ID',$txtID);
        $setencia->execute();
        header('Location:herramientas.php');

    break;
    case "btnCancelar":
        header('Location: herramientas.php');
    break;
    case "Modificar":
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal=true;
        $setencia=$pdo->prepare("SELECT * FROM usuarios WHERE ID=:ID");
        $setencia->bindParam(':ID',$txtID);
        $setencia->execute();
        $empleado=$setencia->fetch(PDO::FETCH_LAZY);

        $txtNombre=$empleado['nombre'];
        $txtCorreo=$empleado['correo'];
        $txtFoto=$empleado['foto'];
    break;
    
}

$setencia = $pdo->prepare('SELECT * FROM herramientas WHERE id LIKE :search ORDER BY id asc');
$setencia->execute(array(':search' => '%'.$buscar.'%'));
$productos = $setencia->fetchAll(PDO::FETCH_ASSOC);
?>