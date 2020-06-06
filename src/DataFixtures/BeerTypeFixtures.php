<?php

namespace App\DataFixtures;

use App\Entity\BeerType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BeerTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->createOne($manager, ['name' => 'Pale Ale']);
        $this->createOne($manager, ['name' => 'Belgium']);
        $this->createOne($manager, ['name' => 'Stout']);
        $this->createOne($manager, ['name' => 'IPA']);
        $this->createOne($manager, ['name' => 'Porter']);
        $this->createOne($manager, ['name' => 'Pale Ale']);
        $this->createOne($manager, ['name' => 'Dunkel']);
        $this->createOne($manager, ['name' => 'Weissbier']);
        $this->createOne($manager, ['name' => 'Lager']);

        $manager->flush();
    }

    private function createOne(ObjectManager $manager, array $data): void
    {
        $hop = new BeerType();
        $hop->setName($data['name']);

        $manager->persist($hop);
    }
}
