<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');

        for($i =0; $i < 5; $i++){
            $clients = new Client();
            $clients->setNumerodeCompte($faker->randomNumber)
                    ->setNom($faker->name)
                    ->setSolde(mt_rand(200, 1000));
            $manager->persist($clients);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
