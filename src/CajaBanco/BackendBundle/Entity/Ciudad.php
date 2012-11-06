<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\Ciudad
 *
 * @ORM\Table(name="ciudad")
 * @ORM\Entity
 */
class Ciudad
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
     * @var string $pais
     *
     * @ORM\Column(name="pais", type="string", length=20, nullable=true)
     */
    private $pais;

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
     * @return Ciudad
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
     * Set pais
     *
     * @param string $pais
     * @return Ciudad
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function gePais()
    {
        return $this->pais;
    }
    
    //###########################################################################
    /**
    * @ORM\OneToMany(targetEntity="Banco", mappedBy="ciudad")
    */
    protected $bancos;
    public function __construct()
    {
        $this->bancos = new ArrayCollection();
    }
    public function addBancos(\CajaBanco\BackendBundle\Entity\Banco $bancos)
    {
        $this->bancos[] = $bancos;
    }
    public function getBancos()
    {
        return $this->getDescripcion();
    }    
    public function __toString() {
        return $this->getBancos();
    }
}