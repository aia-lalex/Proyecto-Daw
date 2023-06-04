<?php
require_once("models/araalModel.php");


class araalController
{
    public static $titulo = 'Araal';

    static function delete($id, $nombre, $valor, $fechaincor, $url, $puesto, $fechaOff, $dni) // Borra trabajadores de la empresa
    {
        $data = array();
        $data['id'] = $id;

        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->borrar($id, $nombre, $valor, $fechaincor, $url, $puesto, $fechaOff, $dni);

        header("Status: 301 Moved Permanently");
        header("Location: index.php?controller=araal&action=listadoPersonalAdmin");
        exit();
    }

    static function deleteMaterial($id, $coste, $idObra, $numero, $idProducto, $user) // Borra material de la lista de materiales
    {
        $data = array();
        $data['id'] = $id;

        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->deleteMaterial($id, $coste, $idObra, $numero, $idProducto, $user);

        header("Status: 301 Moved Permanently");
        header("Location: index.php?controller=araal&action=listadoMateriales");
        exit();
    }

    static function deleteUsuario($id) // Borra usuarios de la lista
    {
        $data = array();
        $data['id'] = $id;

        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->borrarUsuario($id);

        header("Status: 301 Moved Permanently");
        header("Location: index.php?controller=araal&action=listadoUsuario");
        exit();
    }
    static function deleteObra($id, $coste, $horas, $nombre) // Borra obra en curso de la lista
    {
        $data = array();
        $data['id'] = $id;

        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->borrarObra($id, $coste, $horas, $nombre);

        header("Status: 301 Moved Permanently");
        header("Location: index.php?controller=araal&action=listadoObraAdmin");
        exit();
    }

    static function deleteAlmacen($id) // Borra articulo del almacen
    {
        $data = array();
        $data['id'] = $id;

        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->borrarAlmacen($id);

        header("Status: 301 Moved Permanently");
        header("Location: index.php?controller=araal&action=listadoAlmacenAdmin");
        exit();
    }

    static function deleteHoras($id) // Borra las horas intruducidas en parte provisional
    {
        $data = array();
        $data['id'] = $id;

        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->borrarHoras($id);

        header("Status: 301 Moved Permanently");
        header("Location: index.php?controller=araal&action=listadoHorasProvisionalAdmin");
        exit();
    }

    static function editHoras($id) // Edita las horas intruducidas en parte provisional
    {
        $data = array();
        $data['id'] = $id;

        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->editHoras($id);

        header("Status: 301 Moved Permanently");
        header("Location: index.php?controller=araal&action=listadoHorasProvisionalAdmin");
        exit();
    }

    static function guardaAlmacenAdmin() // Guarda los materiales en el almacen despues de editarlos
    {

        $data = array();
        $data['nombre'] = '';
        $data['descripcion'] = '';
        $data['stock'] = '';
        $data['minimo'] = '';
        $data['precio'] = '';
        $data['trabajador'] = '';
        $data['id'] = '';

        $modelo = new araalModel();
        $dF = $modelo->getData();

        if (isset($_POST) && !empty($_POST)) {
            $data['nombre'] = $_POST['nombre'];
            $data['descripcion'] = $_POST['descripcion'];
            $data['stock'] = $_POST['stock'];
            $data['minimo'] = $_POST['minimo'];
            $data['precio'] = $_POST['precio'];
            $data['trabajador'] = $_POST['trabajador'];
            $data['id'] = $_POST['id'];
            $modelo = new araalModel();
            $modelo->setData($data);
            $modelo->editAlmacenAdmin();
            $dF = $modelo->getData();

            if ($dF['valido'] == true) {
                header("Status: 301 Moved Permanently");
                header("Location: index.php?controller=araal&action=listadoAlmacenAdmin");
                exit();
            } else {
                echo '<script>alert("Datos no ingresados correctamente intenta de nuevo")</script>';
                require_once("views/araal/editAlmacenAdmin.php");
            }
        } else {

            require_once("views/araal/editAlmacenAdmin.php");
        }
    }

    static function editAlmacenAdmin($id, $nombreProducto, $descripcion, $stock, $minimo, $precio) // Edita los materiales de almacen
    {
        $data = array();
        $data['id'] = $id;
        $data['nombreProducto'] = $nombreProducto;
        $data['descripcion'] = $descripcion;
        $data['stock'] = $stock;
        $data['minimo'] = $minimo;
        $data['precio'] = $precio;

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->usuarios();
            $usuarios = $modelo->getData();
            $modelo->listadoAlmacenEdit($id);
            $datos = $modelo->getData();
            $data = array();
            $data['nombre'] = '';
            $data['descripcion'] = '';
            $data['stock'] = '';
            $data['minimo'] = '';
            $data['precio'] = '';
            $data['trabajador'] = '';

            $modelo = new araalModel();
            $dF = $modelo->getData();

            if (isset($_POST) && !empty($_POST)) {
                $data['nombre'] = $_POST['nombre'];
                $data['descripcion'] = $_POST['descripcion'];
                $data['stock'] = $_POST['stock'];
                $data['minimo'] = $_POST['minimo'];
                $data['precio'] = $_POST['precio'];
                $data['trabajador'] = $_POST['trabajador'];

                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->editAlmacenAdmin();
                $dF = $modelo->getData();

                if ($dF['valido'] == true) {
                    header("Status: 301 Moved Permanently");
                    header("Location: index.php?controller=araal&action=listadoAlmacenAdmin");
                    exit();
                } else {
                    echo '<script>alert("Datos no ingresados correctamente intenta de nuevo")</script>';
                    require_once("views/araal/editAlmacenAdmin.php");
                }
            } else {

                require_once("views/araal/editAlmacenAdmin.php");
            }
        }
    }

    static function firmaHoras($id, $horas, $concepto, $trabajador, $obra, $dia) // Firma las horas de los partes provisionales
    {
        $data = array();
        $data['idHoras'] = $id;
        $data['horas'] = $horas;
        $data['nombre'] = $trabajador;
        $data['nombreObra'] = $obra;
        $data['dia'] = $dia;
        $data['concepto'] = $concepto;

        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->firmaHoras($id);

        header("Status: 301 Moved Permanently");
        header("Location: index.php?controller=araal&action=listadoHorasProvisionalAdmin");
        exit();
    }



    
    static function listadoHorasFUser()   // fucion listado muestra partes firmados personal
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {


            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
         
            $id=$_SESSION['usu'];
            $modelo->listadoHorasUser($id);
            $datos = $modelo->getData();
            
            require_once("views/araal/listadoHorasFirmadasUser.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }
    static function listadoHorasAdmin()   // fucion listado muestra partes firmados personal
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {


            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
        
            $modelo->listadoHoras();
            $datos = $modelo->getData();
         

            require_once("views/araal/listadoHorasFirmadasAdmin.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }
    
    static function listadoHorasUser()   // fucion listado muestra partes provisionales
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {


            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $id=$_SESSION['usu'];
            $modelo->listadoHorasProvisionalUser($id);
            $datos = $modelo->getData();


            require_once("views/araal/listadoHorasProvisionalUser.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }




    static function listadoHorasProvisionalAdmin()   // fucion listado muestra partes provisionales
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {


            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoHorasProvisional();
            $datos = $modelo->getData();

            require_once("views/araal/listadoHorasProvisionalAdmin.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }

    static function listadoAlmacenAdmin()   // fucion listado de almacen administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoAlmacen();
            $datos = $modelo->getData();

            require_once("views/araal/listadoAlmacenAdmin.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }

    static function listadoAlmacenHistorico()   // fucion listado muestra todos los movimientos del almacen
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoAlmacenHistorico();
            $datos = $modelo->getData();

            require_once("views/araal/listadoAlmacenHistorico.php");
        } else {
            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación.")</script>';

            require_once("views/araal/login.php");
        }
    }


    static function listadoUsuario()   // fucion listado muestra usuarios de la pagina
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $validar = new araalModel();
            $validar->validarDato();
        }

        $modelo = new araalModel();
        $modelo->listadoUsuario();
        $datos = $modelo->getData();


        require_once("views/araal/listadoUsuario.php");
    }

    static function listadoPersonalOff()   // fucion listado muestra todos los trabajadores en la calle
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoPersonalOff();
            $datos = $modelo->getData();

            require_once("views/araal/listadoPersonalOff.php");
        } else {
            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación.")</script>';

            require_once("views/araal/login.php");
        }
    }


    static function listadoObraTerminada()   // fucion listado muestra todos los trabajadores terminados
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoObraTerminada();
            $datos = $modelo->getData();

            require_once("views/araal/listadoObraTerminada.php");
        } else {
            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación.")</script>';

            require_once("views/araal/login.php");
        }
    }

      static function detalObra($id)   // fucion listado muestra todos los trabajos administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoMateriales();
            $materiales = $modelo->getData();
            $modelo->listadoMaterialesImprime($id);
            $materialesImprime = $modelo->getData();
            $modelo->listadohorasImprime($id);
            $horas = $modelo->getData();
            $modelo->listadohorasSumaImprime($id);
            $horaSuma = $modelo->getData();
            $modelo->listadoObraTerminadaId($id);
            $datos = $modelo->getData();
            


            require_once("views/araal/listadoObraTerminadaDetal.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }
    static function detalleObra($id)   // fucion listado muestra todos los trabajos administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoMateriales();
            $materiales = $modelo->getData();
              $modelo->listadoMaterialesImprimeD($id);
            $materialesImprimeD = $modelo->getData();
            $modelo->listadoMaterialesImprime($id);
            $materialesImprime = $modelo->getData();
            $modelo->listadohorasImprime($id);
            $horas = $modelo->getData();
            $modelo->listadohorasSumaImprime($id);
            $horaSuma = $modelo->getData();
            $modelo->listadoObras($id);
            $datos = $modelo->getData();
            


            require_once("views/araal/listadoObraDetalle.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }


    
    static function imprimeObra($id)   // fucion listado muestra todos los trabajadores terminados
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            
            $modelo = new araalModel();
            $modelo->addFactura($id);
           // $modelo->listadoMateriales();
           $modelo->listadoMateriales();
            $materiales = $modelo->getData();
           $modelo->listadoMaterialesImprime($id);
            $material = $modelo->getData();
            $modelo->listadohorasImprime($id);
            $horas = $modelo->getData();
            $modelo->listadohorasSumaImprime($id);
            $horaSuma = $modelo->getData();
           // $modelo->listadoObraTerminada();
           // $datos = $modelo->getData();
            $modelo->listadoObraTerminadaId($id);
            $datos = $modelo->getData();


            require_once("views/araal/listadoObraTerminadaImprime.php");
        } else {
            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación.")</script>';

            require_once("views/araal/login.php");
        }
    }

    static function listadoObraAdmin()   // fucion listado muestra todos los trabajos administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoObra();
            $datos = $modelo->getData();


            require_once("views/araal/listadoObraAdmin.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }

  
    static function listadoObraUser()   // fucion listado muestra todos los trabajos Usuario
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoObra();
            $datos = $modelo->getData();


            require_once("views/araal/listadoObraUser.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }

    static function listadoPersonalAdmin()   // fucion listado muestra todos los trabajadores administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"]) {

            $validar = new araalModel();
            $validar->validarDato();


            $title = self::$titulo;
            $modelo = new araalModel();
            $modelo->listadoPersonalAdmin();
            $datos = $modelo->getData();

            require_once("views/araal/listadoPersonalAdmin.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }
    static function listadoPersonalUser()   // fucion listado muestra todos los trabajadores administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) ) {

            $validar = new araalModel();
            $validar->validarDato();


            $title = self::$titulo;
            $modelo = new araalModel();
            $modelo->listadoPersonalAdmin();
            $datos = $modelo->getData();

            require_once("views/araal/listadoPersonalUser.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }


    static function listado()   // fucion INDEX pagina inicio
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $validar = new araalModel();
            $validar->validarDato();
        }
/*
        $title = self::$titulo;
        $modelo = new araalModel();
        $modelo->listado();
        $datos = $modelo->getData();*/

        require_once("views/araal/index.php");
    }

    static function listadoPersonal()   // fucion listado muestra todos los trabajadores

    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && ($_SESSION["rol"] == 3 or $_SESSION["rol"] == 1)) {


            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoPersonal();
            $datos = $modelo->getData();
            return $datos['datos'];
        } else {
            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación.")</script>';

            $modelo = new araalModel();
            $modelo->listadoPersonal();
            $datos = $modelo->getData();
            return $datos['datos'];


            require_once("views/araal/login.php");
        }
    }

    static function listadoObra()   // fucion listado muestra todos las obrasw

    {
        $modelo = new araalModel();
        $modelo->listadoObra();
        $datos = $modelo->getData();
        return $datos['datos'];
    }

    static function listadoUsuarios()   // fucion listado muestra todos los usuarios

    {
        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $modelo = new araalModel();
            $modelo->listadoUsuario();
            $datos = $modelo->getData();
            return $datos['datos'];
        } else {
            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación.")</script>';

            require_once("views/araal/login.php");
        }
    }

    static function listadoTrabajador()   // fucion listado muestra todos los trabajadores

    {
        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {


            $validar = new araalModel();
            $validar->validarDato();
            require_once("views/araal/listadoTrabajador.php");
        } else {
            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación.")</script>';

            require_once("views/araal/login.php");
        }
    }

    static function listadoAdmin()   // fucion listado muestra todos los trabajadores administrador

    {
        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();
            require_once("views/araal/listadoAdmin.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';
            $title = self::$titulo;
            $modelo = new araalModel();
            $modelo->listado();
            $datos = $modelo->getData();
            require_once("views/araal/login.php");
        }
    }

    static function listadoAlmacenUser()   // fucion listado de almacen administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoAlmacen();
            $datos = $modelo->getData();

            require_once("views/araal/listadoAlmacen.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }


    static function listadoAlmacen()   // fucion listado muestra todos los materiales del almacen
    {
        
       
        session_start();
   
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {
            
         
            $validar = new araalModel();
            $validar->validarDato();
            
            
            $modelo = new araalModel();
            $modelo->listadoAlmacen();
            $datos = $modelo->getData();
            return $datos['datos'];

            
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';
/*
            $title = self::$titulo;
            $modelo = new araalModel();
            $modelo->listadoAlmacen();
            $datos = $modelo->getData();
            return $datos['datos'];*/

            require_once("views/araal/login.php");
        }
    }

    static function listadoHoras()   // fucion listado muestra todos los partes firmados front-end

    {
        $modelo = new araalModel();
        $modelo->listadoHoras();
        $datos = $modelo->getData();
        return $datos['datos'];
    }

    static function listadoHorasProvisional()   // fucion listado muestra todos los trabajadores front-end

    {
        $modelo = new araalModel();
        $modelo->listadoHorasProvisional();
        $datos = $modelo->getData();
        return $datos['datos'];
    }


    static function listadoCoste()   // fucion listado muestra todos los costes

    {
        $modelo = new araalModel();
     //   $modelo->listadoCoste();
        $datos = $modelo->getData();
        return $datos['datos'];
    }
    

    
    static function contacto() // Muestra los materiales usados por obra administrador
    {
        session_start();
        require_once("views/araal/contacto.php");
    }
    static function listadoMaterialesUser() // Muestra los materiales usados por obra administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {


            $validar = new araalModel();
            $validar->validarDato();
            $title = self::$titulo;
            $modelo = new araalModel();
            $modelo->listadoMateriales();
            $datos = $modelo->getData();
            require_once("views/araal/listadoMaterialesUser.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';

            $title = self::$titulo;
            $modelo = new araalModel();
            $modelo->listadoMateriales();
            $datos = $modelo->getData();
            require_once("views/araal/login.php");
        }
    }

    static function listadoMaterialesAdmin() // Muestra los materiales usados por obra administrador
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {


            $validar = new araalModel();
            $validar->validarDato();
            $title = self::$titulo;
            $modelo = new araalModel();
            $modelo->listadoMateriales();
            $datos = $modelo->getData();
            require_once("views/araal/listadoMateriales.php");
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';

            $title = self::$titulo;
            $modelo = new araalModel();
            $modelo->listadoMateriales();
            $datos = $modelo->getData();
            require_once("views/araal/login.php");
        }
    }


    static function listadoMateriales() // Muestra los materiales usados por obra front-end
    {

        $modelo = new araalModel();
        $modelo->listadoMateriales();
        $datos = $modelo->getData();
        return $datos['datos'];
    }


    static function obra() // funcion  que muestra las obras
    {

        $data = array();
        $data['nombre'] = '';

        if (isset($_POST) && !empty($_POST)) {
            $data['nombre'] = $_POST['nombre'];
        }
        $modelo = new araalModel();
        $modelo->setData($data);
        $modelo->obra();

        $dF = $modelo->getData();

        if ($dF['valido'] == true) {
            header("Status: 301 Moved Permanently");
            header("Location: index.php?controller=araal&action=listado");
            exit();
        } else {
            require_once("views/araal/obra.php");
        }
    }

    static function addAlmacen() // funcion añadir articulos a almacen trabajadores
    {
        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoAlmacen();
            $datos = $modelo->getData();
            $modelo->usuarios();
            $usuarios = $modelo->getData();
            $data = array();
            $data['nombre'] = '';
            $data['stoc'] = '';
            $data['trabajador'] = '';
            $modelo = new araalModel();
            $dF = $modelo->getData();

            if (isset($_POST) && !empty($_POST)) {
                $data['nombre'] = $_POST['nombre'];
                $data['stoc'] = $_POST['stoc'];
                $data['trabajador'] = $_POST['trabajador'];

                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->addAlmacen();
                $dF = $modelo->getData();

                if ($dF['valido'] == true) {
                    echo '<script>alert("Materiales ingresados correctamente")</script>';
                  //  header("Status: 301 Moved Permanently");
            //        header("Location:../araalcliente/listadoAlmacen.php");
             require_once("views/araal/addAlmacen.php");
                    exit();
                } else {
                    echo '<script>alert("Materiales no ingresados correctamente intenta de nuevo")</script>';
                    require_once("views/araal/addAlmacen.php");
                }
            } else {

                require_once("views/araal/addAlmacen.php");
            }
        }
    }
    static function addHoras() // funcion añadir horas trabajadores
    {
        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoObra();
            $obra = $modelo->getData();
            $modelo->usuarios();
            $usuarios = $modelo->getData();
            $data = array();
            $data['trabajador'] = '';
            $data['dia'] = '';
            $data['horas'] = '';
            $data['obra'] = '';
            $data['concepto'] = '';
            $modelo = new araalModel();
            $dF = $modelo->getData();

            if (isset($_POST) && !empty($_POST)) {
                $data['trabajador'] = $_POST['trabajador'];
                $data['dia'] = $_POST['dia'];
                $data['horas'] = $_POST['horas'];
                $data['obra'] = $_POST['obra'];
                $data['concepto'] = $_POST['concepto'];
                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->addHoras();
                $dF = $modelo->getData();

                if ($dF['valido'] == true) {
                     echo '<script>alert("Horas ingresadas correctamente")</script>';
                    header("Status: 301 Moved Permanently");
                    header("Location:index.php?controller=araal&action=listadoHorasUser");
                    exit();
                } else {
                    echo '<script>alert("Las horas no estan ingresadas correctamente intenta de nuevo")</script>';
                    require_once("views/araal/addHoras.php");
                }
            } else {

                require_once("views/araal/addHoras.php");
            }
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }

    static function addUsuario() // funcion añadir usuario a la pagina
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {


            $validar = new araalModel();
            $validar->validarDato();

            $data = array();
            $data['nombre'] = '';
            $data['pass'] = '';
            $modelo = new araalModel();
            $dF = $modelo->getData();

            if (isset($_POST) && !empty($_POST)) {
                $data['nombre'] = $_POST['nombre'];
                $data['pass'] = $_POST['pass'];

                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->addUsuario();
                $dF = $modelo->getData();

                if ($dF['valido'] == true) {
                    header("Status: 301 Moved Permanently");
                    header("Location:views/araal/listadoUsuario.php");
                    exit();
                } else {
                    echo '<script>alert("Los datos no estan ingresadas correctamente intenta de nuevo")</script>';
                    require_once("views/araal/addUsuario.php");
                }
            } else {

                require_once("views/araal/addUsuario.php");
            }
        }
    }


    static function addHorasProvisional() // funcion añadir al listado provisional
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoPersonal();
            $usuarios = $modelo->getData();
            $modelo->listadoObra();
            $obra = $modelo->getData();
            $data = array();
            $data['trabajador'] = '';
            $data['dia'] = '';
            $data['horas'] = '';
            $data['obra'] = '';
            $data['concepto'] = '';
            $modelo = new araalModel();

            $dF = $modelo->getData();


            if (isset($_POST) && !empty($_POST)) {
                $data['trabajador'] = $_POST['trabajador'];
                $data['dia'] = $_POST['dia'];
                $data['horas'] = $_POST['horas'];
                $data['obra'] = $_POST['obra'];
                $data['concepto'] = $_POST['concepto'];

                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->addHorasProvisional();
                $dF = $modelo->getData();

                if ($dF['valido'] == true) {
                    header("Status: 301 Moved Permanently");
                    header("Location: index.php?controller=araal&action=listadoHorasUser");
                    exit();
                } else {
                    echo '<script>alert("Las horas no estan ingresadas correctamente intenta de nuevo")</script>';


                    require_once("views/araal/addHoras.php");
                }
            } else {

                require_once("views/araal/addHoras.php");
            }
        }
    }


    static function addAlmacenAdmin() // funcion añadir materiales al almacen administrador
    {
        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->usuarios();
            $usuarios = $modelo->getData();
            $data = array();
            $data['nombre'] = '';
            $data['descripcion'] = '';
            $data['stock'] = '';
            $data['minimo'] = '';
            $data['precio'] = '';
            $data['trabajador'] = '';
            $modelo = new araalModel();
            $dF = $modelo->getData();

            if (isset($_POST) && !empty($_POST)) {
                $data['nombre'] = $_POST['nombre'];
                $data['descripcion'] = $_POST['descripcion'];
                $data['stock'] = $_POST['stock'];
                $data['minimo'] = $_POST['minimo'];
                $data['precio'] = $_POST['precio'];
                $data['trabajador'] = $_POST['trabajador'];
                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->addAlmacenAdmin();
                $dF = $modelo->getData();

                if ($dF['valido'] == true) {
                    header("Status: 301 Moved Permanently");
                    header("Location: index.php?controller=araal&action=listadoAlmacenAdmin");
                    exit();
                } else {
                    echo '<script>alert("Datos no ingresados correctamente intenta de nuevo")</script>';
                    require_once("views/araal/addAlmacenAdmin.php");
                }
            } else {

                require_once("views/araal/addAlmacenAdmin.php");
            }
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }

    static function addMateriales() // funcion añadir materiales a la obra 
    {
        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoAlmacen();
            $datos = $modelo->getData();
            $modelo->listadoObra();
            $obra = $modelo->getData();
            $modelo->usuarios();
            $usuarios = $modelo->getData();

            $data = array();
            $data['nombre'] = '';
            $data['fecha'] = '';
            $data['numero'] = '';
            $data['obra'] = '';
            $data['trabajador'] = '';
            $modelo = new araalModel();
            $dF = $modelo->getData();

            if (isset($_POST) && !empty($_POST)) {
                $data['nombre'] = $_POST['nombre'];
                $data['fecha'] = $_POST['fecha'];
                $data['numero'] = $_POST['numero'];
                $data['obra'] = $_POST['obra'];
                $data['trabajador'] = $_POST['trabajador'];;

                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->addMateriales();
                $dF = $modelo->getData();

                if ($dF['valido'] == true) {
                    header("Status: 301 Moved Permanently");
                    header("Location:index.php?controller=araal&action=listadoMaterialesUser");
                    exit();
                } else {
                    echo '<script>alert("Materiales no ingresados correctamente intenta de nuevo")</script>';
                    require_once("views/araal/addMateriales.php");
                }
            } else {

                require_once("views/araal/addMateriales.php");
            }
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }

    static function addObra() // funcion añadir nueva obra 
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $data = array();
            $data['nombre'] = '';
            $data['direccion'] = '';
            $data['ciudad'] = '';
            $data['numero'] = '';
            $data['localidad'] = '';
            $modelo = new araalModel();
            $dF = $modelo->getData();

            if (isset($_POST) && !empty($_POST)) {
                $data['nombre'] = $_POST['nombre'];
                $data['direccion'] = $_POST['direccion'];
                $data['ciudad'] = $_POST['ciudad'];
                $data['numero'] = $_POST['numero'];
                $data['localidad'] = $_POST['localidad'];

                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->addObra();
                $dF = $modelo->getData();

                if ($dF['valido'] == true) {
                    header("Status: 301 Moved Permanently");
                    header("Location: index.php?controller=araal&action=listadoObraAdmin");
                    exit();
                } else {
                    echo '<script>alert("Datos no ingresados correctamente intenta de nuevo")</script>';
                    require_once("views/araal/addObra.php");
                }
            } else {

                require_once("views/araal/addObra.php");
            }
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }




    
    static function addPersonal() // funcion añadir personal
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"]) && $_SESSION["rol"] == 1) {

            $validar = new araalModel();
            $validar->validarDato();

            $modelo = new araalModel();
            $modelo->listadoRol();
            $rol = $modelo->getData();
            $modelo->listadoPuesto();
            $puesto = $modelo->getData();
            $modelo->listadoContrato();
            $contrato = $modelo->getData();
            $title = self::$titulo;

            $data = array();
            $data['nombre'] = '';
            $data['puesto'] = '';
            $data['fecha'] = '';
            $data['valor'] = '';
            $data['rol'] = '';
            $data['pass'] = '';
            $data['usuario'] = '';
            $data['contrato'] = '';
            $data['file'] = array();
            $data['dni'] = '';
            $data['direccion'] = '';
            $data['ciudad'] = '';
            $data['numero'] = '';
            $data['localidad'] = '';
            $data['rPass'] = '';
            $modelo = new araalModel();

            $dF = $modelo->getData();

            if (isset($_POST) && !empty($_POST)) {
                $data['nombre'] = $_POST['nombre'];
                $data['puesto'] = $_POST['puesto'];
                $data['fecha'] = $_POST['fecha'];
                $data['valor'] = $_POST['valor'];
                $data['rol'] = $_POST['rol'];
                $data['pass'] = $_POST['pass'];
                $data['dni'] = $_POST['dni'];
                $data['usuario'] = $_POST['usuario'];
                $data['contrato'] = $_POST['contrato'];
                $data['file'] = $_FILES['foto'];
                $data['direccion'] = $_POST['direccion'];
                $data['ciudad'] = $_POST['ciudad'];
                $data['numero'] = $_POST['numero'];
                $data['localidad'] = $_POST['localidad'];
                $data['rPass'] = $_POST['rPass'];
                $modelo = new araalModel();
                $modelo->setData($data);
                $modelo->addPersonal();
                $dF = $modelo->getData();


                if ($dF['valido'] == true) {
                    header("Status: 301 Moved Permanently");
                    header("Location: index.php?controller=araal&action=listadoPersonalAdmin");
                    exit();
                } else {
                    echo '<script>alert("Datos no ingresados correctamente intenta de nuevo")</script>';
                    require_once("views/araal/addPersonal.php");
                }
            } else {

                require_once("views/araal/addPersonal.php");
            }
        } else {

            echo '<script>alert("No esta autorizado a visualizar el contenido. Por favor, inice sesión a continuación como administrador.")</script>';


            require_once("views/araal/login.php");
        }
    }

    static function loginCtrl() // funcion control login
    {

        if (isset($_POST["usu"]) && isset($_POST["pass"])) {


            $validar = new araalModel();
            $validar->validarDatos($_POST["usu"], $_POST["pass"]);
       
        

            header("location:/araal/index.php"); }
        else {

            header("Location:index.php?controller=araal&action=login");
        }
    }



    static function login() // funcion loging
    {

        session_start();
        if (isset($_SESSION["usu"]) && isset($_SESSION["pass"])) {



            include_once("views/araal/index.php");
        } else {

            if (isset($_SESSION["error"])) {
                echo '<script>alert("Datos no ingresados correctamente intenta de nuevo")</script>';
                unset($_SESSION["error"]);
            }

            include_once("views/araal/login.php");
        }
    }


    static function logout() // funcion logout
    {
        session_start();
        session_unset();
        session_destroy();


        require_once("views/araal/index.php");
    }
}
