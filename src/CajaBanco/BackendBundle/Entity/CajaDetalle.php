<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//Permite hacer Validaciones 
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\CajaDetalle
 *
 * @ORM\Table(name="caja_detalle")
 * @ORM\Entity(repositoryClass="CajaBanco\BackendBundle\Entity\Repository\CajaDetalleRepository")
 */
class CajaDetalle
{
    /**
     * @var datetime $idFApertura
     *
     * @ORM\Column(name="id_f_apertura", type="datetime", nullable=false)
     * @ORM\Id
     */
    private $idFApertura;
    
    /**     
     * @ORM\ManyToOne(targetEntity="Caja", inversedBy="cajaDetalles")
     * @ORM\JoinColumn(name="caja_id", referencedColumnName="id")  
     */
    protected $caja;

    /**     
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="cajaDetalles")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")  
     */
    protected $usuario;
    
    /**     
     * @ORM\ManyToOne(targetEntity="Valor", inversedBy="cajaDetalles")
     * @ORM\JoinColumn(name="valor_id", referencedColumnName="id")  
     */
    protected $valor;
    
    /**     
     * @ORM\ManyToOne(targetEntity="Moneda", inversedBy="cajaDetalles")
     * @ORM\JoinColumn(name="moneda_id", referencedColumnName="id")  
     */
    protected $moneda;    
    
    /**
     * @var datetime $fCierre
     *
     * @ORM\Column(name="f_cierre", type="datetime", nullable=true)
     */
    private $fCierre;

    /**
     * @var float $mApertura
     *
     * @ORM\Column(name="m_apertura", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $mApertura;       
    
    /**
     * @var float $mCierre
     *
     * @ORM\Column(name="m_cierre", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $mCierre;
    /**
     * Get idFApertura
     *
     * @return datetime
     */
    public function getIdFApertura()
    {
        return $this->idFApertura;
    }
    //////////////////////////////////////////////////////////////////
    public function setCaja(\CajaBanco\BackendBundle\Entity\Caja $caja)
    {
        $this->caja = $caja;
    }
   
    public function getCaja()
    {
        return $this->caja;
    }
    ////////////////////////////////////////////////////////////////////
    public function setUsuario(\CajaBanco\BackendBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    }
   
    public function getUsuario()
    {
        return $this->usuario;
    }
    ///////////////////////////////////////////////////////////////////////
    public function setValor(\CajaBanco\BackendBundle\Entity\Valor $valor)
    {
        $this->valor = $valor;
    }
   
    public function getValor()
    {
        return $this->valor;
    }
    /////////////////////////////////////////////////////////////////////////
    public function setMoneda(\CajaBanco\BackendBundle\Entity\Moneda $moneda)
    {
        $this->moneda = $moneda;
    }
   
    public function getMoneda()
    {
        return $this->moneda;
    }
    
    /**
     * Set fCierre
     *
     * @param datetime $fCierre
     * @return CajaDetalle
     */
    public function setFCierre($fCierre)
    {
        $this->fCierre = $fCierre;
    
        return $this;
    }

    /**
     * Get fCierre
     *
     * @return datetime 
     */
    public function getFCierre()
    {
        return $this->fCierre;
    }
    
    /**
     * Set mApertura
     *
     * @param float $mApertura
     * @return CajaDetalle
     */
    public function setMApertura($mApertura)
    {
        $this->mApertura = $mApertura;
    
        return $this;
    }

    /**
     * Get mApertura
     *
     * @return float 
     */
    public function getMApertura()
    {
        return $this->mApertura;
    }
    
     /**
     * Set mCierre
     *
     * @param float $mCierre
     * @return CajaDetalle
     */
    public function setMCierre($mCierre)
    {
        $this->mCierre = $mCierre;
    
        return $this;
    }

    /**
     * Get mCierre
     *
     * @return float 
     */
    public function getMCierre()
    {
        return $this->mCierre;
    }
}