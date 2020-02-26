<?php
$id=(isset($_POST['id']))?$_POST['id']:"";
$password=(isset($_POST['password']))?$_POST['password']:"";

if($id=="14530330" AND $password=="12345"){
    header('Location:../inicio.php');
}else if($id="ciencias" and $password=="123456"){
    header('Location:../menubueno.php');
}else{
    echo '<script type="text/javascript">
alert("Usuario o contraseña incorrectas");
window.location.href="../index.php";
</script>';
}



?>