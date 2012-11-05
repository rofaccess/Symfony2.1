<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//Permite hacer Validaciones 
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Caja
 *
 * @ORM\Table(name="caja")
 * @ORM\Entity(repositoryClass="CajaBanco\BackendBundle\Entity\Repository\CajaRepository")
 */
class Caja
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
     * @var float $nCaja
     *
     * @ORM\Column(name="n_caja", type="decimal", precision=3, unique=true, nullable=false)
     * @Assert\NotNull()
     * @Assert\NotBlank()     
     * @Assert\MaxLength(3)
     * 
     */
    private $nCaja;

    /**
     * @var string $denominacion
     *
     * @ORM\Column(name="denominacion", type="string", length=30, nullable=false)
     */
    private $denominacion;

    /**
     * @var datetime $fCreacion
     *
     * @ORM\Column(name="f_creacion", type="datetime", nullable=false)
     * @Assert\DateTime()
     */
    private $fCreacion;

    /**
     * @var string $abierto
     *
     * @ORM\Column(name="abierto", type="string", length=2, nullable=false)
     */
    private $abierto ="No";  //default 0(false) al insertar en la tabla     
    
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
     * Set nCaja
     *
     * @param float $nCaja
     * @return Caja
     */
    public function setNCaja($nCaja)
    {
        $this->nCaja = $nCaja;
    
        return $this;
    }

    /**
     * Get nCaja
     *
     * @return float 
     */
    public function getNCaja()
    {
        return $this->nCaja;
    }

    /**
     * Set denominacion
     *
     * @param string $denominacion
     * @return Caja
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    
        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string 
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Set fCreacion
     *
     * @param datetime $fCreacion
     * @return Caja
     */
    public function setFCreacion($fCreacion)
    {
        $this->fCreacion = $fCreacion;
    
        return $this;
    }

    /**
     * Get fCreacion
     *
     * @return datetime 
     */
    public function getFCreacion()
    {
        return $this->fCreacion;
    }

    /**
     * Set abierto
     *
     * @param string $abierto
     * @return Caja
     */
    public function setAbierto($abierto)
    {
        $this->abierto = $abierto;
    
        return $this;
    }

    /**
     * Get abierto
     *
     * @return string 
     */
    public function getAbierto()
    {
        return $this->abierto;
    }
    
    //###########################################################################
    /**
    * @ORM\OneToMany(targetEntity="CajaDetalle", mappedBy="caja")
    */
    protected $cajaDetalles;
    public function __construct()
    {
        $this->cajaDetalles = new ArrayCollection();
    }
    public function addCajaDetalles(\CajaBanco\BackendBundle\Entity\CajaDetalle $cajaDetalles)
    {
        $this->cajaDetalles[] = $cajaDetalles;
    }
    public function getCajaDetalles()
    {
        return $this->getDenominacion();
    }    
    public function __toString() {
        return $this->getCajaDetalles();
    }
   
}