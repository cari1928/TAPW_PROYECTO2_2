<?php

namespace Proyecto2Bundle\Entity;

/**
 * Pago
 */
class Pago
{
    /**
     * @var integer
     */
    private $idpago;

    /**
     * @var float
     */
    private $monto;

    /**
     * @var float
     */
    private $cupon;

    /**
     * @var float
     */
    private $total;

    /**
     * @var \Proyecto2Bundle\Entity\Cliente
     */
    private $idcliente;


    /**
     * Get idpago
     *
     * @return integer
     */
    public function getIdpago()
    {
        return $this->idpago;
    }

    /**
     * Set monto
     *
     * @param float $monto
     *
     * @return Pago
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return float
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set cupon
     *
     * @param float $cupon
     *
     * @return Pago
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
     * @return Pago
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
     * Set idcliente
     *
     * @param \Proyecto2Bundle\Entity\Cliente $idcliente
     *
     * @return Pago
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
