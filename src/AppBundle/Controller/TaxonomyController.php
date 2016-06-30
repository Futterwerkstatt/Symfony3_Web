<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Taxonomy;
use AppBundle\Form\TaxonomyType;

/**
 * Taxonomy controller.
 *
 * @Route("/admin/taxonomy")
 */
class TaxonomyController extends Controller
{
    /**
     * Lists all Taxonomy entities.
     *
     * @Route("/", name="admin_taxonomy_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $taxonomies = $em->getRepository('AppBundle:Taxonomy')->findAll();

        return $this->render('taxonomy/index.html.twig', array(
            'taxonomies' => $taxonomies,
        ));
    }

    /**
     * Creates a new Taxonomy entity.
     *
     * @Route("/new", name="admin_taxonomy_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $taxonomy = new Taxonomy();
        $form = $this->createForm('AppBundle\Form\TaxonomyType', $taxonomy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($taxonomy);
            $em->flush();

            return $this->redirectToRoute('admin_taxonomy_index');
        }

        return $this->render('taxonomy/new.html.twig', array(
            'taxonomy' => $taxonomy,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Taxonomy entity.
     *
     * @Route("/{id}", name="admin_taxonomy_show")
     * @Method("GET")
     */
    public function showAction(Taxonomy $taxonomy)
    {
        $deleteForm = $this->createDeleteForm($taxonomy);

        return $this->render('taxonomy/show.html.twig', array(
            'taxonomy' => $taxonomy,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Taxonomy entity.
     *
     * @Route("/{id}/edit", name="admin_taxonomy_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Taxonomy $taxonomy)
    {
        $deleteForm = $this->createDeleteForm($taxonomy);
        $editForm = $this->createForm('AppBundle\Form\TaxonomyType', $taxonomy);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($taxonomy);
            $em->flush();

            return $this->redirectToRoute('admin_taxonomy_edit', array('id' => $taxonomy->getId()));
        }

        return $this->render('taxonomy/edit.html.twig', array(
            'taxonomy' => $taxonomy,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Taxonomy entity.
     *
     * @Route("/{id}", name="admin_taxonomy_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Taxonomy $taxonomy)
    {
        $form = $this->createDeleteForm($taxonomy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($taxonomy);
            $em->flush();
        }

        return $this->redirectToRoute('admin_taxonomy_index');
    }

    /**
     * Creates a form to delete a Taxonomy entity.
     *
     * @param Taxonomy $taxonomy The Taxonomy entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Taxonomy $taxonomy)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_taxonomy_delete', array('id' => $taxonomy->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
