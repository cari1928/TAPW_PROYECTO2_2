<?php

namespace Proyecto2Bundle\Entity;

/**
 * Cliente
 */
class Cliente
{
    /**
     * @var integer
     */
    private $idcliente;

    /**
     * @var string
     */
    private $nombres;

    /**
     * @var string
     */
    private $apellidos;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $direccionFacturacion;

    /**
     * @var string
     */
    private $modoPago;

    /**
     * @var \DateTime
     */
    private $nacimiento;


    /**
     * Get idcliente
     *
     * @return integer
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     *
     * @return Cliente
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Cliente
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Cliente
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

    /**
     * Set direccionFacturacion
     *
     * @param string $direccionFacturacion
     *
     * @return Cliente
     */
    public function setDireccionFacturacion($direccionFacturacion)
    {
        $this->direccionFacturacion = $direccionFacturacion;

        return $this;
    }

    /**
     * Get direccionFacturacion
     *
     * @return string
     */
    public function getDireccionFacturacion()
    {
        return $this->direccionFacturacion;
    }

    /**
     * Set modoPago
     *
     * @param string $modoPago
     *
     * @return Cliente
     */
    public function setModoPago($modoPago)
    {
        $this->modoPago = $modoPago;

        return $this;
    }

    /**
     * Get modoPago
     *
     * @return string
     */
    public function getModoPago()
    {
        return $this->modoPago;
    }

    /**
     * Set nacimiento
     *
     * @param \DateTime $nacimiento
     *
     * @return Cliente
     */
    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;

        return $this;
    }

    /**
     * Get nacimiento
     *
     * @return \DateTime
     */
    public function getNacimiento()
    {
        return $this->nacimiento;
    }
}

