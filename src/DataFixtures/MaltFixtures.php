<?php

namespace App\DataFixtures;

use App\Entity\Malt;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MaltFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->createOne($manager, ['name' => 'Pilsen', 'ebc' => 4]);
        $this->createOne($manager, ['name' => 'Pale Ale', 'ebc' => 8]);
        $this->createOne($manager, ['name' => 'Munich Light', 'ebc' => 15]);
        $this->createOne($manager, ['name' => 'Cara Blond', 'ebc' => 20]);
        $this->createOne($manager, ['name' => 'Biscuit', 'ebc' => 50]);
        $this->createOne($manager, ['name' => 'Melano', 'ebc' => 80]);
        $this->createOne($manager, ['name' => 'Cara Gold', 'ebc' => 120]);
        $this->createOne($manager, ['name' => 'Cristal', 'ebc' => 150]);
        $this->createOne($manager, ['name' => 'Café Light', 'ebc' => 250]);
        $this->createOne($manager, ['name' => 'Special Belgium', 'ebc' => 290]);
        $this->createOne($manager, ['name' => 'Chocolat', 'ebc' => 900]);
        $this->createOne($manager, ['name' => 'Black', 'ebc' => 1300]);

        $manager->flush();
    }

    private function createOne(ObjectManager $manager, array $data): void
    {
        $malt = new Malt();

        $malt->setName($data['name']);
        $malt->setEbc($data['ebc']);

        $manager->persist($malt);
    }
}
