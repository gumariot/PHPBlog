<?php
/**
 * Created by PhpStorm.
 * User: gumariot
 * Date: 24/01/18
 * Time: 16:14
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\Article;
use AppBundle\Entity\Category;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ArticleFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        $category1 = new Category();
        $category2 = new Category();

        $category1->setName('Alcool');
        $category1->setColor('#ffd700');

        $category2->setName('Armes');
        $category2->setColor('#000000');

        $manager->persist($category2);
        $manager->persist($category1);
        $manager->flush();

        for ($i = 0 ; $i < 20 ; $i++){
            $article = new Article();
            $article->setTitle($faker->title);
            $article->setDescription($faker->text);
            $article->setDateParution($faker->dateTime);
            $article->setActif($faker->boolean);
            ($i % 2) ? $article->addCategory($category1) : $article->addCategory($category2);

            $manager->persist($article);
            $manager->flush();
        }
    }
}