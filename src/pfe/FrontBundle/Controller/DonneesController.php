<?php

namespace pfe\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pfe\FrontBundle\Entity\Donnees;
use pfe\FrontBundle\Form\DonneesType;

/**
 * Donnees controller.
 *
 */
class DonneesController extends Controller
{

    /**
     * Lists all Donnees entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('pfeFrontBundle:Donnees')->findAll();

        return $this->render('pfeFrontBundle:Donnees:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Donnees entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Donnees();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
        //var_dump($entity);die(); exit;
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('donnees_show', array('id' => $entity->getId())));
        }

        return $this->render('pfeFrontBundle:Donnees:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Donnees entity.
     *
     * @param Donnees $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Donnees $entity)
    {
        $form = $this->createForm(new DonneesType(), $entity, array(
            'action' => $this->generateUrl('donnees_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Donnees entity.
     *
     */
    public function newAction()
    {
        $entity = new Donnees();
        $form   = $this->createCreateForm($entity);

        return $this->render('pfeFrontBundle:Donnees:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Donnees entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:Donnees')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Donnees entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pfeFrontBundle:Donnees:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Donnees entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:Donnees')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Donnees entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pfeFrontBundle:Donnees:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Donnees entity.
    *
    * @param Donnees $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Donnees $entity)
    {
        $form = $this->createForm(new DonneesType(), $entity, array(
            'action' => $this->generateUrl('donnees_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Donnees entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:Donnees')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Donnees entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('donnees_edit', array('id' => $id)));
        }

        return $this->render('pfeFrontBundle:Donnees:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Donnees entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('pfeFrontBundle:Donnees')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Donnees entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('donnees'));
    }

    /**
     * Creates a form to delete a Donnees entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('donnees_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', [
                'label' => 'Delete',
                'attr' => [
                    'class' => 'btn red  btn-lg pull-right',
                ],
            ])
            ->getForm()
        ;
    }
}
