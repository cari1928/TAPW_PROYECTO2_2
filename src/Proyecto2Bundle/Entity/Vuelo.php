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
     * @var \Proyecto2Bundle\Entity\Asiento
     */
    private $idasiento;

    /**
     * @var \Proyecto2Bundle\Entity\Reserva
     */
    private $idreserva;

    /**
     * @var \Proyecto2Bundle\Entity\Avion
     */
    private $idavion;

    /**
     * @var \Proyecto2Bundle\Entity\Tarifa
     */
    private $idtarifa;


    /**
     * Set idvuelo
     *
     * @param integer $idvuelo
     *
     * @return Vuelo
     */
    public function setIdvuelo($idvuelo)
    {
        $this->idvuelo = $idvuelo;

        return $this;
    }

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
     * Set fechahora
     *
     * @param \DateTime $fechahora
     *
     * @return Vuelo
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
     * @return Vuelo
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
     * @return Vuelo
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
     * Set idasiento
     *
     * @param \Proyecto2Bundle\Entity\Asiento $idasiento
     *
     * @return Vuelo
     */
    public function setIdasiento(\Proyecto2Bundle\Entity\Asiento $idasiento = null)
    {
        $this->idasiento = $idasiento;

        return $this;
    }

    /**
     * Get idasiento
     *
     * @return \Proyecto2Bundle\Entity\Asiento
     */
    public function getIdasiento()
    {
        return $this->idasiento;
    }

    /**
     * Set idreserva
     *
     * @param \Proyecto2Bundle\Entity\Reserva $idreserva
     *
     * @return Vuelo
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
     * Set idavion
     *
     * @param \Proyecto2Bundle\Entity\Avion $idavion
     *
     * @return Vuelo
     */
    public function setIdavion(\Proyecto2Bundle\Entity\Avion $idavion = null)
    {
        $this->idavion = $idavion;

        return $this;
    }

    /**
     * Get idavion
     *
     * @return \Proyecto2Bundle\Entity\Avion
     */
    public function getIdavion()
    {
        return $this->idavion;
    }

    /**
     * Set idtarifa
     *
     * @param \Proyecto2Bundle\Entity\Tarifa $idtarifa
     *
     * @return Vuelo
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
     * Set monto
     *
     * @param float $monto
     *
     * @return Vuelo
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
    /**
     * @var \Proyecto2Bundle\Entity\Disponibles
     */
    private $iddisponibles;


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
}
