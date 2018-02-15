<?php
/**
 * Created by PhpStorm.
 * User: gumariot
 * Date: 24/01/18
 * Time: 16:14
 */

namespace AppBundle\DataFixtures;
use AppBundle\Entity\User;


use AppBundle\Entity\Article;
use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user2 = new User();

        $user1->setUsername('fldamiens');
        $user1->setEmail('test@test.fr');
        $user1->setPlainPassword('azerty');
        $user1->addRole('ROLE_VISITOR');
        $user1->setEnabled(true);

        $user2->setUsername('admin');
        $user2->setEmail('admin@test.fr');
        $user2->setPlainPassword('azerty');
        $user2->addRole('ROLE_ADMIN');
        $user2->setEnabled(true);

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->flush();
    }
}