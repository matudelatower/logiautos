<?php

namespace VehiculosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use VehiculosBundle\Entity\AgenteInicioPatente;
use VehiculosBundle\Form\AgenteInicioPatenteType;
use UsuariosBundle\Controller\TokenAuthenticatedController;
/**
 * AgenteInicioPatente controller.
 *
 */
class AgenteInicioPatenteController extends Controller implements TokenAuthenticatedController{

    /**
     * Lists all AgenteInicioPatente entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VehiculosBundle:AgenteInicioPatente')->findAll();

        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate(
        $entities, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );

        return $this->render('VehiculosBundle:AgenteInicioPatente:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new AgenteInicioPatente entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new AgenteInicioPatente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'AgenteInicioPatente creado correctamente.'
            );

            return $this->redirect($this->generateUrl('agente_inicio_patente_show', array('id' => $entity->getId())));
        }

        return $this->render('VehiculosBundle:AgenteInicioPatente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a AgenteInicioPatente entity.
     *
     * @param AgenteInicioPatente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AgenteInicioPatente $entity)
    {
        $form = $this->createForm(new AgenteInicioPatenteType(), $entity, array(
            'action' => $this->generateUrl('agente_inicio_patente_create'),
            'method' => 'POST',
            'attr' => array('class' => 'box-body')
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Crear',
            'attr' => array('class' => 'btn btn-primary pull-right')
        ));

        return $form;
    }

    /**
     * Displays a form to create a new AgenteInicioPatente entity.
     *
     */
    public function newAction()
    {
        $entity = new AgenteInicioPatente();
        $form   = $this->createCreateForm($entity);

        return $this->render('VehiculosBundle:AgenteInicioPatente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AgenteInicioPatente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:AgenteInicioPatente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AgenteInicioPatente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VehiculosBundle:AgenteInicioPatente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AgenteInicioPatente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:AgenteInicioPatente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AgenteInicioPatente entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VehiculosBundle:AgenteInicioPatente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a AgenteInicioPatente entity.
    *
    * @param AgenteInicioPatente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AgenteInicioPatente $entity)
    {
        $form = $this->createForm(new AgenteInicioPatenteType(), $entity, array(
            'action' => $this->generateUrl('agente_inicio_patente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('class' => 'box-body')
        ));

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
     * Edits an existing AgenteInicioPatente entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:AgenteInicioPatente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AgenteInicioPatente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'AgenteInicioPatente actualizado correctamente.'
            );

            return $this->redirect($this->generateUrl('agente_inicio_patente_edit', array('id' => $id)));
        }

        return $this->render('VehiculosBundle:AgenteInicioPatente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a AgenteInicioPatente entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VehiculosBundle:AgenteInicioPatente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AgenteInicioPatente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('agente_inicio_patente'));
    }

    /**
     * Creates a form to delete a AgenteInicioPatente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agente_inicio_patente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
