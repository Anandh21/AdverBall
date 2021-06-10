<?php

namespace App\DataFixtures;

use App\Entity\SocialCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new SocialCategory();
        $category->setLabel('Agriculteurs exploitants');
        $category1 = new SocialCategory();
        $category1->setLabel('Artisans. commerçants. chefs entreprise');
        $category2 = new SocialCategory();
        $category2->setLabel('Cadres et professions intellectuelles supérieures');
        $category3 = new SocialCategory();
        $category3->setLabel('Professions intermédiaires');
        $category4 = new SocialCategory();
        $category4->setLabel('Autres personnes sans activité professionnelle');
        $category5 = new SocialCategory();
        $category5->setLabel('Ouvriers');
        $category6 = new SocialCategory();
        $category6->setLabel('Retraités');
        $category7 = new SocialCategory();
        $category7->setLabel('Autres personnes sans activité professionnelle');

        $manager->persist($category);
        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->persist($category5);
        $manager->persist($category6);
        $manager->persist($category7);

        $manager->flush();
    }
}
