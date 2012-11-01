<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Movimiento
 *
 * @ORM\Table(name="tipo_movimiento")
 * @ORM\Entity
 */
class Movimiento
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
     * @ORM\Column(name="descripcion", type="string", length=7, nullable=false)
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
     * @return Movimiento
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
    * @ORM\OneToMany(targetEntity="ConceptoCaja", mappedBy="tipoMovimiento")
    */
    protected $conceptosCaja;
    public function __construct()
    {
        $this->conceptosCaja = new ArrayCollection();
    }
    public function addConceptosCaja(\CajaBanco\BackendBundle\Entity\ConceptoCaja $conceptosCaja)
    {
        $this->conceptosCaja[] = $conceptosCaja;
    }
    public function getConceptosCaja()
    {
        return $this->getDescripcion();
    }    
    public function __toString() {
        return $this->getConceptosCaja();
    }
}