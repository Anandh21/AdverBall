<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public function __construct(UserPasswordHasherInterface $passwordhasher){
        $this->passwordhasher = $passwordhasher;
    }
    public function load(ObjectManager $manager )
    {
        $user = new User();
        $user->setEmail('admin@admin.fr');
        $user->setPassword($this->passwordhasher->hashPassword($user, '0000'));
        $user->setFirstName('Jean');
        $user->setLastName('Martin');
        $user->setAge('18');
        $user->setNbBalls('2');
        $user->setGender("Male");
        $user->setQtl("4");


        $manager->persist($user);
        $manager->flush();


        $manager->flush();
    }
}
