<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Araal Electricidad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gemunu+Libre&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="./web/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<?php
if (!isset($_SESSION['usu'])) {
    session_start();
} else 
if ($_SESSION["rol"] == 3) {
    header("Status: 301 Moved Permanently");
    header("Location: /araal/index.php?controller=araal&action=login&sesion=error");
    exit();
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
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1 class="text-center">Araal Electricidad</h1>
                <h2 class="text-center">Nuevo trabajador</h2>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex flex-column justify-content-center align-content-center align-items-xl-center"></a>
                <form action="index.php?controller=araal&action=addPersonal" method=post enctype="multipart/form-data"> <!--Formulario-->

                    <label>Nombre:</label><br />
                    <input type="text" name="nombre" value="<?php echo $dF['valores']['nombre']; ?>" /><br />
                    <?php
                    if (isset($dF['errores']['nombre']) && !empty($dF['errores']['nombre'])) {
                        echo '<span class="rojo">' . $dF['errores']['nombre'] . '</span><br/>';
                    }
                    ?>
                    <label>Dni:</label><br />
                    <input type="text" name="dni" value="<?php echo $dF['valores']['dni']; ?>" /><br />
                    <?php
                    if (isset($dF['errores']['dni']) && !empty($dF['errores']['dni'])) {
                        echo '<span class="rojo">' . $dF['errores']['dni'] . '</span><br/>';
                    }
                    ?>
                    <label>Calle:</label><br />
                    <input type="text" name="direccion" value="<?php echo $dF['valores']['direccion']; ?>" /><br />
                    <?php
                    if (isset($dF['errores']['direccion']) && !empty($dF['errores']['direccion'])) {
                        echo '<span class="rojo">' . $dF['errores']['direccion'] . '</span><br/>';
                    }
                    ?>
                    <label>Ciudad:</label><br />
                    <input type="text" name="ciudad" value="<?php echo $dF['valores']['ciudad']; ?>" /><br />
                    <?php
                    if (isset($dF['errores']['ciudad']) && !empty($dF['errores']['ciudad'])) {
                        echo '<span class="rojo">' . $dF['errores']['ciudad'] . '</span><br/>';
                    }
                    ?>
                    <label>Localidad:</label><br />
                    <input type="text" name="localidad" value="<?php echo $dF['valores']['localidad']; ?>" /><br />
                    <?php
                    if (isset($dF['errores']['localidad']) && !empty($dF['errores']['localidad'])) {
                        echo '<span class="rojo">' . $dF['errores']['localidad'] . '</span><br/>';
                    }
                    ?>
                    <label>Numero:</label><br />
                    <input type="text" name="numero" value="<?php echo $dF['valores']['numero']; ?>" /><br />
                    <?php
                    if (isset($dF['errores']['numero']) && !empty($dF['errores']['numero'])) {
                        echo '<span class="rojo">' . $dF['errores']['numero'] . '</span><br/>';
                    }
                    ?>
                    <label>Puesto:</label><br />
                    <select name="puesto" required>
                        <option value="" disabled>Seleccione</option>
                        <?php
                        if (!empty($puesto)) {
                            foreach ($puesto['datos'] as $pues) : // los mostramos los datos
                                if ($pues['idPuesto'] == $dF['valores']['puesto']) {
                                    echo '<option value="' . $pues['idPuesto'] . '" selected>' . $pues['puesto'] . '</option>';
                                } else {
                                    echo '<option value="' . $pues['idPuesto'] . '">' . $pues['puesto'] . '</option>';
                                }
                            endforeach;
                        }
                        ?>
                    </select><br />
                    <label>Fecha de incorporación:</label><br />
                    <input type="date" name="fecha" value="<?php echo $dF['valores']['fecha']; ?>" /><br />
                    <?php
                    if (isset($dF['errores']['fecha']) && !empty($dF['errores']['fecha'])) {
                        echo '<span class="rojo">' . $dF['errores']['fecha'] . '</span><br/>';
                    }
                    ?>
                    <label>Valor horas:</label><br />
                    <input type="number" name="valor" value="<?php echo $dF['valores']['valor']; ?>" /><br />
                    <?php
                    if (isset($dF['errores']['valor']) && !empty($dF['errores']['valor'])) {
                        echo '<span class="rojo">' . $dF['errores']['valor'] . '</span><br/>';
                    }
                    ?>
            </div>
            <div class="col d-flex flex-column justify-content-center align-content-center align-items-xl-center"></a>
                <label>Foto:</label><br />
                <input type="file" name="foto" accept="image/jpeg" /><br />
                <?php
                if (isset($dF['errores']['file']) && !empty($dF['errores']['file'])) {
                    echo '<span class="rojo">' . $dF['errores']['file'] . '</span><br/>';
                }
                ?>
                <label>Tipo de contrato:</label><br />
                <select name="contrato" required>
                    <option value="" disabled>Seleccione</option>
                    <?php
                    if (!empty($contrato)) {
                        foreach ($contrato['datos'] as $contratos) : // los mostramos los datos
                            if ($contratos['idContrato'] == $dF['valores']['fechaoff']) {
                                echo '<option value="' . $contratos['idContrato'] . '" selected>' . $contratos['contrato'] . '</option>';
                            } else {
                                echo '<option value="' . $contratos['idContrato'] . '">' . $contratos['contrato'] . '</option>';
                            }
                        endforeach;
                    }
                    ?>
                </select><br />
                <label>Usuario web:</label>
                <input type="text" name="usuario" value="<?php echo $dF['valores']['usuario']; ?>" /><br />
                <?php
                if (isset($dF['errores']['usuario']) && !empty($dF['errores']['usuario'])) {
                    echo '<span class="rojo">' . $dF['errores']['usuario'] . '</span><br/>';
                }
                ?>
                <label>Introduce Pass:</label>
                <input type="password" name="pass" value="<?php echo $dF['valores']['pass']; ?>" /><br />
                <?php
                if (isset($dF['errores']['pass']) && !empty($dF['errores']['pass'])) {
                    echo '<span class="rojo">' . $dF['errores']['pass'] . '</span><br/>';
                }
                ?>
                <label>Repite pass:</label>
                <input type="password" name="rPass" value="<?php echo $dF['valores']['rPass']; ?>" /><br />
                <?php
                if (isset($dF['errores']['rPass']) && !empty($dF['errores']['rPass'])) {
                    echo '<span class="rojo">' . $dF['errores']['rPass'] . '</span><br/>';
                }
                ?>
                <label>Rol:</label><br />
                <select name="rol" required>
                    <option value="" disabled>Seleccione</option>
                    <?php
                    if (!empty($rol)) {
                        foreach ($rol['datos'] as $role) : // los mostramos los datos
                            if ($role['id'] == $dF['valores']['rol']) {
                                echo '<option value="' . $role['id'] . '" selected>' . $role['rol'] . '</option>';
                            } else {
                                echo '<option value="' . $role['id'] . '">' . $role['rol'] . '</option>';
                            }
                        endforeach;
                    }
                    ?>
                </select><br />
                <hr>
                <button type="submit">Guardar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div>
                    </form>
                </div>
                <div>
                    <a href="index.php?controller=araal&action=listadoAdmin">Volver</a>
                </div>
            </div>
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

</php>