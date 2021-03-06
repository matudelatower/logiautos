<?php

namespace VehiculosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use VehiculosBundle\Entity\CheckControlInternoResultadoCabecera;
use VehiculosBundle\Form\CheckControlInternoResultadoCabeceraType;

/**
 * CheckControlInternoResultadoCabecera controller.
 *
 */
class CheckControlInternoResultadoCabeceraController extends Controller
{

    /**
     * Lists all CheckControlInternoResultadoCabecera entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VehiculosBundle:CheckControlInternoResultadoCabecera')->findAll();

        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate(
        $entities, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );

        return $this->render('VehiculosBundle:CheckControlInternoResultadoCabecera:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CheckControlInternoResultadoCabecera entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CheckControlInternoResultadoCabecera();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'CheckControlInternoResultadoCabecera creado correctamente.'
            );

            return $this->redirect($this->generateUrl('check_control_interno_resultado_cabecera_show', array('id' => $entity->getId())));
        }

        return $this->render('VehiculosBundle:CheckControlInternoResultadoCabecera:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CheckControlInternoResultadoCabecera entity.
     *
     * @param CheckControlInternoResultadoCabecera $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CheckControlInternoResultadoCabecera $entity)
    {
        $form = $this->createForm(new CheckControlInternoResultadoCabeceraType(), $entity, array(
            'action' => $this->generateUrl('check_control_interno_resultado_cabecera_create'),
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
     * Displays a form to create a new CheckControlInternoResultadoCabecera entity.
     *
     */
    public function newAction()
    {
        $entity = new CheckControlInternoResultadoCabecera();
        $form   = $this->createCreateForm($entity);

        return $this->render('VehiculosBundle:CheckControlInternoResultadoCabecera:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CheckControlInternoResultadoCabecera entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:CheckControlInternoResultadoCabecera')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CheckControlInternoResultadoCabecera entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VehiculosBundle:CheckControlInternoResultadoCabecera:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CheckControlInternoResultadoCabecera entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:CheckControlInternoResultadoCabecera')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CheckControlInternoResultadoCabecera entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VehiculosBundle:CheckControlInternoResultadoCabecera:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CheckControlInternoResultadoCabecera entity.
    *
    * @param CheckControlInternoResultadoCabecera $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CheckControlInternoResultadoCabecera $entity)
    {
        $form = $this->createForm(new CheckControlInternoResultadoCabeceraType(), $entity, array(
            'action' => $this->generateUrl('check_control_interno_resultado_cabecera_update', array('id' => $entity->getId())),
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
     * Edits an existing CheckControlInternoResultadoCabecera entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VehiculosBundle:CheckControlInternoResultadoCabecera')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CheckControlInternoResultadoCabecera entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'CheckControlInternoResultadoCabecera actualizado correctamente.'
            );

            return $this->redirect($this->generateUrl('check_control_interno_resultado_cabecera_edit', array('id' => $id)));
        }

        return $this->render('VehiculosBundle:CheckControlInternoResultadoCabecera:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CheckControlInternoResultadoCabecera entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VehiculosBundle:CheckControlInternoResultadoCabecera')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CheckControlInternoResultadoCabecera entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('check_control_interno_resultado_cabecera'));
    }

    /**
     * Creates a form to delete a CheckControlInternoResultadoCabecera entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('check_control_interno_resultado_cabecera_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
