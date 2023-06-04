<?php
// Requiere archivo configuración de la base de dato
require_once("bd.php");
// Comprabomos el estado de la variable y si existe
if (isset($_GET['controller']) && !empty($_GET['controller']) && isset($_GET['action']) && !empty($_GET['action'])) {
    switch ($_GET['controller']) {
        case 'araal':
            require_once("controllers/araalController.php");
            if (method_exists("araalController", $_GET['action'])) {
                switch ($_GET['action']) {
                    case 'addPersonal':
                        araalController::addPersonal();
                        break;
                    case 'obra':
                        araalController::obra();
                        break;
                    case 'detalObra':
                        araalController::detalObra($_GET['id']);
                        break;
                    case 'detalleObra':
                        araalController::detalleObra($_GET['id']);
                        break;
                    case 'imprimeObra':
                        araalController::imprimeObra($_GET['id']);
                        break;
                    case 'contacto':
                        araalController::contacto();
                        break;
                    case 'addObra':
                        araalController::addObra();
                        break;
                    case 'addMateriales':
                        araalController::addMateriales();
                        break;
                    case 'addAlmacen':
                        araalController::addAlmacen();
                        break;
                    case 'addUsuario':
                        araalController::addUsuario();
                        break;
                    case 'addAlmacenAdmin':
                        araalController::addAlmacenAdmin();
                        break;
                    case 'addHoras':
                        araalController::addHoras();
                        break;
                    case 'addHorasProvisional':
                        araalController::addHorasProvisional();
                        break;
                    case 'listado':
                        araalController::listado();
                        break;
                    case 'listadoMateriales':
                        araalController::listadoMaterialesAdmin();
                        break;
                    case 'listadoObra':
                        araalController::listadoObra();
                        break;
                    case 'listadoPersonal':
                        araalController::listadoPersonal();
                        break;
                    case 'listadoAdmin':
                        araalController::listadoAdmin();
                        break;
                    case 'listadoTrabajador':
                        araalController::listadoTrabajador();
                        break;
                    case 'listadoAlmacen':
                        araalController::listadoAlmacen();
                        break;
                    case 'listadoAlmacenUser':
                        araalController::listadoAlmacenUser();
                        break;
                    case 'listadoHorasUser':
                        araalController::listadoHorasUser();
                        break;
                    case 'listadoHorasFUser':
                        araalController::listadoHorasFUser();
                        break;
                    case 'listadoMaterialesUser':
                        araalController::listadoMaterialesUser();
                        break;
                    case 'listadoObraUser':
                        araalController::listadoObraUser();
                        break;
                    case 'listadoPersonalUser':
                        araalController::listadoPersonalUser();
                        break;
                    case 'listadoHorasProvisionalAdmin':
                        araalController::listadoHorasProvisionalAdmin();
                        break;
                    case 'listadoHorasAdmin':
                        araalController::listadoHorasAdmin();
                        break;
                    case 'listadoHoras':
                        araalController::listadoHoras();
                        break;
                    case 'login':
                        araalController::login();
                        break;
                    case 'loginCtrl':
                        araalController::loginCtrl();
                        break;
                    case 'logout':
                        araalController::logout();
                        break;
                    case 'listadoPersonalAdmin':
                        araalController::listadoPersonalAdmin();
                        break;
                    case 'listadoObraAdmin':
                        araalController::listadoObraAdmin();
                        break;
                    case 'listadoUsuario':
                        araalController::listadoUsuario();
                        break;
                    case 'listadoObraTerminada':
                        araalController::listadoObraTerminada();
                        break;
                    case 'listadoPersonalOff':
                        araalController::listadoPersonalOff();
                        break;
                    case 'listadoAlmacenAdmin':
                        araalController::listadoAlmacenAdmin();
                        break;
                    case 'listadoAlmacenHistorico':
                        araalController::listadoAlmacenHistorico();
                        break;
                    case 'guardaAlmacenAdmin':
                        araalController::guardaAlmacenAdmin();
                        break;
                    case 'delete':
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            araalController::delete($_GET['id'], $_GET['nombre'], $_GET['valor'], $_GET['fechaincor'], $_GET['url'], $_GET['puesto'], $_GET['fechaoff'], $_GET['dni']);
                        } else {
                            araalController::listadoPersonalAdmin();
                        }
                        break;
                    case 'deleteMaterial':
                        if (isset($_GET['idTablaMater']) && !empty($_GET['idTablaMater'])) {
                            araalController::deleteMaterial($_GET['idTablaMater'], $_GET['coste'], $_GET['idObra'], $_GET['numero'], $_GET['idProducto'], $_GET['id']);
                        } else {
                            araalController::listadoMaterialesAdmin();
                        }
                        break;
                    case 'deleteUsuario':
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            araalController::deleteUsuario($_GET['id']);
                        } else {
                            araalController::listadoPersonalAdmin();
                        }
                        break;
                    case 'deleteObra':
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            araalController::deleteObra($_GET['id'], $_GET['nombreObra'], $_GET['coste'], $_GET['horasTotal']);
                        } else {
                            araalController::listadoObraAdmin();
                        }
                        break;
                    case 'deleteAlmacen':
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            araalController::deleteAlmacen($_GET['id']);
                        } else {
                            araalController::listadoAlmacenAdmin();
                        }
                        break;


                    case 'editAlmacenAdmin':
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            araalController::editAlmacenAdmin($_GET['id'], $_GET['nombreProducto'], $_GET['descripcion'], $_GET['stock'], $_GET['minimo'], $_GET['precio']);
                        } else {
                            araalController::listadoAlmacenAdmin();
                        }
                        break;

                    case 'deleteHoras':
                        if (isset($_GET['idHoras']) && !empty($_GET['idHoras'])) {
                            araalController::deleteHoras($_GET['idHoras']);
                        } else {
                            araalController::listadoHorasProvisionalAdmin();
                        }
                        break;
                    case 'editHoras':
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            araalController::editHoras($_GET['id']);
                        } else {
                            araalController::listadoHorasProvisionalAdmin();
                        }
                        break;
                    case 'firmaHoras':
                        if (isset($_GET['idHoras']) && !empty($_GET['idHoras'])) {
                            araalController::firmaHoras($_GET['idHoras'], $_GET['horas'], $_GET['concepto'], $_GET['nombre'], $_GET['nombreObra'], $_GET['dia']);
                        } else {
                            araalController::listadoHorasProvisionalAdmin();
                        }
                        break;
                    default:
                        araalController::listado();
                        break;
                }
            } else {
                araalController::listado();
            }
            break;
        default:
            header("Status: 301 Moved Permanently");
            header("Location: index.php?controller=araal&action=listado");
            exit();
            break;
    }
} else {
    header("Status: 301 Moved Permanently");
    header("Location: index.php?controller=araal&action=listado");
    exit();
}
