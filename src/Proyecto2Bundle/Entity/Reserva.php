<?php

namespace Proyecto2Bundle\Entity;

/**
 * Reserva
 */
class Reserva
{
    /**
     * @var integer
     */
    private $idreserva;

    /**
     * @var float
     */
    private $costo;

    /**
     * @var \DateTime
     */
    private $fecha;


    /**
     * Get idreserva
     *
     * @return integer
     */
    public function getIdreserva()
    {
        return $this->idreserva;
    }

    /**
     * Set costo
     *
     * @param float $costo
     *
     * @return Reserva
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return float
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Reserva
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
