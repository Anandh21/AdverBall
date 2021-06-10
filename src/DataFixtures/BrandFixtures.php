<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $brand = new Brand();
        $brand->setLabel('Coca-Cola');
        $brand1 = new Brand();
        $brand1->setLabel('Coca-Cola Light');
        $brand2 = new Brand();
        $brand2->setLabel('Coca-Cola Zero');
        $brand3 = new Brand();
        $brand3->setLabel('Coca-Cola Cherry');
        $brand4 = new Brand();
        $brand4->setLabel('Coca-Cola Vanille');
        $brand5 = new Brand();
        $brand5->setLabel("Fanta Orange");
        $brand6 = new Brand();
        $brand6->setLabel("Fanta Citron");
        $brand7 = new Brand();
        $brand7->setLabel('FuzeTea');
        $brand8 = new Brand();
        $brand8->setLabel('Tropico');
        $brand9 = new Brand();
        $brand9->setLabel('Sprite');
        $brand0 = new Brand();
        $brand0->setLabel('Coca-cola Energy');

        $manager->persist($brand);
        $manager->persist($brand1);
        $manager->persist($brand2);
        $manager->persist($brand3);
        $manager->persist($brand4);
        $manager->persist($brand5);
        $manager->persist($brand6);
        $manager->persist($brand7);
        $manager->persist($brand8);
        $manager->persist($brand9);
        $manager->persist($brand0);

        $manager->flush();
    }
}
