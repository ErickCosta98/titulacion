<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/login.css">
    <script src="../public/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>


    <title>Registro</title>
</head>

<body>

    <div class="container mx-auto">
        <div class="row">
            <div class="card col-sm-6 mx-auto">
                <div class="card-body">
                    <h1 class="card-title text-center">Registro</h1>
                    <form id="formSingup">
                        <input class="form-control " name="nombre" id="nombre" type="text" placeholder=" nombre">
                        <div id="errorName" class="text-danger ">
                        </div>
                        <input class="form-control mt-3" name="usuario" id="usuario" type="text" placeholder=" usuario">
                        <div id="errorUser" class="text-danger ">
                        </div>
                        <input class="form-control mt-3" name="password" id="password" type="password" placeholder=" contraseña">
                        <div id="errorPass" class="text-danger ">
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary" id="btnRegistro" type="button" onclick="registro()">Registro</button>
                    </div>
                </div>
            </div>
            <script crossorigin="anonymous" src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
            <script type="text/javascript" src="../public/js/jquery-3.6.0.min.js"></script>
            <script type="text/javascript" src="../public/lib/sweetalert2.all.min.js"></script>
            <script src="singup.js"></script>

</body>

</html>