<?php

namespace Proyecto2Bundle\Entity;

/**
 * Vuelo
 */
class Vuelo
{
    /**
     * @var integer
     */
    private $idvuelo;

    /**
     * @var float
     */
    private $cupon;

    /**
     * @var float
     */
    private $total;

    /**
     * @var \Proyecto2Bundle\Entity\Disponibles
     */
    private $iddisponibles;

    /**
     * @var \Proyecto2Bundle\Entity\Cliente
     */
    private $idcliente;


    /**
     * Get idvuelo
     *
     * @return integer
     */
    public function getIdvuelo()
    {
        return $this->idvuelo;
    }

    /**
     * Set cupon
     *
     * @param float $cupon
     *
     * @return Vuelo
     */
    public function setCupon($cupon)
    {
        $this->cupon = $cupon;

        return $this;
    }

    /**
     * Get cupon
     *
     * @return float
     */
    public function getCupon()
    {
        return $this->cupon;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Vuelo
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set iddisponibles
     *
     * @param \Proyecto2Bundle\Entity\Disponibles $iddisponibles
     *
     * @return Vuelo
     */
    public function setIddisponibles(\Proyecto2Bundle\Entity\Disponibles $iddisponibles = null)
    {
        $this->iddisponibles = $iddisponibles;

        return $this;
    }

    /**
     * Get iddisponibles
     *
     * @return \Proyecto2Bundle\Entity\Disponibles
     */
    public function getIddisponibles()
    {
        return $this->iddisponibles;
    }

    /**
     * Set idcliente
     *
     * @param \Proyecto2Bundle\Entity\Cliente $idcliente
     *
     * @return Vuelo
     */
    public function setIdcliente(\Proyecto2Bundle\Entity\Cliente $idcliente = null)
    {
        $this->idcliente = $idcliente;

        return $this;
    }

    /**
     * Get idcliente
     *
     * @return \Proyecto2Bundle\Entity\Cliente
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }
}
