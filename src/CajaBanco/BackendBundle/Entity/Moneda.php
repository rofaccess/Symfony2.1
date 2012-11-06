<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Moneda
 *
 * @ORM\Table(name="moneda")
 * @ORM\Entity
 */
class Moneda
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=20, nullable=false)
     */
    private $descripcion;    
    
    /**
     * @var string $abreviatura
     *
     * @ORM\Column(name="abreviatura", type="string", length=3, nullable=false)
     */
    private $abreviatura;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Moneda
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    /**
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return Moneda
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    
        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }
    
    //###########################################################################
    /**
    * @ORM\OneToMany(targetEntity="CajaDetalle", mappedBy="moneda")
    *  @ORM\OneToMany(targetEntity="CuentaBancaria", mappedBy="moneda")
    */
    protected $cajaDetalles;
    protected $cuentasBancarias;
    public function __construct()
    {
        $this->cajaDetalles = new ArrayCollection();
        $this->cuentasBancarias = new ArrayCollection();
    }
    public function addCajaDetalles(\CajaBanco\BackendBundle\Entity\CajaDetalle $cajaDetalles)
    {
        $this->cajaDetalles[] = $cajaDetalles;
    }
    public function getCajaDetalles()
    {
        return $this->getDescripcion();
    }    
    public function __toString() {
        return $this->getCajaDetalles();
        return $this->getCuentasBancarias();
    }
    ////////////////////////////////////////////////////////////////////////////
      
    public function addCuentasBancarias(\CajaBanco\BackendBundle\Entity\CuentaBancaria $cuentasBancarias)
    {
        $this->cuentasBancarias[] = $cuentasBancarias;
    }
    public function getCuentasBancarias()
    {
        return $this->getDescripcion();
    }    
    
}