<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passworhHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passworhHasher = $passwordHasher;
    }

    final
    public function load(
        ObjectManager $manager
    ): void {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setPassword(
            $this->passworhHasher->hashPassword(
                $user,
                'pass1805'
            )
        );

        $manager->flush();
    }
}
