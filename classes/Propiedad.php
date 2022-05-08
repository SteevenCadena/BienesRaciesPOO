<?php

namespace App;

class Propiedad {
    
    //Base de Datos
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    // Errores
    protected static $errores= [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    //Definir la conexion a la bd
    public static function setDB( $database ) {
        self::$db = $database;
    }

    public function __construct( $args = [] ){
        $this->id              = $args['id'] ?? '';
        $this->titulo          = $args['titulo'] ?? '';
        $this->precio          = $args['precio'] ?? '';
        $this->imagen          = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion     = $args['descripcion'] ?? '';
        $this->habitaciones    = $args['habitaciones'] ?? '';
        $this->wc              = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado          = date('Y/m/d');
        $this->vendedorId      = $args['vendedorId'] ?? '';
    }

    public function guardar() {
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        // debuguear( $atributos );
        //Insertar en la base de datos
        // $query = "INSERT INTO propiedades (titulo, precio, descripcion, imagen, habitaciones, wc, estacionamiento, creado , vendedorId) VALUES ('$this->titulo','$this->precio', '$this->descripcion','$this->imagen','$this->habitaciones','$this->wc','$this->estacionamiento', '$this->creado','$this->vendedorId')";

        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys( $atributos) );
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values( $atributos) );
        $query .= " ') ;";
        
        // debuguear( $query );

        $restultado = self::$db->query( $query );
        // debuguear($restultado);
    }

    //Identifica y une los atributos de la BD
    public function atributos() {
        $atributos = [];
        
        foreach( self::$columnasDB as $columna ) {
            if( $columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
 
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach( $atributos as $key => $value ) {
            $sanitizado[ $key ] = self::$db->escape_string( $value );
        }

        return $sanitizado;

    }

    // Validación
    public static function getErrores() {
        return self::$errores;
    }
    

    public function validar() {
        if( !$this->titulo ) {
            self::$errores[] = 'Debes añadir un título';
        }
        if( !$this->precio ) {
            $errores[] = 'El precio es obligdatorio';
        }
        if(strlen( $this->descripcion ) < 50) {
            $errores[] = 'La desdescripcion es obligdatorio y debe tener al menos 50 caracteres';
        }
        
        if( !$this->habitaciones ) {
            $errores[] = 'El numero de habitaciones es obligdatorio';
        }
        if( !$this->wc ) {
            $errores[] = 'El numero de baños es obligdatorio';
        }
        if( !$this->estacionamiento ) {
            $errores[] = 'El numero de esrtacionamientos es obligdatorio';
        }
        if( !$this->vendedorId ) {
            $errores[] = 'Elije un vendedor';
        }
        // if( !$this->imagen['name'] || $this->imagen['error'] ) {
        //     $errores[] = 'La imagen es obligatoria';
        // }

        // //validar por tamaño (100 Kb maximo)
        // $medida = 1000 * 1000;//un mega

        // if( $this->imagen ['size'] > $medida){
        //     $errores[] = 'La imagen es muy pesada';
        // }
    }
}