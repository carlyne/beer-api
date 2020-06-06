<?php

namespace App\DataFixtures;

use App\Entity\Hop;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HopFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->createOne($manager, ['name' => 'Herkules', 'category' => 0]);
        $this->createOne($manager, ['name' => 'Pilgrim', 'category' => 0]);
        $this->createOne($manager, ['name' => 'Lemondrop', 'category' => 0]);
        $this->createOne($manager, ['name' => 'Sladeck', 'category' => 0]);
        $this->createOne($manager, ['name' => 'Rakau', 'category' => 0]);
        $this->createOne($manager, ['name' => 'Challenger', 'category' => 0]);
        $this->createOne($manager, ['name' => 'Colombus', 'category' => 0]);
        $this->createOne($manager, ['name' => 'Barbe Rouge', 'category' => 0]);

        $manager->flush();
    }

    private function createOne(ObjectManager $manager, array $data): void
    {
        $hop = new Hop();
        $hop->setName($data['name']);
        $hop->setCategory($data['category']);

        $manager->persist($hop);
    }
}
