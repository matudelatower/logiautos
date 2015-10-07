<?php

namespace VehiculosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use VehiculosBundle\Entity\Vehiculo;
use VehiculosBundle\Form\VehiculoType;

/**
 * Vehiculo controller.
 *
 */
class VehiculoController extends Controller
{

    /**
     * Lists all Vehiculo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VehiculosBundle:Vehiculo')->findAll();

        return $this->render(
            'VehiculosBundle:Vehiculo:index.html.twig',
            array(
                'entities' => $entities,
            )
        );
    }

    /**
     * Creates a new Vehiculo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Vehiculo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'Vehiculo creado correctamente.'
            );

            return $this->redirect($this->generateUrl('vehiculos_show', array('id' => $entity->getId())));
        }

        return $this->render(
            'VehiculosBundle:Vehiculo:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a Vehiculo entity.
     *
     * @param Vehiculo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Vehiculo $entity)
    {
        $form = $this->createForm(
            new VehiculoType(),
            $entity,
            array(
                'action' => $this->generateUrl('vehiculos_create'),
                'method' => 'POST',
                'attr' => array('class' => 'box-body')
            )
        );

        $form->add(
            'submit',
            'submit',
            array(
                'label' => 'Crear',
                'attr' => array('class' => 'btn btn-primary pull-right')
            )
        );

        return $form;
    }

    /**
     * Displays a form to create a new Vehiculo entity.
     *
     */
    public function newAction()
    {
        $entity = new Vehiculo();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'VehiculosBundle:Vehiculo:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Vehiculo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:Vehiculo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehiculo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'VehiculosBundle:Vehiculo:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing Vehiculo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:Vehiculo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehiculo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'VehiculosBundle:Vehiculo:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a Vehiculo entity.
     *
     * @param Vehiculo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Vehiculo $entity)
    {
        $form = $this->createForm(
            new VehiculoType(),
            $entity,
            array(
                'action' => $this->generateUrl('vehiculos_update', array('id' => $entity->getId())),
                'method' => 'PUT',
                'attr' => array('class' => 'box-body')
            )
        );

        $form->add(
            'submit',
            'submit',
            array(
                'label' => 'Actualizar',
                'attr' => array('class' => 'btn btn-primary pull-right'),
            )
        );

        return $form;
    }

    /**
     * Edits an existing Vehiculo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:Vehiculo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehiculo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'Vehiculo actualizado correctamente.'
            );

            return $this->redirect($this->generateUrl('vehiculos_edit', array('id' => $id)));
        }

        return $this->render(
            'VehiculosBundle:Vehiculo:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Vehiculo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VehiculosBundle:Vehiculo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vehiculo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vehiculos'));
    }

    /**
     * Creates a form to delete a Vehiculo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehiculos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
