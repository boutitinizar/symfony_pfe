<?php

namespace pfe\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pfe\FrontBundle\Entity\TestResult;
use pfe\FrontBundle\Form\TestResultType;
use pfe\FrontBundle\Filter\ArchiveItemFilterType;

/**
 * TestResult controller.
 *
 */
class TestResultController extends Controller
{

    /**
     * Lists all TestResult entities.
     *
     */
    public function indexAction(Request $request)
    {


        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('pfeFrontBundle:TestResult')
            ->createQueryBuilder('e');

        $form = $this->get('form.factory')->create(new ArchiveItemFilterType());
        if ($request->query->has($form->getName())) {
            // manually bind values from the request
            $form->submit($request->query->get($form->getName()));
            // build the query from the given form object
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }
        $query = $filterBuilder->getQuery();



        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        $data = $query->getArrayResult();
        return $this->render('pfeFrontBundle:TestResult:index.html.twig', array(
            'pagination' => $pagination,
            'form' => $form->createView(),
        ));
    }
    /**
     * Creates a new TestResult entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TestResult();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('archive_show', array('id' => $entity->getId())));
        }

        return $this->render('pfeFrontBundle:TestResult:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TestResult entity.
     *
     * @param TestResult $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TestResult $entity)
    {
        $form = $this->createForm(new TestResultType(), $entity, array(
            'action' => $this->generateUrl('archive_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TestResult entity.
     *
     */
    public function newAction()
    {
        $entity = new TestResult();
        $form   = $this->createCreateForm($entity);

        return $this->render('pfeFrontBundle:TestResult:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TestResult entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:TestResult')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestResult entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pfeFrontBundle:TestResult:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TestResult entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:TestResult')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestResult entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pfeFrontBundle:TestResult:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TestResult entity.
    *
    * @param TestResult $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TestResult $entity)
    {
        $form = $this->createForm(new TestResultType(), $entity, array(
            'action' => $this->generateUrl('archive_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TestResult entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pfeFrontBundle:TestResult')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestResult entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('archive_edit', array('id' => $id)));
        }

        return $this->render('pfeFrontBundle:TestResult:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TestResult entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('pfeFrontBundle:TestResult')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TestResult entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('archive'));
    }

    /**
     * Creates a form to delete a TestResult entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('archive_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
