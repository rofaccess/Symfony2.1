<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Rol
 *
 * @ORM\Table(name="rol")
 * @ORM\Entity
 */
class Rol
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
     * @ORM\Column(name="descripcion", type="string", length=25, nullable=false)
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
    * @ORM\OneToMany(targetEntity="Usuario", mappedBy="rol")
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
        return $this->getDescripcion();
    }    
    public function __toString() {
        return $this->getUsuarios();
    }
}