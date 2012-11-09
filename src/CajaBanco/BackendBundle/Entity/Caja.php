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
     * @var string $estado1
     *
     * @ORM\Column(name="estado1", type="string", length=7, nullable=false)
     */
    private $estado1 ="Cerrado";  //default 0(false) al insertar en la tabla 
    
    /**
     * @var string $estado2
     *
     * @ORM\Column(name="estado2", type="string", length=8, nullable=false)
     */
    private $estado2 ="Activo";  //default 0(false) al insertar en la tabla
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
     * Set estado1
     *
     * @param string $estado1
     * @return Caja
     */
    public function setEstado1($estado1)
    {
        $this->estado1 = $estado1;
    
        return $this;
    }

    /**
     * Get estado1
     *
     * @return string 
     */
    public function getEstado1()
    {
        return $this->estado1;
    }
    
    /**
     * Set estado2
     *
     * @param string $estado2
     * @return Caja
     */
    public function setEstado2($estado2)
    {
        $this->estado2 = $estado2;
    
        return $this;
    }

    /**
     * Get estado2
     *
     * @return string 
     */
    public function getEstado2()
    {
        return $this->estado2;
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