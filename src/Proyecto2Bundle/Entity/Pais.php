<?php

namespace Proyecto2Bundle\Entity;

/**
 * Pais
 */
class Pais
{
    /**
     * @var integer
     */
    private $idpais;

    /**
     * @var string
     */
    private $nombre;


    /**
     * Get idpais
     *
     * @return integer
     */
    public function getIdpais()
    {
        return $this->idpais;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Pais
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
}

