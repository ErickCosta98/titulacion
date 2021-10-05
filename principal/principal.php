<!DOCTYPE html>
<html>
    <head>
        <title>
           Titulación
        </title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="../public/css/estilo1.css">
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                <link href="../public/css/style.css" rel="stylesheet" type="text/css">
                    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
                    <link href="../public/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
                        <!-- Bootstrap CSS -->
                        <link crossorigin="anonymous" href="../public/bootstrap-4.0.0-dist/css/bootstrap.min.css"  rel="stylesheet">
                            <script src="../public/js/icons.js">
                            </script>
                            <title>
                                Sidebar + Navbar
                            </title>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </body>
</html>
<body>
    <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
        <button class="btn navbar-btn" id="sidebarCollapse">
            <i class="fas fa-lg fa-bars">
            </i>
        </button>
        <a class="navbar-brand" href="">
            <h3 id="logo">
                Menu
            </h3>
        </a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#" id="link">
                        <i class="fas fa-sign-out-alt">
                        </i>
                        LogOut
                        <span class="sr-only">
                            (current)
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="link">
                        <i class="fas fa-id-card">
                        </i>
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper fixed-left">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>
                    <i class="fas fa-user">
                    </i>
                    Usuario
                </h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="javascript:void(0)" onclick="cargarPersona(0);">
                        <i class="fas fa-clipboard">
                        </i>
                        Profesionista
                    </a>
                </li>
                 <li>
                    <a href="javascript:void(0)" onclick="cargarResponsable(0);">
                        <i class="fas fa-clipboard">
                        </i>
                        Responsable
                    </a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <h1></h1>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script crossorigin="anonymous" src="https://code.jquery.com/jquery-3.4.1.slim.min.js">
    </script>
    <script crossorigin="anonymous" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    </script>
    <script crossorigin="anonymous" src="../public/bootstrap-4.0.0-dist/js/bootstrap.min.js">
    </script>
    <script src="../public/js/script.js">
    </script>
    <script type="text/javascript" src="principal.js"></script>
    <script type="text/javascript" src="../public/js/jquery-3.6.0.min.js"></script>
</body>
