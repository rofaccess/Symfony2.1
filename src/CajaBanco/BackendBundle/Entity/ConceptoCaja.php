<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//Permite hacer Validaciones 
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CajaBanco\BackendBundle\Entity\ConceptoCaja
 *
 * @ORM\Table(name="conceptos_caja")
 * @ORM\Entity(repositoryClass="CajaBanco\BackendBundle\Entity\Repository\ConceptoCajaRepository")
 */
class ConceptoCaja
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
     * @ORM\Column(name="descripcion", type="string", length=40, nullable=false)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\MinLength(4)        
     */
    private $descripcion;

    /**     
     * @ORM\ManyToOne(targetEntity="Movimiento", inversedBy="conceptosCaja")
     * @ORM\JoinColumn(name="tipoMovimiento_id", referencedColumnName="id")
     */
    private $tipoMovimiento;
    
    /**     
     * @ORM\ManyToOne(targetEntity="Cuenta", inversedBy="conceptosCaja")
     * @ORM\JoinColumn(name="cuenta_id", referencedColumnName="id")  
     */
    protected $cuenta;
    
    /**     
     * @ORM\ManyToOne(targetEntity="Cuenta", inversedBy="conceptosCaja")
     * @ORM\JoinColumn(name="contracuenta_id", referencedColumnName="id")
     */
    protected $contracuenta;

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
     * @return ConceptoCaja
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
    
    public function setTipoMovimiento(\CajaBanco\BackendBundle\Entity\Movimiento $tipoMovimiento)
    {
        $this->tipoMovimiento = $tipoMovimiento;
    }
    
    public function getTipoMovimiento()
    {
        return $this->tipoMovimiento;
    }
    
    public function setCuenta(\CajaBanco\BackendBundle\Entity\Cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
    }
   
    public function getCuenta()
    {
        return $this->cuenta;
    }
    
    public function setContracuenta(\CajaBanco\BackendBundle\Entity\Cuenta $contracuenta)
    {
        $this->contracuenta = $contracuenta;
    }
   
    public function getContracuenta()
    {
        return $this->contracuenta;
    }
    
}