<?php

namespace VehiculosBundle\Form\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VehiculosBundle\Form\EventListener\AddAnioCodigoVersionFieldSubscriber;
use Doctrine\ORM\EntityRepository;

class VehiculosPlanAhorroFilterType extends AbstractType {

	private $em;

	public function __construct( $em ) {
		$this->em = $em;
	}

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$factory = $builder->getFormFactory();
		$builder->addEventSubscriber( new AddAnioCodigoVersionFieldSubscriber( $factory, $this->em ) );
		$builder
			->add( 'modelo',
				'entity',
				array(
					'class'        => 'VehiculosBundle:NombreModelo',
					'choice_label' => 'nombre',
					'required'     => false,
					'attr'         => array( 'class' => 'modelo' )
				) )
			->add( 'colorVehiculo',
				'entity',
				array(
					'class'        => 'VehiculosBundle:ColorVehiculo',
					'choice_label' => 'color',
					'required'     => false,
				) )
			->add( 'deposito',
				'entity',
				array(
					'class'        => 'VehiculosBundle:Deposito',
					'choice_label' => 'nombre',
					'required'     => false,
				) )
			->add( 'diaInicio',
				'integer',
				array(
					'required' => false,
					'attr'     => array(
						'class'     => 'bfh-number',
						'min'       => '0',
						'step'      => '1',
						'data-bind' => 'value:replyNumber'
					)
				) )
			->add( 'diaFin',
				'integer',
				array(
					'required' => false,
					'attr'     => array(
						'class'     => 'bfh-number',
						'min'       => '0',
						'step'      => '1',
						'data-bind' => 'value:replyNumber'
					)
				) )
			->add( 'patentado',
				'choice',
				array(
					'required' => false,
					'choices'  => array(
						null => null,
						'si' => 'Si',
						'no' => 'No'
					)
				) )
			->add( 'rango',
				'text',
				array(
					'required' => false,
					'label'    => 'Fecha de facturacion',
					'attr'     => array( 'class' => 'daterange' )
				) );
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( array(
			'csrf_protection' => false
		) );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'vehiculosbundle_vehiculos_plan_ahorro_filter';
	}

}
