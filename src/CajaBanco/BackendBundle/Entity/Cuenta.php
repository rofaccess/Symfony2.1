<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//Permite hacer Validaciones 
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Cuenta
 *
 * @ORM\Table(name="plan_cuentas")
 * @ORM\Entity(repositoryClass="CajaBanco\BackendBundle\Entity\Repository\CuentaRepository")
 */
class Cuenta
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
     * @var float $nCuenta
     *
     * @ORM\Column(name="n_cuenta", type="decimal", precision=6, unique=true, nullable=false)
     */
    private $nCuenta;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=30, nullable=false)
     */
    private $descripcion;

    /**
     * @var float $nivel
     *
     * @ORM\Column(name="nivel", type="decimal", precision=1, nullable=false)
     */
    private $nivel;

    /**
     * @var string $asentable
     *
     * @ORM\Column(name="asentable", type="string", length=2, nullable=true)
     */
    private $asentable;       

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
     * Set nCuenta
     *
     * @param float $nCuenta
     * @return Cuenta
     */
    public function setNCuenta($nCuenta)
    {
        $this->nCuenta = $nCuenta;
    
        return $this;
    }

    /**
     * Get nCuenta
     *
     * @return float 
     */
    public function getNCuenta()
    {
        return $this->nCuenta;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Cuenta
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
     * Set nivel
     *
     * @param float $nivel
     * @return Cuenta
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    
        return $this;
    }

    /**
     * Get nivel
     *
     * @return float 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set asentable
     *
     * @param string $asentable
     * @return Cuenta
     */
    public function setAsentable($asentable)
    {
        $this->asentable = $asentable;
    
        return $this;
    }

    /**
     * Get asentable
     *
     * @return string 
     */
    public function getAsentable()
    {
        return $this->asentable;
    }
    
    /**
    * @ORM\OneToMany(targetEntity="ConceptoCaja", mappedBy="cuenta")
    * @ORM\OneToMany(targetEntity="ConceptoCaja", mappedBy="contracuenta")
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