<?php

namespace CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UtilBundle\Entity\Base\BaseClass;

/**
 * EncuestaPregunta
 *
 * @ORM\Table(name="crm_encuesta_preguntas")
 * @ORM\Entity(repositoryClass="CRMBundle\Repository\EncuestaPreguntaRepository")
 */
class EncuestaPregunta extends BaseClass {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var text
	 *
	 * @ORM\Column(name="pregunta", type="text", length=255)
	 */
	private $pregunta;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="orden", type="integer")
	 */
	private $orden;

	/**
	 * @ORM\ManyToOne(targetEntity="CRMBundle\Entity\EncuestaTipoPregunta")
	 * @ORM\JoinColumn(name="encuesta_tipo_pregunta_id", referencedColumnName="id")
	 */
	private $encuestaTipoPregunta;

	/**
	 * @ORM\ManyToOne(targetEntity="CRMBundle\Entity\Encuesta", inversedBy="preguntas")
	 * @ORM\JoinColumn(name="encuesta_id", referencedColumnName="id")
	 */
	private $encuesta;


	/**
	 * @ORM\OneToMany(targetEntity="CRMBundle\Entity\EncuestaOpcionRespuesta", mappedBy="encuestaPregunta", cascade={"persist", "remove"})
	 * @ORM\OrderBy({"orden"= "ASC"})
	 */
	private $opcionesRespuestas;

	/**
	 * @var text
	 *
	 * @ORM\Column(name="css_class", type="text", length=255, nullable=true)
	 */
	private $cssClass;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="ipc", type="boolean", nullable=true)
	 */
	protected $ipc;

	/**
	 * @var decimal
	 *
	 * @ORM\Column(name="objetivo", type="decimal", scale=2, nullable=true)
	 */
	private $objetivo;

	/**
	 * @var decimal
	 *
	 * @ORM\Column(name="media", type="decimal", scale=2, nullable=true)
	 */
	private $media;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="nps", type="boolean", nullable=true)
	 */
	protected $nps;

	public function __toString() {
		return $this->pregunta;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->opcionesRespuestas = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set pregunta
	 *
	 * @param string $pregunta
	 *
	 * @return EncuestaPregunta
	 */
	public function setPregunta( $pregunta ) {
		$this->pregunta = $pregunta;

		return $this;
	}

	/**
	 * Get pregunta
	 *
	 * @return string
	 */
	public function getPregunta() {
		return $this->pregunta;
	}

	/**
	 * Set orden
	 *
	 * @param integer $orden
	 *
	 * @return EncuestaPregunta
	 */
	public function setOrden( $orden ) {
		$this->orden = $orden;

		return $this;
	}

	/**
	 * Get orden
	 *
	 * @return integer
	 */
	public function getOrden() {
		return $this->orden;
	}

	/**
	 * Set cssClass
	 *
	 * @param string $cssClass
	 *
	 * @return EncuestaPregunta
	 */
	public function setCssClass( $cssClass ) {
		$this->cssClass = $cssClass;

		return $this;
	}

	/**
	 * Get cssClass
	 *
	 * @return string
	 */
	public function getCssClass() {
		return $this->cssClass;
	}

	/**
	 * Set ipc
	 *
	 * @param boolean $ipc
	 *
	 * @return EncuestaPregunta
	 */
	public function setIpc( $ipc ) {
		$this->ipc = $ipc;

		return $this;
	}

	/**
	 * Get ipc
	 *
	 * @return boolean
	 */
	public function getIpc() {
		return $this->ipc;
	}

	/**
	 * Set objetivo
	 *
	 * @param string $objetivo
	 *
	 * @return EncuestaPregunta
	 */
	public function setObjetivo( $objetivo ) {
		$this->objetivo = $objetivo;

		return $this;
	}

	/**
	 * Get objetivo
	 *
	 * @return string
	 */
	public function getObjetivo() {
		return $this->objetivo;
	}

	/**
	 * Set media
	 *
	 * @param string $media
	 *
	 * @return EncuestaPregunta
	 */
	public function setMedia( $media ) {
		$this->media = $media;

		return $this;
	}

	/**
	 * Get media
	 *
	 * @return string
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Set fechaCreacion
	 *
	 * @param \DateTime $fechaCreacion
	 *
	 * @return EncuestaPregunta
	 */
	public function setFechaCreacion( $fechaCreacion ) {
		$this->fechaCreacion = $fechaCreacion;

		return $this;
	}

	/**
	 * Set fechaActualizacion
	 *
	 * @param \DateTime $fechaActualizacion
	 *
	 * @return EncuestaPregunta
	 */
	public function setFechaActualizacion( $fechaActualizacion ) {
		$this->fechaActualizacion = $fechaActualizacion;

		return $this;
	}

	/**
	 * Set encuestaTipoPregunta
	 *
	 * @param \CRMBundle\Entity\EncuestaTipoPregunta $encuestaTipoPregunta
	 *
	 * @return EncuestaPregunta
	 */
	public function setEncuestaTipoPregunta( \CRMBundle\Entity\EncuestaTipoPregunta $encuestaTipoPregunta = null ) {
		$this->encuestaTipoPregunta = $encuestaTipoPregunta;

		return $this;
	}

	/**
	 * Get encuestaTipoPregunta
	 *
	 * @return \CRMBundle\Entity\EncuestaTipoPregunta
	 */
	public function getEncuestaTipoPregunta() {
		return $this->encuestaTipoPregunta;
	}

	/**
	 * Set encuesta
	 *
	 * @param \CRMBundle\Entity\Encuesta $encuesta
	 *
	 * @return EncuestaPregunta
	 */
	public function setEncuesta( \CRMBundle\Entity\Encuesta $encuesta = null ) {
		$this->encuesta = $encuesta;

		return $this;
	}

	/**
	 * Get encuesta
	 *
	 * @return \CRMBundle\Entity\Encuesta
	 */
	public function getEncuesta() {
		return $this->encuesta;
	}

	/**
	 * Add opcionesRespuesta
	 *
	 * @param \CRMBundle\Entity\EncuestaOpcionRespuesta $opcionesRespuesta
	 *
	 * @return EncuestaPregunta
	 */
	public function addOpcionesRespuesta( \CRMBundle\Entity\EncuestaOpcionRespuesta $opcionesRespuesta ) {
		$this->opcionesRespuestas[] = $opcionesRespuesta;

		return $this;
	}

	/**
	 * Remove opcionesRespuesta
	 *
	 * @param \CRMBundle\Entity\EncuestaOpcionRespuesta $opcionesRespuesta
	 */
	public function removeOpcionesRespuesta( \CRMBundle\Entity\EncuestaOpcionRespuesta $opcionesRespuesta ) {
		$this->opcionesRespuestas->removeElement( $opcionesRespuesta );
	}

	/**
	 * Get opcionesRespuestas
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getOpcionesRespuestas() {
		return $this->opcionesRespuestas;
	}

	/**
	 * Set creadoPor
	 *
	 * @param \UsuariosBundle\Entity\Usuario $creadoPor
	 *
	 * @return EncuestaPregunta
	 */
	public function setCreadoPor( \UsuariosBundle\Entity\Usuario $creadoPor = null ) {
		$this->creadoPor = $creadoPor;

		return $this;
	}

	/**
	 * Set actualizadoPor
	 *
	 * @param \UsuariosBundle\Entity\Usuario $actualizadoPor
	 *
	 * @return EncuestaPregunta
	 */
	public function setActualizadoPor( \UsuariosBundle\Entity\Usuario $actualizadoPor = null ) {
		$this->actualizadoPor = $actualizadoPor;

		return $this;
	}

    /**
     * Set nps
     *
     * @param boolean $nps
     *
     * @return EncuestaPregunta
     */
    public function setNps($nps)
    {
        $this->nps = $nps;

        return $this;
    }

    /**
     * Get nps
     *
     * @return boolean
     */
    public function getNps()
    {
        return $this->nps;
    }
}
