<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/logincss.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="shortcut icon" href="imagenes/icon.png" />
    </head>
    <body>  
        <div class="caja">
            <form action="php/login.php" method="POST" class="box animated jackInTheBox" name="formulario">
                    <img src="imagenes/image001.png" alt="">
                    <h1>Iniciar Sesion</h1>
                    <input type="text" name="id" class="id" id="id" placeholder="ID"/>
                    <input type="password" name="password" class="password" id="password" placeholder="Password"/>
                    <input type="submit" class="btn" id="btn" value="Entrar">
            </form>
            <script src="js/loginjs.js"></script>
        </div>
    </body>
</html>