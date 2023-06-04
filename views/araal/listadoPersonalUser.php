<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Araal Electricidad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gemunu+Libre&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="/araal/web/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/b985242e66.js" crossorigin="anonymous"></script>
    <link href=" https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
    <?php
    if (!isset($_SESSION['usu'])) {
        session_start();
    } else 

if (!isset($_SESSION['usu'])) {
        header("Status: 301 Moved Permanently");
        header("Location: /araal/index.php?controller=araal&action=login&sesion=error");
        exit();
    } else if (!$_SESSION['usu']) {
        header("Status: 301 Moved Permanently");
        header("Location: /araal/index.php?controller=araal&action=login&sesion=error");
        exit();
    }
    ?>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src=".\web\img\ARAALLOGO.png" alt="logo">
            </a>
            <a class="navbar-brand">
                <?php
                if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {
                    echo "Logueado: " . $_SESSION["usu"];
                ?>
                    <a href="index.php?controller=araal&action=logout"><button>logout</button></a>
                <?php
                } else {
                    echo "Logueado: No existe usuario logueado";
                ?>
                    <a href="index.php?controller=araal&action=login"><button>login</button></a>
                <?php
                }
                ?>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">

                    <div id=1 <?php echo isset($_SESSION['usu']) && $_SESSION["rol"] == 1 ? "style='display:block'" : "style='display:none'" ?>>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?controller=araal&action=listadoAdmin" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrador<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-shop text-center d-block mx-auto" style="width: 25px;height: 25px;">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"></path>
                                </svg></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoAdmin">Listado adminstrador</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoHorasAdmin">Listado de horas trabajadas firmadas</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoHorasProvisionalAdmin">Listado de horas trabajadas para firmar</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoPersonalAdmin">Listado trabajadores administrador</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoUsuario">Listado usuarios de web</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoPersonalOff">Listado personal fuera</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoMateriales">Listado materiales obras</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoAlmacenAdmin">Listado de almacen administrador</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoAlmacenHistorico">Listado de almacen historico</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoObraAdmin">Costes de obra en curso</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoObraTerminada">Listado obras terminadas</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=addAlmacenAdmin">Añadir materiales almacen administrador</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=addPersonal">Añadir nuevos trabajadores</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=addObra">Añadir nueva obra</a></li>
                            </ul>
                        </li>
                    </div>
                    <div id=2 <?php echo isset($_SESSION['usu']) ? "style='display:block'" : "style='display:none'" ?>>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?controller=araal&action=listadoTrabajador" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabajadores<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cart3 text-center d-block mx-auto" style="width: 25px;height: 25px;">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                </svg>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoTrabajador">Listado trabajador</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoAlmacenUser">Listado de almacen</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoMaterialesUser">Listado de materiales usados en obra</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=addMateriales">Añadir materiales a obra</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=addAlmacen">Añadir materiales al almacen</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoObraUser">Listado de obra</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoHorasUser">Listado de horas trabajadas sin firmar</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoHorasFUser">Listado de horas trabajadas firmadas</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=listadoPersonalUser">Listado de personal</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=araal&action=addHoras">Añadir horas a obra</a></li>

                            </ul>
                        </li>
                    </div>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=araal&action=contacto">Contacto<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-lines-fill text-center d-block mx-auto" style="width: 25px;height: 25px;">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"></path>
                            </svg></a></li>


                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house text-center d-block mx-auto" style="width: 25px;height: 25px;">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                            </svg></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Lista de trabajadores</h1>

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre del trabajador</th>
                            <th>Puesto</th>
                            <th>Fecha de</br> incorporación</th>
                            <th>Ciudad</th>
                            <th>Dirección</th>
                            <th>Número</th>
                            <th>Localidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datos['datos'] as $dato) {
                            $fecha = $dato['fechaincor'];
                            $fechaFormateada = date("d/m/Y", strtotime($fecha));
                        ?>
                            <tr>
                                <td> <?php echo $dato['nombre'] ?> </td>
                                <td> <?php echo $dato['puesto'] ?> </td>
                                <td> <?php echo $fechaFormateada ?> </td>
                                <td> <?php echo $dato['ciudad'] ?> </td>
                                <td> <?php echo $dato['calle'] ?> </td>
                                <td> <?php echo $dato['numero'] ?> </td>
                                <td> <?php echo $dato['localidad'] ?> </td>
                                </td>
                            </tr>

                        <?php
                            //&fechaoff=<?php echo  $dato['fechaoff']
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if (!isset($dato) or $dato == null) {
                    echo '<h4>No hay personal contratado</h4>';
                }
                ?>
                <a href="index.php?controller=araal&action=listadoTrabajador">Volver</a>
            </div>
        </div>
    </div>
    <footer class="container-fluid py-5 mt-5">
        <div class="row">
            <div class="col-12 d-flex flex-column justify-content-center col-md-4">
                <div class="d-flex justify-content-center"><img src="web/img/ARAALLOGO.png" ALT=Logo></div>
            </div>
            <div class="col-12 col-md-4 mt-4 mt-md-0">
                <div class="d-flex flex-column align-items-center"><a href="index.php">Inicio</a><a href="index.php?controller=araal&action=listadoAdmin">
                        <div <?php echo isset($_SESSION['usu']) && $_SESSION["rol"] == 1 ? "style='display:block'" : "style='display:none'" ?>>Administrador
                    </a></div>
                <div id=2 <?php echo isset($_SESSION['usu']) ? "style='display:block'" : "style='display:none'" ?>><a href="index.php?controller=araal&action=listadoTrabajador">Trabajador</a></div><a href="index.php?controller=araal&action=contacto">Contacto</a>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center col-md-4 mt-4 mt-md-0">
            <div>
                <p>Siguenos en redes: </p><a href="https://www.facebook.com/ARAAL-SL-104050048849548/"><i class="fab fa-facebook me-4" style="font-size: 30px;"></i></a>
            </div>
        </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>