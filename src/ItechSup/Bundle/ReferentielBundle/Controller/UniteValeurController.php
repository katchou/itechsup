<?php

namespace ItechSup\Bundle\ReferentielBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ItechSup\Bundle\ReferentielBundle\Entity\UniteValeur;
use ItechSup\Bundle\ReferentielBundle\Form\UniteValeurType;

/**
 * UniteValeur controller.
 *
 * @Route("/uv")
 */
class UniteValeurController extends Controller
{

    /**
     * Lists all UniteValeur entities.
     *
     * @Route("/", name="uv")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ItechSupReferentielBundle:UniteValeur')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new UniteValeur entity.
     *
     * @Route("/", name="uv_create")
     * @Method("POST")
     * @Template("ItechSupReferentielBundle:UniteValeur:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new UniteValeur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('uv_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a UniteValeur entity.
     *
     * @param UniteValeur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UniteValeur $entity)
    {
        $form = $this->createForm(new UniteValeurType(), $entity, array(
            'action' => $this->generateUrl('uv_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UniteValeur entity.
     *
     * @Route("/new", name="uv_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new UniteValeur();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a UniteValeur entity.
     *
     * @Route("/{id}", name="uv_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:UniteValeur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UniteValeur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing UniteValeur entity.
     *
     * @Route("/{id}/edit", name="uv_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:UniteValeur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UniteValeur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a UniteValeur entity.
    *
    * @param UniteValeur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UniteValeur $entity)
    {
        $form = $this->createForm(new UniteValeurType(), $entity, array(
            'action' => $this->generateUrl('uv_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UniteValeur entity.
     *
     * @Route("/{id}", name="uv_update")
     * @Method("PUT")
     * @Template("ItechSupReferentielBundle:UniteValeur:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:UniteValeur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UniteValeur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('uv_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a UniteValeur entity.
     *
     * @Route("/{id}", name="uv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ItechSupReferentielBundle:UniteValeur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UniteValeur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('uv'));
    }

    /**
     * Creates a form to delete a UniteValeur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('uv_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
