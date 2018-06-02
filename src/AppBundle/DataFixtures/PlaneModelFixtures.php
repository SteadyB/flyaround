<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02/06/18
 * Time: 10:55
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\PlaneModel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlaneModelFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $planeOne = new PlaneModel();
        $planeOne->setModel('A380');
        $planeOne->setManufacturer('Airbus');
        $planeOne->setCruiseSpeed('900');
        $planeOne->setPlaneNbSeats('600');
        $planeOne->setIsAvailable(1);

        $manager->persist($planeOne);
        $manager->flush();
    }
}