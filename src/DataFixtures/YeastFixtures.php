<?php

namespace App\DataFixtures;

use App\Entity\Yeast;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class YeastFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->createOne($manager, ['name' => 'Safcider', 'type' => 0]);
        $this->createOne($manager, ['name' => 'Safale BE-134', 'type' => 0]);
        $this->createOne($manager, ['name' => 'Safbrew F2', 'type' => 0]);
        $this->createOne($manager, ['name' => 'Saflager S-189', 'type' => 0]);
        $this->createOne($manager, ['name' => 'Safale S-04', 'type' => 0]);
        $this->createOne($manager, ['name' => 'Safale US-05', 'type' => 0]);

        $manager->flush();
    }

    private function createOne(ObjectManager $manager, array $data): void
    {
        $yeast = new Yeast();
        $yeast->setName($data['name']);
        $yeast->setType($data['type']);

        $manager->persist($yeast);
    }
}
