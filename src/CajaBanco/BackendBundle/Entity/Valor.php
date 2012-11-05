<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Valor
 *
 * @ORM\Table(name="tipo_valor")
 * @ORM\Entity
 */
class Valor
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
     * @return Valor
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
    
    //###########################################################################
    /**
    * @ORM\OneToMany(targetEntity="CajaDetalle", mappedBy="valor")
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
        return $this->getDescripcion();
    }    
    public function __toString() {
        return $this->getCajaDetalles();
    }
}