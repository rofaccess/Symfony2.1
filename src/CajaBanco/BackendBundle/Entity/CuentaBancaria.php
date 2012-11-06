<?php

namespace CajaBanco\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//Permite hacer Validaciones 
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CajaBanco\BackendBundle\Entity\CuentaBancaria
 *
 * @ORM\Table(name="cuenta_bancaria")
 * @ORM\Entity
 */
class CuentaBancaria
{    
    /**
     * @var integer $n_cuenta
     *
     * @ORM\Column(name="n_cuenta", type="integer", nullable=false)
     * @ORM\Id
     */
    private $nCuenta;

    /**     
     * @ORM\ManyToOne(targetEntity="Banco", inversedBy="cuentasBancarias")
     * @ORM\JoinColumn(name="banco_id", referencedColumnName="id")  
     */
    
    private $banco;  
    
     /**
     * @var datetime $fApertura
     *
     * @ORM\Column(name="f_apertura", type="datetime", nullable=false)
     */
    private $fApertura;
    
    /**
     * @var float $mActual  
     *
     * @ORM\Column(name="m_actual", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $mActual; 
    
    /**     
     * @ORM\ManyToOne(targetEntity="Moneda", inversedBy="cuentasBancarias")
     * @ORM\JoinColumn(name="moneda_id", referencedColumnName="id")  
     */
    protected $moneda;
    
    /**
     * @var datetime $fCancelacion
     *
     * @ORM\Column(name="f_cancelacion", type="datetime", nullable=true)
     */
    private $fCancelacion;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getNCuenta()
    {
        return $this->nCuenta;
    }

    ///////////////////////////////////////////////////////////////////////// 
    public function setBanco(\CajaBanco\BackendBundle\Entity\Banco $banco)
    {
        $this->banco = $banco;
    }
    
    public function getBanco()
    {
        return $this->banco;
    }
    
    /**
     * Set fApertura
     *
     * @param datetime $fApertura
     * @return CuentaBancaria
     */
    public function setFApertura($fApertura)
    {
        $this->fApertura = $fApertura;
    
        return $this;
    }

    /**
     * Get fApertura
     *
     * @return datetime 
     */
    public function getFApertura()
    {
        return $this->fApertura;
    }
    
    /**
     * Set mActual
     *
     * @param float $mActual
     * @return CuentaBancaria
     */
    public function setMActual($mActual)
    {
        $this->mActual = $mActual;
    
        return $this;
    }

    /**
     * Get mActual
     *
     * @return float 
     */
    public function getMActual()
    {
        return $this->mActual;
    }
    
    /**
     * Set fCancelacion
     *
     * @param datetime $fCancelacion
     * @return CuentaBancaria
     */
    public function setFCancelacion($fCancelacion)
    {
        $this->fCancelacion = $fCancelacion;
    
        return $this;
    }

    /**
     * Get fCancelacion
     *
     * @return datetime 
     */
    public function getFCancelacion()
    {
        return $this->fCancelacion;
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
    
    
}