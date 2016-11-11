<?php

namespace Proyecto2Bundle\Entity;

/**
 * Tarifa
 */
class Tarifa
{
    /**
     * @var integer
     */
    private $idtarifa;

    /**
     * @var string
     */
    private $clase;

    /**
     * @var float
     */
    private $precio;


    /**
     * Get idtarifa
     *
     * @return integer
     */
    public function getIdtarifa()
    {
        return $this->idtarifa;
    }

    /**
     * Set clase
     *
     * @param string $clase
     *
     * @return Tarifa
     */
    public function setClase($clase)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get clase
     *
     * @return string
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Tarifa
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }
}

