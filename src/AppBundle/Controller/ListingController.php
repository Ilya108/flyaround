<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use AppBundle\Entity\Flight;
use AppBundle\Entity\PlaneModele;
use AppBundle\Entity\Reservation;


/**
 * Listing controller.
 *
 * @Route("/listing")
 */
class ListingController extends Controller
{
    /**
     * List one reservation with one flight and one planemodele, with few IDs.
     *
     * @Route("/{reservation_id}/flight/{flight_id}/planemodele/{planemodele_id}", name="listing_index", requirements={"reservation_id": "\d+"})
     * @Method("GET")
     * @ParamConverter("reservation", options={"mapping": {"reservation_id": "id"}})
     * @ParamConverter("flight", options={"mapping": {"flight_id": "id"}})
     * @ParamConverter("planemodele", options={"mapping": {"planemodele_id": "id"}})
     */
    public function indexAction(Reservation $reservation, Flight $flight, PlaneModele $planemodele)
    {
        return $this->render('listing/index.html.twig', array(
            'reservation' => $reservation,
            'flight' => $flight,
            'planemodele' => $planemodele
        ));
    }
}
