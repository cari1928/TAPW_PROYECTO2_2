<?php

namespace Proyecto2Bundle\Entity;

/**
 * Aeropuerto
 */
class Aeropuerto
{
    /**
     * @var integer
     */
    private $idaeropuerto;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var \Proyecto2Bundle\Entity\Pais
     */
    private $idpais;


    /**
     * Get idaeropuerto
     *
     * @return integer
     */
    public function getIdaeropuerto()
    {
        return $this->idaeropuerto;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Aeropuerto
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
     * Set idpais
     *
     * @param \Proyecto2Bundle\Entity\Pais $idpais
     *
     * @return Aeropuerto
     */
    public function setIdpais(\Proyecto2Bundle\Entity\Pais $idpais = null)
    {
        $this->idpais = $idpais;

        return $this;
    }

    /**
     * Get idpais
     *
     * @return \Proyecto2Bundle\Entity\Pais
     */
    public function getIdpais()
    {
        return $this->idpais;
    }
}

