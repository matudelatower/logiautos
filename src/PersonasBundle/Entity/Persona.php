<?php

namespace PersonasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Persona
 *
 * @ORM\Table(name="personas")
 * @ORM\Entity(repositoryClass="PersonasBundle\Entity\PersonaRepository")
 * @UniqueEntity("numeroDocumento")
 */
class Persona {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nombre", type="string", length=255)
	 */
	private $nombre;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="apellido", type="string", length=255)
	 */
	private $apellido;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="numero_documento", type="string", length=255)
	 */
	private $numeroDocumento;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
	 */
	private $telefono;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="telefono_laboral", type="string", length=255, nullable=true)
	 */
	private $telefonoLaboral;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="celular", type="string", length=255, nullable=true)
	 */
	private $celular;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="mail", type="string", length=255, nullable=true)
	 */
	private $mail;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="web", type="string", length=255, nullable=true)
	 */
	private $web;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="fecha_nacimiento", type="datetime", nullable=true)
	 */
	private $fechaNacimiento;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="calle", type="string", length=255, nullable=true)
	 */
	private $calle;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="numero_calle", type="string", length=255, nullable=true)
	 */
	private $numeroCalle;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="barrio", type="string", length=255, nullable=true)
	 */
	private $barrio;

	/**
	 * @var text
	 *
	 * @ORM\Column(name="observacion", type="text", nullable=true)
	 */
	private $observacion;


	/**
	 * @var datetime $creado
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(name="creado", type="datetime")
	 */
	private $creado;

	/**
	 * @var datetime $actualizado
	 *
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(name="actualizado",type="datetime")
	 */
	private $actualizado;

	/**
	 * @var integer $creadoPor
	 *
	 * @Gedmo\Blameable(on="create")
	 * @ORM\ManyToOne(targetEntity="UsuariosBundle\Entity\Usuario")
	 * @ORM\JoinColumn(name="creado_por", referencedColumnName="id", nullable=true)
	 */
	private $creadoPor;

	/**
	 * @var integer $actualizadoPor
	 *
	 * @Gedmo\Blameable(on="update")
	 * @ORM\ManyToOne(targetEntity="UsuariosBundle\Entity\Usuario")
	 * @ORM\JoinColumn(name="actualizado_por", referencedColumnName="id", nullable=true)
	 */
	private $actualizadoPor;

	/**
	 * @ORM\ManyToOne(targetEntity="PersonasBundle\Entity\TipoDocumento")
	 * @ORM\JoinColumn(name="tipo_documento_id", referencedColumnName="id")
	 */
	private $tipoDocumento;

	/**
	 * @ORM\ManyToOne(targetEntity="PersonasBundle\Entity\EstadoCivil")
	 * @ORM\JoinColumn(name="estado_civil_id", referencedColumnName="id")
	 */
	private $estadoCivil;

	/**
	 * @ORM\OneToMany(targetEntity="PersonasBundle\Entity\PersonaTipo", mappedBy="persona", cascade={"persist"})
	 *
	 */
	private $personaTipo;

	/**
	 * @ORM\ManyToOne(targetEntity="UbicacionBundle\Entity\Localidad")
	 * @ORM\JoinColumn(name="localidad_id", referencedColumnName="id", nullable=true)
	 */
	private $localidad;

	public function __toString() {
		return $this->apellido . ', ' . $this->nombre;
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
	 * Set nombre
	 *
	 * @param string $nombre
	 *
	 * @return Persona
	 */
	public function setNombre( $nombre ) {
		$this->nombre = $nombre;

		return $this;
	}

	/**
	 * Get nombre
	 *
	 * @return string
	 */
	public function getNombre() {
		return $this->nombre;
	}

	/**
	 * Set apellido
	 *
	 * @param string $apellido
	 *
	 * @return Persona
	 */
	public function setApellido( $apellido ) {
		$this->apellido = $apellido;

		return $this;
	}

	/**
	 * Get apellido
	 *
	 * @return string
	 */
	public function getApellido() {
		return $this->apellido;
	}

	/**
	 * Set numeroDocumento
	 *
	 * @param string $numeroDocumento
	 *
	 * @return Persona
	 */
	public function setNumeroDocumento( $numeroDocumento ) {
		$this->numeroDocumento = $numeroDocumento;

		return $this;
	}

	/**
	 * Get numeroDocumento
	 *
	 * @return string
	 */
	public function getNumeroDocumento() {
		return $this->numeroDocumento;
	}

	/**
	 * Set telefono
	 *
	 * @param string $telefono
	 *
	 * @return Persona
	 */
	public function setTelefono( $telefono ) {
		$this->telefono = $telefono;

		return $this;
	}

	/**
	 * Get telefono
	 *
	 * @return string
	 */
	public function getTelefono() {
		return $this->telefono;
	}

	/**
	 * Set celular
	 *
	 * @param string $celular
	 *
	 * @return Persona
	 */
	public function setCelular( $celular ) {
		$this->celular = $celular;

		return $this;
	}

	/**
	 * Get celular
	 *
	 * @return string
	 */
	public function getCelular() {
		return $this->celular;
	}

	/**
	 * Set mail
	 *
	 * @param string $mail
	 *
	 * @return Persona
	 */
	public function setMail( $mail ) {
		$this->mail = $mail;

		return $this;
	}

	/**
	 * Get mail
	 *
	 * @return string
	 */
	public function getMail() {
		return $this->mail;
	}

	/**
	 * Set web
	 *
	 * @param string $web
	 *
	 * @return Persona
	 */
	public function setWeb( $web ) {
		$this->web = $web;

		return $this;
	}

	/**
	 * Get web
	 *
	 * @return string
	 */
	public function getWeb() {
		return $this->web;
	}

	/**
	 * Set fechaNacimiento
	 *
	 * @param \DateTime $fechaNacimiento
	 *
	 * @return Persona
	 */
	public function setFechaNacimiento( $fechaNacimiento ) {
		$this->fechaNacimiento = $fechaNacimiento;

		return $this;
	}

	/**
	 * Get fechaNacimiento
	 *
	 * @return \DateTime
	 */
	public function getFechaNacimiento() {
		return $this->fechaNacimiento;
	}

	/**
	 * Set calle
	 *
	 * @param string $calle
	 *
	 * @return Persona
	 */
	public function setCalle( $calle ) {
		$this->calle = $calle;

		return $this;
	}

	/**
	 * Get calle
	 *
	 * @return string
	 */
	public function getCalle() {
		return $this->calle;
	}

	/**
	 * Set numeroCalle
	 *
	 * @param string $numeroCalle
	 *
	 * @return Persona
	 */
	public function setNumeroCalle( $numeroCalle ) {
		$this->numeroCalle = $numeroCalle;

		return $this;
	}

	/**
	 * Get numeroCalle
	 *
	 * @return string
	 */
	public function getNumeroCalle() {
		return $this->numeroCalle;
	}

	/**
	 * Set barrio
	 *
	 * @param string $barrio
	 *
	 * @return Persona
	 */
	public function setBarrio( $barrio ) {
		$this->barrio = $barrio;

		return $this;
	}

	/**
	 * Get barrio
	 *
	 * @return string
	 */
	public function getBarrio() {
		return $this->barrio;
	}

	/**
	 * Set creado
	 *
	 * @param \DateTime $creado
	 *
	 * @return Persona
	 */
	public function setCreado( $creado ) {
		$this->creado = $creado;

		return $this;
	}

	/**
	 * Get creado
	 *
	 * @return \DateTime
	 */
	public function getCreado() {
		return $this->creado;
	}

	/**
	 * Set actualizado
	 *
	 * @param \DateTime $actualizado
	 *
	 * @return Persona
	 */
	public function setActualizado( $actualizado ) {
		$this->actualizado = $actualizado;

		return $this;
	}

	/**
	 * Get actualizado
	 *
	 * @return \DateTime
	 */
	public function getActualizado() {
		return $this->actualizado;
	}

	/**
	 * Set creadoPor
	 *
	 * @param \UsuariosBundle\Entity\Usuario $creadoPor
	 *
	 * @return Persona
	 */
	public function setCreadoPor( \UsuariosBundle\Entity\Usuario $creadoPor = null ) {
		$this->creadoPor = $creadoPor;

		return $this;
	}

	/**
	 * Get creadoPor
	 *
	 * @return \UsuariosBundle\Entity\Usuario
	 */
	public function getCreadoPor() {
		return $this->creadoPor;
	}

	/**
	 * Set actualizadoPor
	 *
	 * @param \UsuariosBundle\Entity\Usuario $actualizadoPor
	 *
	 * @return Persona
	 */
	public function setActualizadoPor( \UsuariosBundle\Entity\Usuario $actualizadoPor = null ) {
		$this->actualizadoPor = $actualizadoPor;

		return $this;
	}

	/**
	 * Get actualizadoPor
	 *
	 * @return \UsuariosBundle\Entity\Usuario
	 */
	public function getActualizadoPor() {
		return $this->actualizadoPor;
	}

	/**
	 * Set tipoDocumento
	 *
	 * @param \PersonasBundle\Entity\TipoDocumento $tipoDocumento
	 *
	 * @return Persona
	 */
	public function setTipoDocumento( \PersonasBundle\Entity\TipoDocumento $tipoDocumento = null ) {
		$this->tipoDocumento = $tipoDocumento;

		return $this;
	}

	/**
	 * Get tipoDocumento
	 *
	 * @return \PersonasBundle\Entity\TipoDocumento
	 */
	public function getTipoDocumento() {
		return $this->tipoDocumento;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->personaTipo = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Add personaTipo
	 *
	 * @param \PersonasBundle\Entity\PersonaTipo $personaTipo
	 *
	 * @return Persona
	 */
	public function addPersonaTipo( \PersonasBundle\Entity\PersonaTipo $personaTipo ) {
		$this->personaTipo[] = $personaTipo;

		return $this;
	}

	/**
	 * Remove personaTipo
	 *
	 * @param \PersonasBundle\Entity\PersonaTipo $personaTipo
	 */
	public function removePersonaTipo( \PersonasBundle\Entity\PersonaTipo $personaTipo ) {
		$this->personaTipo->removeElement( $personaTipo );
	}

	/**
	 * Get personaTipo
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getPersonaTipo() {
		return $this->personaTipo;
	}

	/**
	 * Set localidad
	 *
	 * @param \UbicacionBundle\Entity\Localidad $localidad
	 *
	 * @return Persona
	 */
	public function setLocalidad( \UbicacionBundle\Entity\Localidad $localidad = null ) {
		$this->localidad = $localidad;

		return $this;
	}

	/**
	 * Get localidad
	 *
	 * @return \UbicacionBundle\Entity\Localidad
	 */
	public function getLocalidad() {
		return $this->localidad;
	}

	/**
	 * Set telefonoLaboral
	 *
	 * @param string $telefonoLaboral
	 *
	 * @return Persona
	 */
	public function setTelefonoLaboral( $telefonoLaboral ) {
		$this->telefonoLaboral = $telefonoLaboral;

		return $this;
	}

	/**
	 * Get telefonoLaboral
	 *
	 * @return string
	 */
	public function getTelefonoLaboral() {
		return $this->telefonoLaboral;
	}


	/**
	 * Set estadoCivil
	 *
	 * @param \PersonasBundle\Entity\EstadoCivil $estadoCivil
	 *
	 * @return Persona
	 */
	public function setEstadoCivil( \PersonasBundle\Entity\EstadoCivil $estadoCivil = null ) {
		$this->estadoCivil = $estadoCivil;

		return $this;
	}

	/**
	 * Get estadoCivil
	 *
	 * @return \PersonasBundle\Entity\EstadoCivil
	 */
	public function getEstadoCivil() {
		return $this->estadoCivil;
	}

	/**
	 * Set observacion
	 *
	 * @param string $observacion
	 *
	 * @return Persona
	 */
	public function setObservacion( $observacion ) {
		$this->observacion = $observacion;

		return $this;
	}

	/**
	 * Get observacion
	 *
	 * @return string
	 */
	public function getObservacion() {
		return $this->observacion;
	}
}
