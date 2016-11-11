<?php

namespace Proyecto2Bundle\Entity;

/**
 * Hospedaje
 */
class Hospedaje
{
    /**
     * @var integer
     */
    private $idhospedaje;

    /**
     * @var integer
     */
    private $dias;

    /**
     * @var \Proyecto2Bundle\Entity\Suite
     */
    private $idsuite;

    /**
     * @var \Proyecto2Bundle\Entity\Hotel
     */
    private $idhotel;

    /**
     * @var \Proyecto2Bundle\Entity\Reserva
     */
    private $idreserva;


    /**
     * Set idhospedaje
     *
     * @param integer $idhospedaje
     *
     * @return Hospedaje
     */
    public function setIdhospedaje($idhospedaje)
    {
        $this->idhospedaje = $idhospedaje;

        return $this;
    }

    /**
     * Get idhospedaje
     *
     * @return integer
     */
    public function getIdhospedaje()
    {
        return $this->idhospedaje;
    }

    /**
     * Set dias
     *
     * @param integer $dias
     *
     * @return Hospedaje
     */
    public function setDias($dias)
    {
        $this->dias = $dias;

        return $this;
    }

    /**
     * Get dias
     *
     * @return integer
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set idsuite
     *
     * @param \Proyecto2Bundle\Entity\Suite $idsuite
     *
     * @return Hospedaje
     */
    public function setIdsuite(\Proyecto2Bundle\Entity\Suite $idsuite = null)
    {
        $this->idsuite = $idsuite;

        return $this;
    }

    /**
     * Get idsuite
     *
     * @return \Proyecto2Bundle\Entity\Suite
     */
    public function getIdsuite()
    {
        return $this->idsuite;
    }

    /**
     * Set idhotel
     *
     * @param \Proyecto2Bundle\Entity\Hotel $idhotel
     *
     * @return Hospedaje
     */
    public function setIdhotel(\Proyecto2Bundle\Entity\Hotel $idhotel = null)
    {
        $this->idhotel = $idhotel;

        return $this;
    }

    /**
     * Get idhotel
     *
     * @return \Proyecto2Bundle\Entity\Hotel
     */
    public function getIdhotel()
    {
        return $this->idhotel;
    }

    /**
     * Set idreserva
     *
     * @param \Proyecto2Bundle\Entity\Reserva $idreserva
     *
     * @return Hospedaje
     */
    public function setIdreserva(\Proyecto2Bundle\Entity\Reserva $idreserva = null)
    {
        $this->idreserva = $idreserva;

        return $this;
    }

    /**
     * Get idreserva
     *
     * @return \Proyecto2Bundle\Entity\Reserva
     */
    public function getIdreserva()
    {
        return $this->idreserva;
    }
    /**
     * @var float
     */
    private $total;


    /**
     * Set total
     *
     * @param float $total
     *
     * @return Hospedaje
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
     * @var \Proyecto2Bundle\Entity\Cliente
     */
    private $idcliente;


    /**
     * Set idcliente
     *
     * @param \Proyecto2Bundle\Entity\Cliente $idcliente
     *
     * @return Hospedaje
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
