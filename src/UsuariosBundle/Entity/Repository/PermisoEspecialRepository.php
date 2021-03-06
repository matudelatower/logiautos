<?php

namespace UsuariosBundle\Entity\Repository;

/**
 * PermisoEspecialRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PermisoEspecialRepository extends \Doctrine\ORM\EntityRepository
{
	public function getByLike( $string, $extraParam = null ) {

		$em = $this->getEntityManager();

		$consulta = $em->createQuery( 'SELECT pe
                                          FROM UsuariosBundle:PermisoEspecial pe
                                          WHERE upper(pe.descripcion) LIKE upper(:string)
                                     ' );


		$consulta->setParameter( 'string', '%' . $string . '%' );


		$return = $consulta->getArrayResult();

		return $return;
	}
}
