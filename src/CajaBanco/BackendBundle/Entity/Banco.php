<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//Permite hacer Validaciones 
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Banco
 *
 * @ORM\Table(name="banco")
 * @ORM\Entity
 */
class Banco
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
     * @ORM\Column(name="nombre", type="string", length=30, nullable=false)
     * @Assert\NotNull()
     * @Assert\NotBlank()     
     * @Assert\MaxLength(30)
     */
    private $nombre;   
    
     /**
     * @var string $ruc
     *
     * @ORM\Column(name="ruc", type="string", length=20, nullable=true)
     * @Assert\NotNull()
     * @Assert\NotBlank()     
     * @Assert\MaxLength(20)
     */
    
    private $ruc;
     
    /**
     * @var string $direccion
     *
     * @ORM\Column(name="direccion", type="string", length=40, nullable=true)
     * @Assert\NotNull()
     * @Assert\NotBlank()     
     * @Assert\MaxLength(40)
     */
    
    private $direccion; 
    
    /**     
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="bancos")
     * @ORM\JoinColumn(name="ciudad_id", referencedColumnName="id")  
     */
    
    private $ciudad; 
    
    /**
     * @var string $telefono
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     * @Assert\NotNull()
     * @Assert\NotBlank()     
     * @Assert\MaxLength(20)
     */
    
    private $telefono;
    
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=40, nullable=true)
     * @Assert\NotNull()
     * @Assert\NotBlank()     
     * @Assert\MaxLength(40)
     */
    
    private $email;
    
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
     * @return Banco
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
     * @return Banco
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
     * Set direccion
     *
     * @param string $direccion
     * @return Banco
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
    
    public function setCiudad(\CajaBanco\BackendBundle\Entity\Ciudad $ciudad)
    {
        $this->ciudad = $ciudad;
    }
    
    public function getCiudad()
    {
        return $this->ciudad;
    }
    
    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Banco
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
     * @return Banco
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
    
    //###########################################################################
    /**
    * @ORM\OneToMany(targetEntity="CuentaBancaria", mappedBy="banco")
    */
    protected $cuentasBancarias;
    public function __construct()
    {
        $this->cuentasBancarias = new ArrayCollection();
    }
    public function addCuentasBancarias(\CajaBanco\BackendBundle\Entity\CuentaBancaria $cuentasBancarias)
    {
        $this->cuentasBancarias[] = $cuentasBancarias;
    }
    public function getCuentasBancarias()
    {
        return $this->getNombre();
    }    
    public function __toString() {
        return $this->getCuentasBancarias();
    }
}