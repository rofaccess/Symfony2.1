<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Empleado
 *
 * @ORM\Table(name="empleado")
 * @ORM\Entity
 */
class Empleado
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
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=40, nullable=false)
     */
    
    private $nombre; 
        
    /**
     * @var string $ruc
     *
     * @ORM\Column(name="ruc", type="string", length=20, nullable=true)
     */
    
    private $ruc;   
    
    /**
     * @var string $documento
     *
     * @ORM\Column(name="documento", type="decimal",precision=10, nullable=false)
     */
    
    private $documento;
    
    /**
     * @var string $direccion
     *
     * @ORM\Column(name="direccion", type="string", length=40, nullable=true)
     */
    
    private $direccion; 
    
    /**
     * @var string $ciudad
     *
     * @ORM\Column(name="ciudad", type="string", length=40, nullable=true)
     */
    
    private $ciudad; 
    
    /**
     * @var string $telefono
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     */
    
    private $telefono;
    
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=40, nullable=true)
     */
    
    private $email; 
    
    /**
     * @var datetime $fIngreso
     *
     * @ORM\Column(name="f_ingreso", type="datetime", nullable=false)
     */
    private $fIngreso;
    
    /**
     * @var datetime $fEgreso
     *
     * @ORM\Column(name="f_egreso", type="datetime", nullable=false)
     */
    private $fEgreso;
   
    /**
     * @var string $categoria
     *
     * @ORM\Column(name="categoria", type="string", length=40, nullable=true)
     */
    
    private $categoria;
    
    /**
     * @var string $activo
     *
     * @ORM\Column(name="activo", type="string", length=1, nullable=true)
     */
    private $activo;
   
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Empleado
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
     * Set ruc
     *
     * @param string $ruc
     * @return Empleado
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    
        return $this;
    }

    /**
     * Get ruc
     *
     * @return string 
     */
    public function getRuc()
    {
        return $this->ruc;
    }
    
    /**
     * Set documento
     *
     * @param string $documento
     * @return Empleado
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    
        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }
    
     /**
     * Set direccion
     *
     * @param string $direccion
     * @return Empleado
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
     * Set ciudad
     *
     * @param string $ciudad
     * @return Empleado
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }
    
    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Empleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
    
    /**
     * Set email
     *
     * @param string $email
     * @return Empleado
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Set fIngreso
     *
     * @param datetime $fIngreso
     * @return Empleado
     */
    public function setFIngreso($fIngreso)
    {
        $this->fIngreso = $fIngreso;
    
        return $this;
    }

    /**
     * Get fIngreso
     *
     * @return datetime
     */
    public function getFIngreso()
    {
        return $this->fIngreso;
    }
    
    /**
     * Set fEgreso
     *
     * @param datetime $fEgreso
     * @return Empleado
     */
    public function setFEgreso($fEgreso)
    {
        $this->fEgreso = $fEgreso;
    
        return $this;
    }

    /**
     * Get fEgreso
     *
     * @return datetime
     */
    public function getFEgreso()
    {
        return $this->fEgreso;
    }
    
    /**
     * Set categoria
     *
     * @param string $categoria
     * @return Empleado
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    
    /**
     * Set activo
     *
     * @param string $activo
     * @return Empleado
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
    
        return $this;
    }

    /**
     * Get activo
     *
     * @return string 
     */
    public function getActivo()
    {
        return $this->activo;
    }  
    
    /**
    * @ORM\OneToMany(targetEntity="Usuario", mappedBy="empleado")
    */
    protected $usuarios;
    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
    }
    public function addUsuarios(\CajaBanco\BackendBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios[] = $usuarios;
    }
    public function getUsuarios()
    {
        return $this->getNombre();
    }    
    public function __toString() {
        return $this->getUsuarios();
    }
    
}