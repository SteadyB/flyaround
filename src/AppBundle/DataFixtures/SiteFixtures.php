<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02/06/18
 * Time: 10:55
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Site;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SiteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $siteOne = new Site();
        $siteOne->setName('siteOne');
        $siteOne->setCity('City One');
        $siteOne->setIcao('CTON');
        $siteOne->setLatitude((string) (mt_rand(-89,89) . '.' . mt_rand(0,999999999)));
        $siteOne->setLongitude((string) (mt_rand(-179,179) . '.' . mt_rand(0,999999999)));
        $manager->persist($siteOne);

        $siteTwo = new Site();
        $siteTwo->setName('siteTwo');
        $siteTwo->setCity('City Two');
        $siteTwo->setIcao('CTTW');
        $siteTwo->setLatitude((string) (mt_rand(-89,89) . '.' . mt_rand(0,999999999)));
        $siteTwo->setLongitude((string) (mt_rand(-179,179) . '.' . mt_rand(0,999999999)));
        $manager->persist($siteTwo);

        $siteThree = new Site();
        $siteThree->setName('siteThree');
        $siteThree->setCity('City Three');
        $siteThree->setIcao('CTTH');
        $siteThree->setLatitude((string) (mt_rand(-89,89) . '.' . mt_rand(0,999999999)));
        $siteThree->setLongitude((string) (mt_rand(-179,179) . '.' . mt_rand(0,999999999)));
        $manager->persist($siteThree);

        $manager->flush();
    }

}