<?php

namespace pfe\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pfe\FrontBundle\Entity\CodeProduit;
use pfe\FrontBundle\Form\CodeProduitType;

/**
 * CodeProduit controller.
 *
 */
class CodeProduitController extends Controller
{

    /**
     * Lists all CodeProduit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('pfeFrontBundle:CodeProduit')->findAll();

        return $this->render('pfeFrontBundle:CodeProduit:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CodeProduit entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CodeProduit();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('produit_show', array('id' => $entity->getId())));
        }

        return $this->render('pfeFrontBundle:CodeProduit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CodeProduit entity.
     *
     * @param CodeProduit $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CodeProduit $entity)
    {
        $form = $this->createForm(new CodeProduitType(), $entity, array(
            'action' => $this->generateUrl('produit_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CodeProduit entity.
     *
     */
    public function newAction()
    {
        $entity = new CodeProduit();
        $form   = $this->createCreateForm($entity);

        return $this->render('pfeFrontBundle:CodeProduit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CodeProduit entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:CodeProduit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CodeProduit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pfeFrontBundle:CodeProduit:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CodeProduit entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:CodeProduit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CodeProduit entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pfeFrontBundle:CodeProduit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CodeProduit entity.
    *
    * @param CodeProduit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CodeProduit $entity)
    {
        $form = $this->createForm(new CodeProduitType(), $entity, array(
            'action' => $this->generateUrl('produit_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CodeProduit entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:CodeProduit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CodeProduit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('produit_edit', array('id' => $id)));
        }

        return $this->render('pfeFrontBundle:CodeProduit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CodeProduit entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('pfeFrontBundle:CodeProduit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CodeProduit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('produit'));
    }

    /**
     * Creates a form to delete a CodeProduit entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produit_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
