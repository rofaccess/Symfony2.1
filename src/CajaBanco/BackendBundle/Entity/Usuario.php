<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
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
     * @ORM\OneToOne(targetEntity="Empleado", inversedBy="usuarios")
     * @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")  
     */
    protected $empleado;    
    
    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=30, nullable=false)
     */
    
    private $nombre; 
    
    /**
     * @var string $contraseña
     *
     * @ORM\Column(name="contraseña", type="string", length=30, nullable=false)
     */
    
    private $contraseña; 
    
    /**     
     * @ORM\ManyToOne(targetEntity="Rol", inversedBy="usuarios")
     * @ORM\JoinColumn(name="rol_id", referencedColumnName="id")  
     */
    protected $rol; 
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function setEmpleado(\CajaBanco\BackendBundle\Entity\Empleado $empleado)
    {
        $this->empleado = $empleado;
    }
    
    public function getEmpleado()
    {
        return $this->empleado;
    }
    
    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * Set contraseña
     *
     * @param string $contraseña
     * @return Usuario
     */
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    
        return $this;
    }

    /**
     * Get contraseña
     *
     * @return string 
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }  
    
    public function setRol(\CajaBanco\BackendBundle\Entity\Rol $rol)
    {
        $this->rol = $rol;
    }
    
    public function getRol()
    {
        return $this->rol;
    }
    
    //###########################################################################
    /**
    * @ORM\OneToMany(targetEntity="CajaDetalle", mappedBy="usuario")
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
        return $this->getNombre();
    }    
    public function __toString() {
        return $this->getCajaDetalles();
    }
    
    
}