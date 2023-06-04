<?php

class araalModel extends bd
{
  //  protected $bbdd = "id19053020_araal";    // Nombre se la base de datos
  //  protected $username = "id19053020_ahn";   // Usuario 
  //  protected $password = "1hF}DvKo]@&VB8P2";   // Contraseña
    private $conexion;
    private $datos;
    private $datoss;


    public function __construct()   // Construtor para los objetos de la clase araalModel
    {
        
        $this->conexion = new PDO('mysql:host=localhost:3308;dbname=' . $this->bbdd, $this->username, $this->password);

        $this->datos = array();
        $this->datos['valido'] = true;
        $this->datos['errores'] = array();
        $this->datos['valores'] = array();
        $this->datos['valores']['nombre'] = ''; // Nombre trabajador
        $this->datos['valores']['nombreObra'] = ''; // Nombre obra
        $this->datos['valores']['nombreProducto'] = ''; // Nombre del producto 
        $this->datos['valores']['puesto'] = ''; // puesto del trabajador
        $this->datos['valores']['fechaOff'] = ''; // Contrato
        $this->datos['valores']['fecha'] = ''; // Fecha  de movimiento materiales
        $this->datos['valores']['fechaoff'] = ''; // Fecha de salida
        $this->datos['valores']['valor'] = ''; // Valor de las horas
        $this->datos['valores']['tipo'] = ''; // TIpo de imagen
        $this->datos['valores']['data'] = ''; // Imagen
        $this->datos['valores']['id'] = ''; //id trabajador
        $this->datos['valores']['url'] = ''; // url con nombre de la imagen
        $this->datos['valores']['direccion'] = ''; // direccion trabajador
        $this->datos['valores']['ciudad'] = ''; // ciudad trabajador y obra
        $this->datos['valores']['stoc'] = ''; // stock de almacen
        $this->datos['valores']['stock'] = ''; // stock de almacen
        $this->datos['valores']['minimo'] = ''; // minimo stock de almacen
        $this->datos['valores']['precio'] = ''; //precio  de almacen de almacen
        $this->datos['valores']['descripcion'] = ''; // descripcion de productos de almacen
        $this->datos['valores']['trabajador'] = ''; // Trabajador
        $this->datos['valores']['dia'] = ''; // Dia del trabajo
        $this->datos['valores']['horas'] = ''; // Horas del trabajo
        $this->datos['valores']['obra'] = ''; // Obra
        $this->datos['valores']['material'] = ''; // Material
        $this->datos['valores']['numero'] = ''; // Numero de materiales
        $this->datos['valores']['usuario'] = ''; // Usuario de la web
        $this->datos['precio'] = ''; // Precio
        $this->datos['consulta'] = '';
        $this->datos['valores']['email'] = ''; // Email
        $this->datos['valores']['pass'] = ''; // Contraseña
        $this->datos['valores']['rol'] = ''; // Rol
        $this->datos['valores']['titulo'] = ''; // 
        $this->datos['valores']['ciudades'] = ''; // Ciudades
        $this->datos['CCiudad'] = ''; // Ciudad seleccionada
        $this->datos['archivo'] = array();
        $this->datos['valores']['contrato'] = ''; // Contrato
        $this->datos['valores']['dni'] = ''; // Dni del trabajador
        $this->datos['valores']['localidad'] = ''; // Localidad
        $this->datos['valores']['numero'] = ''; // direccion
        $this->datos['valores']['idHoras'] = ''; // Id horas trabajadas
        $this->datos['valores']['horasTotal'] = ''; // Total horas trabajadas
        $this->datos['valores']['nombreObra'] = ''; // Nombre Obra
        $this->datos['valores']['concepto'] = ''; // Concepto del parte
        $this->datos['valores']['rPass'] = ''; // Reply plass

    }

    public function setData($data)  // Damos valores a la variable datos
    {
        if (isset($data['nombreObra'])) {
            $this->datos['valores']['nombreObra'] = $data['nombreObra'];
        }
        if (isset($data['horasTotal'])) {
            $this->datos['valores']['horasTotal'] = $data['horasTotal'];
        }
        if (isset($data['idHoras'])) {
            $this->datos['valores']['idHoras'] = $data['idHoras'];
        }
        if (isset($data['nombre'])) {
            $this->datos['valores']['nombre'] = $data['nombre'];
        }
        if (isset($data['nombreProducto'])) {
            $this->datos['valores']['nombreProducto'] = $data['nombreProducto'];
        }
        if (isset($data['nombreObra'])) {
            $this->datos['valores']['nombreObra'] = $data['nombreObra'];
        }
        if (isset($data['puesto'])) {
            $this->datos['valores']['puesto'] = $data['puesto'];
        }
        if (isset($data['valor'])) {
            $this->datos['valores']['valor'] = $data['valor'];
        }
        if (isset($data['id'])) {
            $this->datos['valores']['id'] = $data['id'];
        }
        if (isset($data['file'])) {
            $this->datos['archivo'] = $data['file'];
        }
        if (isset($data['rPass'])) {
            $this->datos['valores']['rPass'] = $data['rPass'];
        }
        if (isset($data['direccion'])) {
            $this->datos['valores']['direccion'] = $data['direccion'];
        }
        if (isset($data['ciudad'])) {
            $this->datos['valores']['ciudad'] = $data['ciudad'];
        }
        if (isset($data['stock'])) {
            $this->datos['valores']['stock'] = $data['stock'];
        }
        if (isset($data['stoc'])) {
            $this->datos['valores']['stoc'] = $data['stoc'];
        }
        if (isset($data['minimo'])) {
            $this->datos['valores']['minimo'] = $data['minimo'];
        }
        if (isset($data['precio'])) {
            $this->datos['valores']['precio'] = $data['precio'];
        }
        if (isset($data['descripcion'])) {
            $this->datos['valores']['descripcion'] = $data['descripcion'];
        }
        if (isset($data['trabajador'])) {
            $this->datos['valores']['trabajador'] = $data['trabajador'];
        }
        if (isset($data['horas'])) {
            $this->datos['valores']['horas'] = $data['horas'];
        }
        if (isset($data['dia'])) {
            $this->datos['valores']['dia'] = $data['dia'];
        }
        if (isset($data['obra'])) {
            $this->datos['valores']['obra'] = $data['obra'];
        }
        if (isset($data['material'])) {
            $this->datos['valores']['material'] = $data['material'];
        }
        if (isset($data['dni'])) {
            $this->datos['valores']['dni'] = $data['dni'];
        }
        if (isset($data['fecha'])) {
            $this->datos['valores']['fecha'] = $data['fecha'];
        }
        if (isset($data['fechaoff'])) {
            $this->datos['valores']['fechaoff'] = $data['fechaoff'];
        }
        if (isset($data['fechaOff'])) {
            $this->datos['valores']['fechaOff'] = $data['fechaOff'];
        }
        if (isset($data['numero'])) {
            $this->datos['valores']['numero'] = $data['numero'];
        }
        if (isset($data['email'])) {
            $this->datos['valores']['email'] = $data['email'];
        }
        if (isset($data['usuario'])) {
            $this->datos['valores']['usuario'] = $data['usuario'];
        }
        if (isset($data['pass'])) {
            $this->datos['valores']['pass'] = $data['pass'];
        }
        if (isset($data['rol'])) {
            $this->datos['valores']['rol'] = $data['rol'];
        }
        if (isset($data['contrato'])) {
            $this->datos['valores']['contrato'] = $data['contrato'];
        }
        if (isset($data['localidad'])) {
            $this->datos['valores']['localidad'] = $data['localidad'];
        }
        if (isset($data['numero'])) {
            $this->datos['valores']['numero'] = $data['numero'];
        }
        if (isset($data['concepto'])) {
            $this->datos['valores']['concepto'] = $data['concepto'];
        }

        if (isset($data['data'])) {
            $this->datos['valores']['data']  = $data['data'];
        }
    }



    public function getData()
    {
        return $this->datos;
    }



    public function listado() // INDEX
    {


        $consulta = $this->conexion->prepare("SELECT * FROM personal");

        $consulta->execute();
        $this->datos = $consulta->fetchAll();
        $consulta->closeCursor();
        $consulta = null;
    }


    public function listadoPersonal() // Devuelve los trabajadores 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM personal P 
        INNER JOIN direccion U ON P.id=U.id
       INNER JOIN puesto c ON P.puesto = c.idPuesto WHERE trabajando='Si'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoPersonalOff() // Devuelve los trabajadores en la calle 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM personal P 
         INNER JOIN direccion U ON P.id=U.id
         WHERE trabajando='No'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoContrato() // Devuelve los contratos 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM contrato");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }


    public function listadoPersonalAdmin() // Devuelve los trabajadores 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM personal P 
         INNER JOIN direccion U ON P.id=U.id
        INNER JOIN puesto c ON P.puesto = c.idPuesto
        WHERE trabajando='Si' ");

        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }




    public function listadoUsuario() // Devuelve los trabajadores 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM usuarios P 
         INNER JOIN personal U ON P.id=U.id
        INNER JOIN rol c ON  c.id = P.rol ");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoObra() // Devuelve las obras 
    {
        $consulta = $this->conexion->prepare("SELECT * FROM obra P JOIN direccionobra U ON P.idObra=U.id WHERE terminada= 'No'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoObras($id) // Devuelve las obras 
    {
        $consulta = $this->conexion->prepare("SELECT * FROM obra P JOIN direccionobra U ON P.idObra=U.id WHERE terminada= 'No' AND P.idObra='$id'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoObraTerminada() // Devuelve las obras terminadas
    {
        $consulta = $this->conexion->prepare("SELECT * FROM obra P JOIN direccionobra U ON P.idObra=U.id WHERE terminada= 'Si'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoObraTerminadaId($id) // Devuelve las obras terminadas
    {
        $consulta = $this->conexion->prepare("SELECT *, round(coste*1.21,2) as iva, round(((coste*21)/100),2) FROM obra P JOIN direccionobra U ON P.idObra=U.id WHERE terminada= 'Si' AND P.idObra='$id' " );
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function  listadoObraTerminadaImprime() // Devuelve las obras terminadas
    {
        $consulta = $this->conexion->prepare("SELECT * FROM obra P  INNER JOIN direccionobra U ON P.idObra=U.id");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

   

    public function listadoAlmacen() // Devuelve los materiales de almacen 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM almacen");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoAlmacenEdit($id) // Devuelve los materiales de almacen para editarlos
    {

        //   $consulta = $this->conexion->prepare("SELECT * FROM almacen WHERE id= '$id'");
        $consulta = $this->conexion->prepare("SELECT descripcion FROM almacen WHERE id= '$id'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }


    public function listadoAlmacenHistorico() // Devuelve los materiales de almacen historicos
    {

        $consulta = $this->conexion->prepare("SELECT * FROM almacenhistorico a 
        INNER JOIN almacen b ON a.idProducto = b.id 
        INNER JOIN personal c ON a.usuario = c.id ");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoHoras() // Devuelve las horas introducidas por el trabajador ya firmadas
    {


        $consulta = $this->conexion->prepare("SELECT * FROM horas a 
       INNER JOIN personal c ON a.trabajador = c.id 
       INNER JOIN obra o ON a.obra = o.idObra WHERE firmado= 'Si'AND o.terminada='No'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }
    
    public function listadoHorasUser($id) // Devuelve las horas introducidas por el trabajador ya firmadas
    {


        $consulta = $this->conexion->prepare("SELECT * FROM horas a 
       INNER JOIN personal c ON a.trabajador = c.id 
       INNER JOIN usuarios u ON u.id = c.id 
       INNER JOIN obra o ON a.obra = o.idObra WHERE u.usuario='$id'AND firmado= 'Si'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoHorasImprime($id) // Devuelve las horas introducidas por el trabajador ya firmadas
    {


        $consulta = $this->conexion->prepare("SELECT * FROM horas a 
       INNER JOIN personal c ON a.trabajador = c.id 
       INNER JOIN obra o ON a.obra = o.idObra WHERE a.obra= '$id'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoHorasSumaImprime($id) // Devuelve las horas introducidas por el trabajador ya firmadas
    {


        $consulta = $this->conexion->prepare("SELECT sum(horas) as tot,sum(horas)*valor as totValor, valor  FROM horas a 
       INNER JOIN personal c ON a.trabajador = c.id 
       INNER JOIN obra o ON a.obra = o.idObra WHERE a.obra= '$id'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoHorasProvisional() // Devuelve las horas introducidas por el trabajador sin firmar
    {

        $consulta = $this->conexion->prepare("SELECT * FROM horas a 
      INNER JOIN personal c ON a.trabajador = c.id 
      INNER JOIN obra o ON a.obra = o.idObra  WHERE firmado= 'No'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoHorasProvisionalUser($id) // Devuelve las horas introducidas por el trabajador sin firmar
    {

        $consulta = $this->conexion->prepare("SELECT * FROM horas a 
      INNER JOIN personal c ON a.trabajador = c.id 
      INNER JOIN usuarios u ON u.id = c.id 
      INNER JOIN obra o ON a.obra = o.idObra  WHERE u.usuario='$id'AND firmado= 'No' ");
      /* INNER JOIN obra o ON a.obra = o.idObra  WHERE firmado= 'No'"); */
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoHorasCoste($obra) // Devuelve los costes de las horas por obra 
    {

        $consulta = $this->conexion->prepare("SELECT SUM(coste) FROM horas WHERE idObra= '$obra'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoSumaMateriale($obra) // Devuelve la suma de materiales usados 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM horas WHERE idObra= '$obra'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function obra() // Devuelve las obras 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM obra P JOIN direccionobra U ON P.idObra=U.id");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }


    public function listadoMateriales() // Devuelve los materiales usados en las obras 
    {

        //$consulta = $this->conexion->prepare("SELECT *,SUM(numero)*precio tot FROM materiales a 
        $consulta = $this->conexion->prepare("SELECT * FROM materiales a 
        INNER JOIN almacen b ON a.material = b.id 
        INNER JOIN personal c ON a.usuario = c.id 
      /*  INNER JOIN personaloff d ON a.usuario = d.id*/
        INNER JOIN obra o ON a.obra = o.idObra WHERE o.terminada='No' ");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoMaterialesImprime($id) // Devuelve los materiales usados en las obras 
    {

        $consulta = $this->conexion->prepare("SELECT SUM(numero) numeros,nombre ,nombreProducto,precio,SUM(numero)*precio AS tot ,fecha,costeMaterial FROM materiales a 
        INNER JOIN almacen b ON a.material = b.id 
        INNER JOIN personal c ON a.usuario = c.id 
      /*  INNER JOIN personaloff d ON a.usuario = d.id*/
        INNER JOIN obra o ON a.obra = o.idObra  WHERE a.obra= '$id' GROUP BY nombreProducto");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }
    public function listadoMaterialesImprimeD($id) // Devuelve los materiales usados en las obras 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM materiales a 
        INNER JOIN almacen b ON a.material = b.id 
        INNER JOIN personal c ON a.usuario = c.id 
      /*  INNER JOIN personaloff d ON a.usuario = d.id*/
        INNER JOIN obra o ON a.obra = o.idObra  WHERE a.obra= '$id'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoRol() // Devuelve los roles 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM rol");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function listadoPuesto() // Devuelve los puestos 
    {

        $consulta = $this->conexion->prepare("SELECT * FROM puesto");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function coste($trabajador) // Devuelve los costes del personal
    {

        $sentencia = $this->conexion->prepare("SELECT valor as total FROM personal WHERE id= '$trabajador'");
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        $totalUsuarios = $resultado['total'];
        return $totalUsuarios;
    }




    public function addHorasProvisional()   //Funcion añadir horas a obra sin firmar
    {
        // validamos para comprobar si ha habido errores
        $this->validarHoras();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {

            $firmado = 'No';
            $id = $this->generar_uuid();
            $horas = $this->datos['valores']['horas'];
            $obra = $this->datos['valores']['obra'];
            $trabajador = $this->datos['valores']['trabajador'];
            $costeH = $this->coste($trabajador);
            $costeT = $costeH * $horas;
            // Añade horas a la tabla de horas provisional horasp
            $consulta = $this->conexion->prepare("INSERT INTO horas (trabajador,  dia,  horas, obra, idHoras, concepto, firmado) VALUES ( :t, :d, :h, :o, :id, :co, :fi)");
            $consulta->bindParam(':fi', $firmado);
            $consulta->bindParam(':t', $trabajador);
            $consulta->bindParam(':d', $this->datos['valores']['dia']);
            $consulta->bindParam(':co', $this->datos['valores']['concepto']);
            $consulta->bindParam(':h', $horas);
            $consulta->bindParam(':o', $obra);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }

    public function editHoras($id)
    {
    }


    public function firmaHoras()   // Funcion añadir horas a obra firmadas
    {

        $id = $this->datos['valores']['idHoras'];
        $idObra = $this->datos['valores']['obra'];
        $horas = $this->datos['valores']['horas'];
        $obra = $this->datos['valores']['nombreObra'];
        $trabajador = $this->datos['valores']['nombre'];
        $costeH = $this->coste($trabajador);
        $costeT = $costeH * $horas;
        $consulta = $this->conexion->prepare("UPDATE obra SET horasTotal=horasTotal+'$horas' WHERE idObra= '$obra'");
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = $this->conexion->prepare("UPDATE obra SET coste=coste+'$costeT' WHERE idObra= '$obra'");
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = $this->conexion->prepare("UPDATE horas SET firmado='Si' WHERE idHoras='$id'");
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;
       
    }



    public function addHoras()    // Funcion añadir horas a obra firmadas
    {
        // validamos para comprobar si ha habido errores
        $this->validarHoras();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {

            $id = $this->generar_uuid();
            $horas = $this->datos['valores']['horas'];
            $obra = $this->datos['valores']['nombreObra'];
            $trabajador = $this->datos['valores']['nombre'];
            $costeH = $this->coste($trabajador);
            $costeT = $costeH * $horas;
            $consulta = $this->conexion->prepare("UPDATE obra SET horasTotal=horasTotal+'$horas' WHERE idObra= '$obra'");
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = $this->conexion->prepare("UPDATE obra SET coste=coste+'$costeT' WHERE idObra= '$obra'");
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = $this->conexion->prepare("INSERT INTO horas (trabajador,  dia,  horas, obra, coste, id,concepto) VALUES ( :t, :d, :h, :o, :c, :id, :co)");
            $consulta->bindParam(':t', $trabajador);
            $consulta->bindParam(':d', $this->datos['valores']['dia']);
            $consulta->bindParam(':co', $this->datos['valores']['concepto']);
            $consulta->bindParam(':h', $horas);
            $consulta->bindParam(':o', $obra);
            $consulta->bindParam(':c', $costeT);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }


    public function addAlmacen()   //Funcion añadir almacen se añaden minimo y precio en Obra
    {
        // validamos para comprobar si ha habido errores
        $this->validarAlmacen();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {

            $stockSumar = $this->datos['valores']['stoc'];
            $nombreProducto = $this->datos['valores']['nombre'];
            $id = $this->datos['valores']['trabajador'];
            $stockSumarInt = (int) $stockSumar;
            $stockR =/* $stockActualInt +*/ $stockSumar;
            $accion = 'Introduce';
            $fecha = date('Y-m-d');
            $descripcionProducto = $this->datos['valores']['descripcion'];

            $consulta = $this->conexion->prepare("UPDATE almacen SET stock=stock+'$stockR' WHERE id= '$nombreProducto'");  // Actualiza el inventario del almacen
            $consulta->execute();
            $consulta = $this->conexion->prepare("INSERT INTO almacenhistorico (fecha, stockHistorico, usuario, idProducto, accion ) VALUES (:f, :s, :u, :id, :a)");
            $consulta->bindParam(':id', $nombreProducto);
            $consulta->bindParam(':s', $this->datos['valores']['stoc']);
            $consulta->bindParam(':a', $accion);
            $consulta->bindParam(':f', $fecha);
            $consulta->bindParam(':u', $id);

            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }

    public function precio($material) // Saca el precio del material por ID
    {

        $sentencia = $this->conexion->prepare("SELECT precio as total FROM almacen WHERE id= '$material'");
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        $totalUsuarios = $resultado['total'];
        return $totalUsuarios;
    }

    public function stock($material) // Saca el stock del material por ID
    {

        $sentencia = $this->conexion->prepare("SELECT stock as total FROM almacen WHERE id= '$material'");
        $sentencia->execute();
        $resultado = $sentencia->fetch();
        $totalUsuarios = $resultado['total'];
        return $totalUsuarios;
    }



    public function deleteMaterial($id, $coste, $idObra, $numero, $idProducto, $user)   //Funcion borrar material de la tabla materiales
    {
        $consulta = $this->conexion->prepare("UPDATE obra SET coste=coste-'$coste' WHERE idObra= '$idObra'");
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = $this->conexion->prepare("DELETE FROM materiales WHERE idTablaMater='$id'");
        $consulta->execute();
        $consulta->closeCursor();

        $consulta = $this->conexion->prepare("UPDATE almacen SET stock= stock + '$numero' WHERE id = '$idProducto'");
        $consulta->execute();
        $consulta->closeCursor();

        $accion = 'Introduce';
        $fecha = date('Y-m-d');
        $trabajador = '8e8be5f1-9adf-45f4-beda-01c1ed0e85a6';
        $consulta = $this->conexion->prepare("INSERT INTO almacenhistorico (fecha, stockHistorico, usuario, idProducto, accion ) VALUES (:f, :s, :u, :id, :a)");
        $consulta->bindParam(':id', $idProducto);
        $consulta->bindParam(':s', $numero);
        $consulta->bindParam(':a', $accion);
        $consulta->bindParam(':f', $fecha);
        $consulta->bindParam(':u', $user);

        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;
    }

    public function addFactura($id)   //Funcion añadir material a la tabla materiales
    {
      
        $consulta = $this->conexion->prepare("SELECT * FROM obra WHERE idObra = '$id' ");
        $consulta->execute();
        $r = $consulta->fetch(PDO::FETCH_NUM);
        $factura = $r[7];

        if ($factura == 0){
            $consulta = $this->conexion->prepare("SELECT factura FROM obra ORDER BY factura DESC LIMIT 1 ");
        $consulta->execute();
        $rR = $consulta->fetch(PDO::FETCH_NUM);
        $factur = $rR[0];

    $consulta = $this->conexion->prepare("UPDATE obra SET factura = $factur + 1 WHERE idObra = '$id'");
            $consulta->execute();
        }
    }

    public function addMateriales()   //Funcion añadir material a la tabla materiales
    {

        // validamos para comprobar si ha habido errores
        $this->validarMateriales();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {
            $obra = $this->datos['valores']['obra'];
            $nombreProducto = $this->datos['valores']['nombre'];
            $numero = $this->datos['valores']['numero'];
            $dato = $this->precio($nombreProducto);
            $precio = $dato;
            $coste = $precio * $numero;

            $consulta = $this->conexion->prepare("UPDATE obra SET coste=coste+'$coste' WHERE idObra= '$obra'");
            $consulta->execute();
            $consulta->closeCursor();
            $id = $this->generar_uuid();

            $consulta = $this->conexion->prepare("INSERT INTO materiales (material,  obra,  idTablaMater, numero, fecha, costeMaterial, usuario) VALUES (:m, :o, :id, :n, :f, :c, :t)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':o', $obra);
            $consulta->bindParam(':t', $this->datos['valores']['trabajador']);
            $consulta->bindParam(':n', $this->datos['valores']['numero']);
            $consulta->bindParam(':f', $this->datos['valores']['fecha']);
            $consulta->bindParam(':m', $this->datos['valores']['nombre']);
            $consulta->bindParam(':c', $coste);
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;

            $consulta = $this->conexion->prepare("UPDATE almacen SET stock= stock - '$numero' WHERE id = '$nombreProducto'");
            $consulta->execute();
            $accion = 'Saca';
            $fecha = date('Y-m-d');
            $descripcionProducto = $this->datos['valores']['descripcion'];

            $consulta = $this->conexion->prepare("INSERT INTO almacenhistorico (fecha, stockHistorico, usuario, idProducto, accion ) VALUES (:f, :s, :u, :id, :a)");
            $consulta->bindParam(':id', $this->datos['valores']['nombre']);
            $consulta->bindParam(':s', $this->datos['valores']['numero']);
            $consulta->bindParam(':a', $accion);
            $consulta->bindParam(':f', $fecha);
            $fecha = date('Y-m-d');
            $consulta->bindParam(':u', $this->datos['valores']['trabajador']);

            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }


    public function addAlmacenAdmin()   // Funcion añadir materiales a almacen administrador
    {
        // validamos para comprobar si ha habido errores
        $this->validarAlmacenAdmin();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {

            $usuario = $this->datos['valores']['trabajador'];
            $accion = 'Introduce';
            $id = $this->generar_uuid();
            $fecha = date('Y-m-d');
            $consulta = $this->conexion->prepare("INSERT INTO almacen (nombreProducto, descripcion, stock, minimo, precio, id ) VALUES (:n, :d, :s, :m, :p, :id)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':n', $this->datos['valores']['nombre']);
            $consulta->bindParam(':d', $this->datos['valores']['descripcion']);
            $consulta->bindParam(':s', $this->datos['valores']['stock']);
            $consulta->bindParam(':m', $this->datos['valores']['minimo']);
            $consulta->bindParam(':p', $this->datos['valores']['precio']);
            $consulta->execute();

            $consulta = $this->conexion->prepare("INSERT INTO almacenhistorico (fecha, stockHistorico, usuario, idProducto, accion ) VALUES (:f, :s, :u, :id, :a)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':s', $this->datos['valores']['stock']);
            $consulta->bindParam(':a', $accion);
            $consulta->bindParam(':f', $fecha);
            $consulta->bindParam(':u', $usuario);
            
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }

    public function editAlmacenAdmin()   // Funcion editar materiales a almacen administrador
    {
        // validamos para comprobar si ha habido errores
        $this->validarAlmacenAdmin();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {
            $nombre = $this->datos['valores']['nombre'];
            $id =  $this->datos['valores']['id'];
            $descripcion =  $this->datos['valores']['descripcion'];
            $stock = $this->datos['valores']['stock'];
            $minimo = $this->datos['valores']['minimo'];
            $precio = $this->datos['valores']['precio'];

            $consulta = $this->conexion->prepare("UPDATE almacen SET nombreProducto='$nombre', descripcion='$descripcion', stock= $stock, minimo= $minimo, precio= $precio WHERE id= '$id'");

            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }
    public function addObra()   // Funcion añadir nueva obra
    {
        // validamos para comprobar si ha habido errores
        $this->validar();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {   ////////si lo ponemos en true se graba la sentencia
            $fecha = date('Y-m-d');
            $estado = 'No';
            $factura = '0';
            $horas = '0';
            $coste = '0';
            $fechaOff = '0000-00-00';
            $id =$this->generar_uuid();
            $consulta = $this->conexion->prepare("INSERT INTO obra (coste,nombreObra,horasTotal, idObra, terminada, fechaini, factura, fechaoff) VALUES (:c ,:n ,:h, :id,:es,:fe,:fa,:fo)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':es', $estado);
            $consulta->bindParam(':fe', $fecha);
            $consulta->bindParam(':fa', $factura);
             $consulta->bindParam(':h', $horas);
              $consulta->bindParam(':c', $coste);
              $consulta->bindParam(':fo', $fechaOff);
            $consulta->bindParam(':n', $this->datos['valores']['nombre']);
            $consulta->execute();

            $consulta = $this->conexion->prepare("INSERT INTO direccionobra ( id, localidad, ciudad, calle , numero) VALUES (:id, :d ,:c, :l, :n)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':l', $this->datos['valores']['direccion']);
            $consulta->bindParam(':c', $this->datos['valores']['ciudad']);
            $consulta->bindParam(':d', $this->datos['valores']['localidad']);
            $consulta->bindParam(':n', $this->datos['valores']['numero']);
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }



    private function validar()  // Validamos y lanzamos error si esta vacio
    {
        $this->errores = array();

        $nombre = $this->datos['valores']['nombre'];

        if (empty($this->datos['valores']['direccion'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['direccion'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['ciudad'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['ciudad'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['localidad'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['localidad'] = 'El campo no puede estar vacío';
        }
        if (preg_match('/[1-9]{1}/', $this->datos['valores']['numero']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['numero'] = 'El campo no puede estar vacío y tiene que ser un numero';
        }
        if (($this->datos['valores']['numero']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['numero'] = 'El campo tiene que ser un numero positivo';
        }
        if (isset($this->datos['archivo']['error']) && $this->datos['archivo']['error'] != 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['file'] = 'El archivo no es correcto.';
        }
        if (empty($nombre)) {
            $this->datos['valido'] = false;
            $this->datos['errores']['dni'] = 'El nombre no puede estar vacío.';
        } else {
            $consulta = $this->conexion->prepare("SELECT * FROM obra WHERE nombreObra = :nombre");
            $consulta->execute(array(":nombre" => $nombre));
            $cantidad_resultado = $consulta->rowCount();
            $consulta->closeCursor();
            $consulta = null;
            if ($cantidad_resultado == 1) {
                $this->datos['valido'] = false;
                $this->datos['errores']['nombre'] = 'La obra ya existe.';
            }
        }


    }



    private function validarAlmacen()  // Validamos y lanzamos error si esta vacio
    {
        $this->errores = array();


        if (preg_match('/[1-9]{1}/', $this->datos['valores']['stoc']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['stoc'] = 'El campo tiene que ser número y no puede estar vacío.';
        }
        if (($this->datos['valores']['stoc']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['stoc'] = 'El campo tiene que ser un numero positivo';
        }

        if (empty($this->datos['valores']['nombre'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['nombre'] = 'El campo no puede estar vacío';
        }
    }

    private function validarMateriales()  // Validamos y lanzamos error si esta vacio
    {

        $this->errores = array();

        $nombreProducto = $this->datos['valores']['nombre'];
        $numero = $this->datos['valores']['numero'];

        if (empty($this->datos['valores']['obra'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['obra'] = 'El campo no puede estar vacío';
        }
        if (preg_match('/[1-9]{1}/', $this->datos['valores']['numero']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['numero'] = 'El campo no puede estar vacío y tiene que ser un numero';
        }
        if (($this->datos['valores']['numero']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['numero'] = 'El campo tiene que ser un numero positivo';
        }

        if (empty($this->datos['valores']['fecha'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['fecha'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['nombre'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['nombre'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['trabajador'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['trabajador'] = 'El campo no puede estar vacío';
        }

        if (($this->stock($nombreProducto)) - ($numero) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['numero'] = 'No existe suficiente stock  ¡Vete y compra!';
        }
    }


    private function validarAlmacenAdmin()  // Validamos y lanzamos error si esta vacio
    {
        $this->errores = array();
        $nombre = $this->datos['valores']['nombre'];

        if (preg_match('/[1-9]{1}/', $this->datos['valores']['stock']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['stock'] = 'El campo tiene que ser número y no puede estar vacío.';
        }
        if (($this->datos['valores']['stock']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['stock'] = 'El campo tiene que ser un numero positivo';
        }

        if (preg_match('/[1-9]{1}/', $this->datos['valores']['minimo']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['minimo'] = 'El campo tiene que ser número y no puede estar vacío.';
        }
        if (($this->datos['valores']['minimo']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['minimo'] = 'El campo tiene que ser un numero positivo';
        }

        if (preg_match('/[1-9]{1}/', $this->datos['valores']['precio']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['precio'] = 'El campo tiene que ser número y no puede estar vacío.';
        }
        if (($this->datos['valores']['precio']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['precio'] = 'El campo tiene que ser un numero positivo';
        }
        if (empty($this->datos['valores']['descripcion'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['descripcion'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['trabajador'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['trabajador'] = 'El campo no puede estar vacío';
        }
        if (empty($nombre)) {
            $this->datos['valido'] = false;
            $this->datos['errores']['nombre'] = 'El nombre no puede estar vacío.';
        }
    }

    private function validarHoras()  // Validamos y lanzamos error si esta vacio
    {
        $this->errores = array();

        if (empty($this->datos['valores']['trabajador'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['trabajador'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['dia'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['dia'] = 'El campo no puede estar vacío';
        }

        if (preg_match('/[1-9]{1}/', $this->datos['valores']['horas']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['horas'] = 'El campo tiene que ser número y no puede estar vacío.';
        }

        if (($this->datos['valores']['horas']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['horas'] = 'El campo tiene que ser un numero positivo';
        }
        if (empty($this->datos['valores']['obra'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['obra'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['concepto'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['concepto'] = 'El campo no puede estar vacío';
        }
    }




    public function addUsuario()   //Funcion añadir usuraio
    {
        // validamos para comprobar si ha habido errores
        $this->validarUsuario();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {

            $id = $this->generar_uuid();
            $consulta = $this->conexion->prepare("INSERT INTO usuarios (usuario,  pass, id) VALUES (:n, :p,:id)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':n', $this->datos['valores']['nombre']);
            $consulta->bindParam(':p', $this->datos['valores']['pass']);
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }


    public function addPersonal()   //Funcion añadir personal
    {
        // validamos para comprobar si ha habido errores
        $this->validarPersonal();
        // si no ha habido errores, se ejecuta la consulta

        if ($this->datos['valido'] == true) {


            if (is_uploaded_file($this->datos['archivo']['tmp_name'])) {
                // Generamos una URL
                $this->datos['valores']['url'] = '/img/' . $this->generar_nombre();
                // Copiamos el archivo a nuestro servidor
                $fp = fopen($this->datos['archivo']['tmp_name'], "rb");
                $this->datos['valores']['data'] = fread($fp, $this->datos['archivo']['size']);
                move_uploaded_file($this->datos['archivo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/araal' . $this->datos['valores']['url']);
            }

            $fecha = date('Y-m-d');
            $trabajando = 'Si';
            $id = $this->generar_uuid();
            $consulta = $this->conexion->prepare("INSERT INTO personal (nombre,  puesto,  fechaincor, valor, url, id, fechaoff, dni, trabajando, contrato) VALUES (:n, :p, :f, :v, :u, :id, :fo, :d, :t, :con)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':n', $this->datos['valores']['nombre']);
            $consulta->bindParam(':d', $this->datos['valores']['dni']);
            $consulta->bindParam(':p', $this->datos['valores']['puesto']);
            $consulta->bindParam(':f', $this->datos['valores']['fecha']);
            $consulta->bindParam(':v', $this->datos['valores']['valor']);
              $consulta->bindParam(':con', $this->datos['valores']['contrato']);
            $consulta->bindParam(':fo', $fecha);
            $consulta->bindParam(':u', $this->datos['valores']['url']);
            $consulta->bindParam(':t', $trabajando);
            $consulta->execute();

            $consulta = $this->conexion->prepare("INSERT INTO usuarios (usuario,  pass, id, rol) VALUES (:n, :p,:id, :r)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':n', $this->datos['valores']['usuario']);
            $consulta->bindParam(':p', $this->datos['valores']['pass']);
            $consulta->bindParam(':r', $this->datos['valores']['rol']);
            $consulta->execute();

            $consulta = $this->conexion->prepare("INSERT INTO direccion ( id, localidad, ciudad, calle , numero) VALUES (:id, :d ,:c, :l, :n)");
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':l', $this->datos['valores']['direccion']);
            $consulta->bindParam(':c', $this->datos['valores']['ciudad']);
            $consulta->bindParam(':d', $this->datos['valores']['localidad']);
            $consulta->bindParam(':n', $this->datos['valores']['numero']);
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }


    private function validarDni($dni) // Metodo para validar DNI
    {


        $cif = strtoupper($dni);
        for ($i = 0; $i < 9; $i++) {
            $num[$i] = substr($cif, $i, 1);
        }
        // Si no tiene un formato valido devuelve error
        if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            return false;
        }
        // Comprobacion de NIFs estandar
        if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1)) {
                return true;
            } else {
                return false;
            }
        }
        // Algoritmo para comprobacion de codigos tipo CIF
        $suma = $num[2] + $num[4] + $num[6];
        for ($i = 1; $i < 8; $i += 2) {
            $suma += (int)substr((2 * $num[$i]), 0, 1) + (int)substr((2 * $num[$i]), 1, 1);
        }
        $n = 10 - substr($suma, strlen($suma) - 1, 1);
        // Comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
        if (preg_match('/^[KLM]{1}/', $cif)) {
            if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1)) {
                return true;
            } else {
                return false;
            }
        }
        // Comprobacion de CIFs
        if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif)) {
            if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1)) {
                return true;
            } else {
                return false;
            }
        }
        // Comprobacion de NIEs
        // T
        if (preg_match('/^[T]{1}/', $cif)) {
            if ($num[8] == preg_match('/^[T]{1}[A-Z0-9]{8}$/', $cif)) {
                return true;
            } else {
                return false;
            }
        }
        // XYZ
        if (preg_match('/^[XYZ]{1}/', $cif)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X', 'Y', 'Z'), array('0', '1', '2'), $cif), 0, 8) % 23, 1)) {
                return true;
            } else {
                return false;
            }
        }
        // Si todavía no se ha verificado devuelve error
        return false;
    }


    private function validarPersonal()  // Validamos y lanzamos error si esta vacio
    {
        $this->errores = array();

        if (empty($this->datos['valores']['nombre'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['nombre'] = 'El campo no puede estar vacío.';
        }

        $dni = $this->datos['valores']['dni'];
        $vdni = $this->validarDni($dni);

        if ($vdni == false) {
            $this->datos['valido'] = false;
            $this->datos['errores']['dni'] = 'El campo no puede estar vacío o no es correcto.';
        } else {

            $dn = $this->datos['valores']['dni'];
            $consulta = $this->conexion->prepare("SELECT * FROM personal WHERE dni = :dni");
            $consulta->execute(array(":dni" => $dn));
            $cantidad_resultado = $consulta->rowCount();
            $consulta->closeCursor();
            $consulta = null;
            if ($cantidad_resultado == 1) {
                $this->datos['valido'] = false;
                $this->datos['errores']['dni'] = 'El DNI ya existe.';
            }
        }
   /*     if (empty($this->datos['valores']['puesto'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['puesto'] = 'El campo no puede estar vacío.';
        }*/

        if (empty($this->datos['valores']['fecha'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['fecha'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['contrato'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['contrato'] = 'El campo no puede estar vacío';
        }
        if (preg_match('/[1-9]{1}/', $this->datos['valores']['valor']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['valor'] = 'El campo tiene que ser número y no puede estar vacío.';
        }
        if (($this->datos['valores']['valor']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['valor'] = 'El campo tiene que ser un numero positivo';
        }
        if (isset($this->datos['archivo']['error']) && $this->datos['archivo']['error'] != 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['file'] = 'El archivo no es correcto.';
        }
        if (empty($this->datos['valores']['usuario'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['usuario'] = 'El campo no puede estar vacío.';
        } else {

            $usuario = $this->datos['valores']['usuario'];
            $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE usuario = :USU");
            $consulta->execute(array(":USU" => $usuario));
            $cantidad_resultado = $consulta->rowCount();
            $consulta->closeCursor();
            $consulta = null;
            if ($cantidad_resultado == 1) {
                $this->datos['valido'] = false;
                $this->datos['errores']['usuario'] = 'El usuario ya existe.';
            }
        }
        if (empty($this->datos['valores']['pass'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['pass'] = 'El campo no puede estar vacío.';
        }
      /*  if (empty($this->datos['valores']['rol'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['rol'] = 'El campo no puede estar vacío.';
        }*/

        if (empty($this->datos['valores']['direccion'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['direccion'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['ciudad'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['ciudad'] = 'El campo no puede estar vacío';
        }
        if (empty($this->datos['valores']['localidad'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['localidad'] = 'El campo no puede estar vacío';
        }
        if (preg_match('/[1-9]{1}/', $this->datos['valores']['numero']) == 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['numero'] = 'El campo no puede estar vacío y tiene que ser un numero';
        }
        if (($this->datos['valores']['numero']) < 0) {
            $this->datos['valido'] = false;
            $this->datos['errores']['numero'] = 'El campo tiene que ser un numero positivo';
        }
        if (empty($this->datos['valores']['rPass'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['rPass'] = 'El campo no puede estar vacío';
        }
        if (($this->datos['valores']['rPass']) != ($this->datos['valores']['pass'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['pass'] = 'Las contraseñas tienen que ser iguales';
        }
    }

    private function validarUsuario()  // Validamos y lanzamos error si esta vacio
    {
        $this->errores = array();

        if (empty($this->datos['valores']['nombre'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['nombre'] = 'El campo no puede estar vacío.';
        }
        if (empty($this->datos['valores']['pass'])) {
            $this->datos['valido'] = false;
            $this->datos['errores']['pass'] = 'El campo no puede estar vacío.';
        }
    }


    public function borrar($id, $nombre, $valor, $fechaincor, $url, $puesto, $fechaOff, $dni) // Borra los trabajadores
    {

        $fechaOff = date('Y-m-d'); // poner fecha hoy automatica
        /* $consulta = $this->conexion->prepare("INSERT INTO personaloff (nombre,  puesto,  fechaincor, valor, id, fechaoff, url, dni) VALUES (:n, :p, :f, :v, :id, :fo, :u, :d)");
        $consulta->bindParam(':n', $nombre);
        $consulta->bindParam(':v', $valor);
        $consulta->bindParam(':f', $fechaincor);
        $consulta->bindParam(':p', $puesto);
        $consulta->bindParam(':u', $url);
        $consulta->bindParam(':fo', $fechaOff);
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':d', $dni);*/
        $consulta = $this->conexion->prepare("UPDATE personal SET fechaoff='$fechaOff', trabajando='No' WHERE id='$id'");
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;
        /*
        $consulta = $this->conexion->prepare("DELETE FROM personal WHERE id=:id"); // Borra el trabajador
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;
*/
        $consulta = $this->conexion->prepare("DELETE FROM usuarios WHERE id=:id"); // Borra el usuario web
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;
    }

    public function borrarUsuario($id) // Borra el usuario a traves de la id de la tabla usuarios
    {
        $consulta = $this->conexion->prepare("DELETE FROM usuarios WHERE id=:id");
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;
    }

    public function borrarObra($id, $nombre,  $coste, $horas) // Borra las obras a traves de la id de la tabla obras
    {
        $fechaOff = date('Y-m-d');
        $estado = 'Si';
        $consulta = $this->conexion->prepare("UPDATE obra SET fechaoff='$fechaOff', terminada='$estado' WHERE idObra='$id'"); // Add obra terminada
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;

        /*     $consulta = $this->conexion->prepare("DELETE FROM obra WHERE idObra=:id");
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;*/
    }

    public function borrarAlmacen($id) // Borra los articulos de almacen a traves de la id de la tabla almacen
    {
        $consulta = $this->conexion->prepare("DELETE FROM almacen WHERE id=:id");
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;
    }

    public function borrarHoras($id) // Borra las horas a traves de la id de la tabla horas
    {
        $consulta = $this->conexion->prepare("DELETE FROM horas WHERE idHoras=:id");
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $consulta->closeCursor();
        $consulta = null;
    }

    private function generar_nombre() // genera el nombre de los archivos
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $strength = 16;
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        $random_string .= ".jpeg";

        return $random_string;
    }


    public  function generar_uuid() // Genera ID aleatoriamente
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }


    public function login() // Login
    {

        $sentencia = "SELECT * FROM usuarios WHERE email = '" . $this->datos['valores']['email'] . "'";
        if (!empty($this->datos['valores']['pass'])) {
            $sentencia .= " AND pass = '" . $this->datos['valores']['pass'] . "'";
        }
        $consulta = $this->conexion->prepare($sentencia);
        $consulta->execute();
        $this->datos['consulta'] = $consulta->fetch();
        $consulta->closeCursor();
        $consulta = null;
    }


    public function validarDatos($usu, $pass) // Valida los datos de login
    {
        $cantidad_resultado = null;
        $ok = 1;
        $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE usuario = :USU AND pass = :PASS");
        $consulta->execute(array(":USU" => $usu, ":PASS" => $pass));

        $r = $consulta->fetch(PDO::FETCH_NUM);
        $rol = $r[3];
        $cantidad_resultado = $consulta->rowCount();
        $consulta->closeCursor();
        $consulta = null;

        session_start();

        if ($cantidad_resultado == 1) {
            $_SESSION["usu"] = $usu;
            $_SESSION["pass"] = $pass;
            $_SESSION["rol"] = $rol;
        } else {
            $_SESSION["error"] = "ERROR";
        }
    }

    public function validarDato() // Valida el usuario
    {
        $resultado = null;
        $cantidad_resultado = null;

        $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE usuario = :USU AND pass = :PASS");
        $consulta->execute(array(":USU" => $_SESSION["usu"], ":PASS" => $_SESSION["pass"]));
        $consulta->closeCursor();
        $cantidad_resultado = $consulta->rowCount();
        $consulta = null;

        if ($cantidad_resultado == 0) {

            header("Location: /araal/index.php?controller=araal&action=logout");
        }
    }

    public function validarDatoAdmin() // Valida el usuario si es admin
    {

        $resultado = null;
        $cantidad_resultado = null;
        $usuario = $_SESSION["usu"];
        $usuarioI = $this->usuarioUs($usuario);
        $usuarioId = $usuarioI["id"];


        $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE usuario = :USU AND pass = :PASS");
        $consulta->execute(array(":USU" => $_SESSION["usu"], ":PASS" => $_SESSION["pass"]));
        $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE id= '$usuarioId' and rol='Administrador'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $cantidad_resultado = $consulta->rowCount();
        $consulta = null;

        if ($cantidad_resultado == 0) {

            header("Location: /araal/index.php?controller=araal&action=logout");
        }
    }

    public function usuarios() // devuelve los datos de usuario a traves de la id trabajador
    {

        $usuario = $_SESSION["usu"];
        $usuarioI = $this->usuarioUs($usuario);
        $usuarioId = $usuarioI["id"];

        $consulta = $this->conexion->prepare("SELECT * FROM personal WHERE id= '$usuarioId'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }


    public function usuariosRol() // Desvulelve el rol a traves de la id del trabajador
    {

        $usuario = $_SESSION["usu"];
        $usuarioI = $this->usuarioUs($usuario);
        $usuarioId = $usuarioI["id"];
        $consulta = $this->conexion->prepare("SELECT rol FROM usuarios WHERE id= '$usuarioId'");
        $consulta->execute();
        $resultado = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();

        return $resultado;
    }


    public function usuarioId($id) // Devuelve el usurio a traves de la id
    {

        $sentencia = $this->conexion->prepare("SELECT nombre FROM personal WHERE id= '$id'");
        $sentencia->execute();
        $resultado = $sentencia->fetch();

        return $resultado;
    }


    public function usuarioUs($usuario) // Devuelve la id a traves del usuario 
    {

        $sentencia = $this->conexion->prepare("SELECT id FROM usuarios WHERE usuario= '$usuario'");
        $sentencia->execute();
        $resultado = $sentencia->fetch();

        return $resultado;
    }


    public function productos() // Devuelve el usutario los prodcutos a traves de la id 
    {

        $usuario = $_SESSION["usu"];
        $usuarioI = $this->usuarioUs($usuario);
        $usuarioId = $usuarioI["id"];

        $consulta = $this->conexion->prepare("SELECT almacen FROM nombreProducto WHERE id= '$usuarioId'");
        $consulta->execute();
        $this->datos['datos'] = $consulta->fetchAll(); // Asignamos los datos de la consulta a la variable
        $consulta->closeCursor();
        $consulta = null;
    }

    public function productosId($id) // Devuelve los prodcutos a traves de la id
    {

        $sentencia = $this->conexion->prepare("SELECT nombreProducto FROM almacen WHERE id= '$id'");
        $sentencia->execute();
        $resultado = $sentencia->fetch();

        return $resultado;
    }


    public function productosUs($nombre) // Devuelve los prodcutos a traves del nombre 
    {

        $sentencia = $this->conexion->prepare("SELECT id FROM almacen WHERE nombreProducto= '$nombre'");
        $sentencia->execute();
        $resultado = $sentencia->fetch();

        return $resultado;
    }
}
