<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Taxonomy;

class LoadTaxonomyData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        
        $tax = new Taxonomy();
        $tax->setName('Taxonomy Test 1');
        $manager->persist($tax);
        
        $manager->flush();
        $this->addReference('tax', $tax);
    }

    public function getOrder() {
        return 10;
    }

}
