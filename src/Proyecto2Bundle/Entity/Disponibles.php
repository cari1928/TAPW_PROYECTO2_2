<?php

namespace Proyecto2Bundle\Entity;

/**
 * Disponibles
 */
class Disponibles
{
    /**
     * @var integer
     */
    private $iddisponibles;

    /**
     * @var \DateTime
     */
    private $fechahora;

    /**
     * @var \Proyecto2Bundle\Entity\Aeropuerto
     */
    private $idorigen;

    /**
     * @var \Proyecto2Bundle\Entity\Aeropuerto
     */
    private $iddestino;

    /**
     * @var \Proyecto2Bundle\Entity\Tarifa
     */
    private $idtarifa;


    /**
     * Set iddisponibles
     *
     * @param integer $iddisponibles
     *
     * @return Disponibles
     */
    public function setIddisponibles($iddisponibles)
    {
        $this->iddisponibles = $iddisponibles;

        return $this;
    }

    /**
     * Get iddisponibles
     *
     * @return integer
     */
    public function getIddisponibles()
    {
        return $this->iddisponibles;
    }

    /**
     * Set fechahora
     *
     * @param \DateTime $fechahora
     *
     * @return Disponibles
     */
    public function setFechahora($fechahora)
    {
        $this->fechahora = $fechahora;

        return $this;
    }

    /**
     * Get fechahora
     *
     * @return \DateTime
     */
    public function getFechahora()
    {
        return $this->fechahora;
    }

    /**
     * Set idorigen
     *
     * @param \Proyecto2Bundle\Entity\Aeropuerto $idorigen
     *
     * @return Disponibles
     */
    public function setIdorigen(\Proyecto2Bundle\Entity\Aeropuerto $idorigen = null)
    {
        $this->idorigen = $idorigen;

        return $this;
    }

    /**
     * Get idorigen
     *
     * @return \Proyecto2Bundle\Entity\Aeropuerto
     */
    public function getIdorigen()
    {
        return $this->idorigen;
    }

    /**
     * Set iddestino
     *
     * @param \Proyecto2Bundle\Entity\Aeropuerto $iddestino
     *
     * @return Disponibles
     */
    public function setIddestino(\Proyecto2Bundle\Entity\Aeropuerto $iddestino = null)
    {
        $this->iddestino = $iddestino;

        return $this;
    }

    /**
     * Get iddestino
     *
     * @return \Proyecto2Bundle\Entity\Aeropuerto
     */
    public function getIddestino()
    {
        return $this->iddestino;
    }

    /**
     * Set idtarifa
     *
     * @param \Proyecto2Bundle\Entity\Tarifa $idtarifa
     *
     * @return Disponibles
     */
    public function setIdtarifa(\Proyecto2Bundle\Entity\Tarifa $idtarifa = null)
    {
        $this->idtarifa = $idtarifa;

        return $this;
    }

    /**
     * Get idtarifa
     *
     * @return \Proyecto2Bundle\Entity\Tarifa
     */
    public function getIdtarifa()
    {
        return $this->idtarifa;
    }
}

