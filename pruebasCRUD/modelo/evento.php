<?php
abstract class Evento {
                    private $id_evento=null;
                    private $id_usuario=null;
                    private $nombre=null;
                    private $descripcion=null;
                    private ?DateTime $fecha_inicio=null;
                    private ?DateTime $fecha_fin=null;

    /**
     * Constructor de la clase abstracta "evento"
     */
    public function __construct($id_evento=null,$id_usuario=null,$nombre=null,$descripcion=null,$fecha_inicio=null,$fecha_fin=null){
        $this->id_evento = $id_evento;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        //todo: reformar id 
       /*  if ($this->id_usuario == null) {
            throw new Exception("El evento necesita tener un usuario asignado");
        } */
        if ($this->fecha_inicio == null) {
            $this->fecha_inicio = new DateTime();   
        }
        if ($this->fecha_fin == null) {
            $this->fecha_fin = clone $this->fecha_inicio;
            $this->fecha_fin->modify('+ 1 hour');
        }        
    }

    /**
     * Getters y Setters
     */

                    /**
                     * Get the value of id_evento
                     */ 
                    public function getId_evento()
                    {
                                        return $this->id_evento;
                    }

                    /**
                     * Set the value of id_evento
                     *
                     * @return  self
                     */ 
                    public function setId_evento($id_evento)
                    {
                                        $this->id_evento = $id_evento;

                                        return $this;
                    }

                    /**
                     * Get the value of nombre
                     */ 
                    public function getNombre()
                    {
                                        return $this->nombre;
                    }

                    /**
                     * Set the value of nombre
                     *
                     * @return  self
                     */ 
                    public function setNombre($nombre)
                    {
                                        $this->nombre = $nombre;

                                        return $this;
                    }

                    /**
                     * Get the value of nombre
                     */ 
                    public function getDescripcion()
                    {
                                        return $this->descripcion;
                    }

                    /**
                     * Set the value of nombre
                     *
                     * @return  self
                     */ 
                    public function setDescripcion($descripcion)
                    {
                                        $this->descripcion = $descripcion;

                                        return $this;
                    }

                    /**
                     * Get the value of fecha_inicio
                     */ 
                    public function getFecha_inicio()
                    {
                                        return $this->fecha_inicio;
                    }

                    /**
                     * Set the value of fecha_inicio
                     *
                     * @return  self
                     */ 
                    public function setFecha_inicio($fecha_inicio)
                    {
                                        $this->fecha_inicio = $fecha_inicio;

                                        return $this;
                    }

                    /**
                     * Get the value of fecha_fin
                     */ 
                    public function getFecha_fin()
                    {
                                        return $this->fecha_fin;
                    }

                    /**
                     * Set the value of fecha_fin
                     *
                     * @return  self
                     */ 
                    public function setFecha_fin($fecha_fin)
                    {
                                        $this->fecha_fin = $fecha_fin;

                                        return $this;
                    }

                    /**
                     * Get the value of id_usuario
                     */ 
                    public function getId_usuario()
                    {
                                        return $this->id_usuario;
                    }

                    /**
                     * Set the value of id_usuario
                     *
                     * @return  self
                     */ 
                    public function setId_usuario($id_usuario)
                    {
                                        $this->id_usuario = $id_usuario;

                                        return $this;
                    }

                 
}