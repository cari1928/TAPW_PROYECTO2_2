<?php

namespace Proyecto2Bundle\Entity;

/**
 * Hotel
 */
class Hotel
{
    /**
     * @var integer
     */
    private $idhotel;

    /**
     * @var integer
     */
    private $capacidad;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $direccion;


    /**
     * Get idhotel
     *
     * @return integer
     */
    public function getIdhotel()
    {
        return $this->idhotel;
    }

    /**
     * Set capacidad
     *
     * @param integer $capacidad
     *
     * @return Hotel
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return integer
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Hotel
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Hotel
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
}

