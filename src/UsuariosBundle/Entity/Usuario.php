<?php

/**
 * Created by PhpStorm.
 * User: matias
 * Date: 29/9/15
 * Time: 20:29
 */

namespace UsuariosBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="UsuariosBundle\Entity\Repository\UsuarioRepository")
 * @ORM\Table(name="fos_user")
 * @UniqueEntity("username")
 */
class Usuario extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

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
     * @ORM\OneToMany(targetEntity="UsuariosBundle\Entity\UsuarioGrupo", mappedBy="usuario",cascade={"persist"})
     */
    private $grupos;

    /**
     * @ORM\OneToMany(targetEntity="PersonasBundle\Entity\PersonaTipo", mappedBy="usuario",cascade={"persist"})
     */
    private $personaTipo;

    /**
     *
     * Devuelve true si tiene el permiso especial asignado o false si no lo tiene
     *
     * @param $slugPermisoEspecial es el slug del permiso especial
     *
     * @return bool
     */
    public function tienePermisoEspecial($slugPermisoEspecial) {
        foreach ($this->getGrupos() as $usuarioGrupo) {
            $grupo = $usuarioGrupo->getGrupo();
            foreach ($grupo->getPermisoEspecialGrupo() as $permisoEspecialGrupo) {
                if ($permisoEspecialGrupo->getPermisoEspecial()->getSlug() == $slugPermisoEspecial) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Set creado
     *
     * @param \DateTime $creado
     *
     * @return Usuario
     */
    public function setCreado($creado) {
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
     * @return Usuario
     */
    public function setActualizado($actualizado) {
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
     * @return Usuario
     */
    public function setCreadoPor(\UsuariosBundle\Entity\Usuario $creadoPor = null) {
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
     * @return Usuario
     */
    public function setActualizadoPor(\UsuariosBundle\Entity\Usuario $actualizadoPor = null) {
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
     * Add grupo
     *
     * @param \UsuariosBundle\Entity\UsuarioGrupo $grupo
     *
     * @return Usuario
     */
    public function addGrupo(\UsuariosBundle\Entity\UsuarioGrupo $grupo) {
        $this->grupos[] = $grupo;

        return $this;
    }

    /**
     * Remove grupo
     *
     * @param \UsuariosBundle\Entity\UsuarioGrupo $grupo
     */
    public function removeGrupo(\UsuariosBundle\Entity\UsuarioGrupo $grupo) {
        $this->grupos->removeElement($grupo);
    }

    /**
     * Get grupos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGrupos() {
        return $this->grupos;
    }

    /**
     * Add personaTipo
     *
     * @param \PersonasBundle\Entity\PersonaTipo $personaTipo
     *
     * @return Usuario
     */
    public function addPersonaTipo(\PersonasBundle\Entity\PersonaTipo $personaTipo) {
        $this->personaTipo[] = $personaTipo;

        return $this;
    }

    /**
     * Remove personaTipo
     *
     * @param \PersonasBundle\Entity\PersonaTipo $personaTipo
     */
    public function removePersonaTipo(\PersonasBundle\Entity\PersonaTipo $personaTipo) {
        $this->personaTipo->removeElement($personaTipo);
    }

    /**
     * Get personaTipo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonaTipo() {
        return $this->personaTipo;
    }

}
