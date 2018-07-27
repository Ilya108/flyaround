<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 17/07/18
 * Time: 09:39
 */

namespace AppBundle;


use AppBundle\Entity\PlaneModele;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $planeModel = new PlaneModele();
            $planeModel->setModel('a390');
            $planeModel->setManufacturer('airbus');
            $planeModel->setCruiseSpeed('988');
            $planeModel->setPlaneNbSeats('20');
            $planeModel->setIsAvailable('1');
            $manager->persist($planeModel);
        }

        $manager->flush();
    }
}