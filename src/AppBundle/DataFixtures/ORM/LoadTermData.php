<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Term;

class LoadTermData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        
        $term1 = new Term();
        $term1->setName('Term 1')->setTaxonomy($this->getReference('tax'));
        
        $term2 = new Term();
        $term2->setName('Term 2')->setTaxonomy($this->getReference('tax'));

        $child = new Term();
        $child->setName('Child of Term 2')->setParent($term2)->setTaxonomy($this->getReference('tax'));
        
        $manager->persist($term1);
        $manager->persist($term2);
        $manager->persist($child);
        $manager->flush();
    }

    public function getOrder() {
        return 11;
    }

}
