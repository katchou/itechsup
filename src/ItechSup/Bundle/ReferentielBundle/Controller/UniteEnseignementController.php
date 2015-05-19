<?php

namespace ItechSup\Bundle\ReferentielBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ItechSup\Bundle\ReferentielBundle\Entity\UniteEnseignement;
use ItechSup\Bundle\ReferentielBundle\Form\UniteEnseignementType;

/**
 * UniteEnseignement controller.
 *
 * @Route("/ue")
 */
class UniteEnseignementController extends Controller
{

    /**
     * Lists all UniteEnseignement entities.
     *
     * @Route("/", name="ue")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ItechSupReferentielBundle:UniteEnseignement')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new UniteEnseignement entity.
     *
     * @Route("/", name="ue_create")
     * @Method("POST")
     * @Template("ItechSupReferentielBundle:UniteEnseignement:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new UniteEnseignement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ue_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a UniteEnseignement entity.
     *
     * @param UniteEnseignement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UniteEnseignement $entity)
    {
        $form = $this->createForm(new UniteEnseignementType(), $entity, array(
            'action' => $this->generateUrl('ue_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UniteEnseignement entity.
     *
     * @Route("/new", name="ue_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new UniteEnseignement();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a UniteEnseignement entity.
     *
     * @Route("/{id}", name="ue_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:UniteEnseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UniteEnseignement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing UniteEnseignement entity.
     *
     * @Route("/{id}/edit", name="ue_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:UniteEnseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UniteEnseignement entity.');
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
    * Creates a form to edit a UniteEnseignement entity.
    *
    * @param UniteEnseignement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UniteEnseignement $entity)
    {
        $form = $this->createForm(new UniteEnseignementType(), $entity, array(
            'action' => $this->generateUrl('ue_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UniteEnseignement entity.
     *
     * @Route("/{id}", name="ue_update")
     * @Method("PUT")
     * @Template("ItechSupReferentielBundle:UniteEnseignement:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:UniteEnseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UniteEnseignement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ue_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a UniteEnseignement entity.
     *
     * @Route("/{id}", name="ue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ItechSupReferentielBundle:UniteEnseignement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UniteEnseignement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ue'));
    }

    /**
     * Creates a form to delete a UniteEnseignement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ue_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
