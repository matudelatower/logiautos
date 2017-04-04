<?php

namespace CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UtilBundle\Entity\Base\BaseClass;

/**
 * EncuestaResultadoCabecera
 *
 * @ORM\Table(name="crm_encuesta_resultados_cabeceras")
 * @ORM\Entity
 */
class EncuestaResultadoCabecera extends BaseClass {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="VehiculosBundle\Entity\Vehiculo",inversedBy="encuestaResultadoCabecera")
	 * @ORM\JoinColumn(name="vehiculo_id", referencedColumnName="id")
	 */
	private $vehiculo;

	/**
	 * @ORM\OneToMany(targetEntity="CRMBundle\Entity\EncuestaResultadoRespuesta", mappedBy="encuestaResultadoCabecera", cascade={"remove"})
	 *
	 */
	private $encuestaResultadoRespuesta;

	/**
	 * @ORM\OneToOne(targetEntity="CRMBundle\Entity\Encuesta")
	 * @ORM\JoinColumn(name="encuesta_id", referencedColumnName="id")
	 */
	private $encuesta;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->encuestaResultadoRespuesta = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return EncuestaResultadoCabecera
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Set fechaActualizacion
     *
     * @param \DateTime $fechaActualizacion
     *
     * @return EncuestaResultadoCabecera
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Set vehiculo
     *
     * @param \VehiculosBundle\Entity\Vehiculo $vehiculo
     *
     * @return EncuestaResultadoCabecera
     */
    public function setVehiculo(\VehiculosBundle\Entity\Vehiculo $vehiculo = null)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return \VehiculosBundle\Entity\Vehiculo
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * Add encuestaResultadoRespuestum
     *
     * @param \CRMBundle\Entity\EncuestaResultadoRespuesta $encuestaResultadoRespuestum
     *
     * @return EncuestaResultadoCabecera
     */
    public function addEncuestaResultadoRespuestum(\CRMBundle\Entity\EncuestaResultadoRespuesta $encuestaResultadoRespuestum)
    {
        $this->encuestaResultadoRespuesta[] = $encuestaResultadoRespuestum;

        return $this;
    }

    /**
     * Remove encuestaResultadoRespuestum
     *
     * @param \CRMBundle\Entity\EncuestaResultadoRespuesta $encuestaResultadoRespuestum
     */
    public function removeEncuestaResultadoRespuestum(\CRMBundle\Entity\EncuestaResultadoRespuesta $encuestaResultadoRespuestum)
    {
        $this->encuestaResultadoRespuesta->removeElement($encuestaResultadoRespuestum);
    }

    /**
     * Get encuestaResultadoRespuesta
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEncuestaResultadoRespuesta()
    {
        return $this->encuestaResultadoRespuesta;
    }

    /**
     * Set encuesta
     *
     * @param \CRMBundle\Entity\Encuesta $encuesta
     *
     * @return EncuestaResultadoCabecera
     */
    public function setEncuesta(\CRMBundle\Entity\Encuesta $encuesta = null)
    {
        $this->encuesta = $encuesta;

        return $this;
    }

    /**
     * Get encuesta
     *
     * @return \CRMBundle\Entity\Encuesta
     */
    public function getEncuesta()
    {
        return $this->encuesta;
    }

    /**
     * Set creadoPor
     *
     * @param \UsuariosBundle\Entity\Usuario $creadoPor
     *
     * @return EncuestaResultadoCabecera
     */
    public function setCreadoPor(\UsuariosBundle\Entity\Usuario $creadoPor = null)
    {
        $this->creadoPor = $creadoPor;

        return $this;
    }

    /**
     * Set actualizadoPor
     *
     * @param \UsuariosBundle\Entity\Usuario $actualizadoPor
     *
     * @return EncuestaResultadoCabecera
     */
    public function setActualizadoPor(\UsuariosBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }
}