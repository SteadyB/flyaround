<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02/06/18
 * Time: 10:55
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $userOne = new User();
        $userOne->setEmail('mclane@nypd.com');
        $userOne->setUsername('JohnTheOne');
        $userOne->setFirstName('John');
        $userOne->setLastName('McLane');
        $userOne->setPhoneNumber('0605040302');
        $bdOne = new \DateTime();
        $bdOne->setDate(1955, 03, 19);
        $userOne->setBirthDate($bdOne);
        $userOne->setIsACertifiedPilot(0);
        $userOne->setEnabled(true);
        $passwordJ = $this->encoder->encodePassword($userOne, 'DIE&HARD');
        $userOne->setPassword($passwordJ);
        $manager->persist($userOne);

        $userTwo = new User();
        $userTwo->setEmail('kill.skynet@gmail.com');
        $userTwo->setUsername('imnotsarahconnor');
        $userTwo->setFirstName('Sarah');
        $userTwo->setLastName('Connor');
        $userTwo->setPhoneNumber('0904050101');
        $bdTwo = new \DateTime();
        $bdTwo->setDate(1965, 05, 12);
        $userTwo->setBirthDate($bdTwo);
        $userTwo->setIsACertifiedPilot(1);
        $userTwo->setEnabled(true);
        $passwordS = $this->encoder->encodePassword($userOne, 'DIE&HARD');
        $userTwo->setPassword($passwordS);
        $manager->persist($userTwo);

        $userThree = new User();
        $userThree->setEmail('b.m@cia.gov');
        $userThree->setUsername('iwillfindU');
        $userThree->setFirstName('Bryan');
        $userThree->setLastName('Mills');
        $userThree->setPhoneNumber('0008010203');
        $bdThree = new \DateTime();
        $bdThree->setDate(1957, 06, 15);
        $userThree->setBirthDate($bdThree);
        $userThree->setIsACertifiedPilot(0);
        $userThree->setEnabled(true);
        $passwordB = $this->encoder->encodePassword($userOne, 'Kimmy');
        $userThree->setPassword($passwordB);
        $manager->persist($userThree);

        $manager->flush();
    }

}