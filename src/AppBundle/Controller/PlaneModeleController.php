<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PlaneModele;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Planemodele controller.
 *
 * @Route("planemodele")
 */
class PlaneModeleController extends Controller
{
    /**
     * Lists all planeModele entities.
     *
     * @Route("/", name="planemodele_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $planeModeles = $em->getRepository('AppBundle:PlaneModele')->findAll();

        return $this->render('planemodele/index.html.twig', array(
            'planeModeles' => $planeModeles,
        ));
    }

    /**
     * Creates a new planeModele entity.
     *
     * @Route("/new", name="planemodele_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $planeModele = new Planemodele();
        $form = $this->createForm('AppBundle\Form\PlaneModeleType', $planeModele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($planeModele);
            $em->flush();

            return $this->redirectToRoute('planemodele_show', array('id' => $planeModele->getId()));
        }

        return $this->render('planemodele/new.html.twig', array(
            'planeModele' => $planeModele,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a planeModele entity.
     *
     * @Route("/{id}", name="planemodele_show")
     * @Method("GET")
     */
    public function showAction(PlaneModele $planeModele)
    {
        $deleteForm = $this->createDeleteForm($planeModele);

        return $this->render('planemodele/show.html.twig', array(
            'planeModele' => $planeModele,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing planeModele entity.
     *
     * @Route("/{id}/edit", name="planemodele_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PlaneModele $planeModele)
    {
        $deleteForm = $this->createDeleteForm($planeModele);
        $editForm = $this->createForm('AppBundle\Form\PlaneModeleType', $planeModele);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planemodele_edit', array('id' => $planeModele->getId()));
        }

        return $this->render('planemodele/edit.html.twig', array(
            'planeModele' => $planeModele,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a planeModele entity.
     *
     * @Route("/{id}", name="planemodele_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PlaneModele $planeModele)
    {
        $form = $this->createDeleteForm($planeModele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($planeModele);
            $em->flush();
        }

        return $this->redirectToRoute('planemodele_index');
    }

    /**
     * Creates a form to delete a planeModele entity.
     *
     * @param PlaneModele $planeModele The planeModele entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlaneModele $planeModele)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('planemodele_delete', array('id' => $planeModele->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
