<?php

namespace ItechSup\Bundle\ReferentielBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ItechSup\Bundle\ReferentielBundle\Entity\ItemEnseignement;
use ItechSup\Bundle\ReferentielBundle\Form\ItemEnseignementType;

/**
 * ItemEnseignement controller.
 *
 * @Route("/item")
 */
class ItemEnseignementController extends Controller
{

    /**
     * Lists all ItemEnseignement entities.
     *
     * @Route("/", name="itemenseignement")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ItechSupReferentielBundle:ItemEnseignement')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ItemEnseignement entity.
     *
     * @Route("/", name="itemenseignement_create")
     * @Method("POST")
     * @Template("ItechSupReferentielBundle:ItemEnseignement:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ItemEnseignement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('itemenseignement_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ItemEnseignement entity.
     *
     * @param ItemEnseignement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ItemEnseignement $entity)
    {
        $form = $this->createForm(new ItemEnseignementType(), $entity, array(
            'action' => $this->generateUrl('itemenseignement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ItemEnseignement entity.
     *
     * @Route("/new", name="itemenseignement_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ItemEnseignement();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ItemEnseignement entity.
     *
     * @Route("/{id}", name="itemenseignement_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:ItemEnseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ItemEnseignement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ItemEnseignement entity.
     *
     * @Route("/{id}/edit", name="itemenseignement_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:ItemEnseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ItemEnseignement entity.');
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
    * Creates a form to edit a ItemEnseignement entity.
    *
    * @param ItemEnseignement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ItemEnseignement $entity)
    {
        $form = $this->createForm(new ItemEnseignementType(), $entity, array(
            'action' => $this->generateUrl('itemenseignement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ItemEnseignement entity.
     *
     * @Route("/{id}", name="itemenseignement_update")
     * @Method("PUT")
     * @Template("ItechSupReferentielBundle:ItemEnseignement:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ItechSupReferentielBundle:ItemEnseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ItemEnseignement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('itemenseignement_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ItemEnseignement entity.
     *
     * @Route("/{id}", name="itemenseignement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ItechSupReferentielBundle:ItemEnseignement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ItemEnseignement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('itemenseignement'));
    }

    /**
     * Creates a form to delete a ItemEnseignement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('itemenseignement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
