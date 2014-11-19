<?php

namespace Passport\Bundle\TreeviewBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Passport\Bundle\TreeviewBundle\Entity\Factory;
use Passport\Bundle\TreeviewBundle\Form\FactoryType;

use Passport\Bundle\TreeviewBundle\Entity\Child;
use Passport\Bundle\TreeviewBundle\Form\ChildType;

/**
 * Factory controller.
 *
 * @Route("/factory")
 */
class FactoryController extends Controller
{

    /**
     * Lists all Factory entities.
     *
     * @Route("/", name="factory")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PassportTreeviewBundle:Factory')->findAll();
        $children = "";
        foreach($entities as $entity){
            $children[$entity->getId()] = $em->getRepository('PassportTreeviewBundle:Child')->findByParent($entity);
        }
        return array(
            'entities' => $entities,
            'children' => $children
        );
    }
    /**
     * Creates a new Factory entity.
     *
     * @Route("/", name="factory_create")
     * @Method("POST")
     * @Template("PassportTreeviewBundle:Factory:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Factory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            if($entity->getMax() <= $entity->getMin()){
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Min value should be less than Max value!'
                );
            }else{
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                for($i=1; $i<=$entity->getChildren(); $i++){
                    $child = new Child();
                    $child->setValue(rand($entity->getMin(), $entity->getMax()));
                    $child->setParent($entity);
                    $em->persist($child);
                    $em->flush();
                }
                $em->flush();
    
                return $this->redirect($this->generateUrl('factory'));
            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Factory entity.
     *
     * @param Factory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Factory $entity)
    {
        $form = $this->createForm(new FactoryType(), $entity, array(
            'action' => $this->generateUrl('factory_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Factory entity.
     *
     * @Route("/new", name="factory_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Factory();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Factory entity.
     *
     * @Route("/{id}", name="factory_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PassportTreeviewBundle:Factory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Factory entity.
     *
     * @Route("/{id}/edit", name="factory_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PassportTreeviewBundle:Factory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factory entity.');
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
    * Creates a form to edit a Factory entity.
    *
    * @param Factory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Factory $entity)
    {
        $form = $this->createForm(new FactoryType(), $entity, array(
            'action' => $this->generateUrl('factory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Factory entity.
     *
     * @Route("/{id}", name="factory_update")
     * @Method("PUT")
     * @Template("PassportTreeviewBundle:Factory:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PassportTreeviewBundle:Factory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if($entity->getMax() <= $entity->getMin()){
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Min value should be less than Max value!'
                );
            }else{
            $em->flush();

            return $this->redirect($this->generateUrl('factory_edit', array('id' => $id)));
            }
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Factory entity.
     *
     * @Route("/{id}", name="factory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PassportTreeviewBundle:Factory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Factory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('factory'));
    }

    /**
     * Creates a form to delete a Factory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('factory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
