<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections;

/**
 * Taxonomy
 *
 * @ORM\Table(name="taxonomy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaxonomyRepository")
 */
class Taxonomy {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var guid
     *
     * @ORM\Column(name="slug", type="guid", unique=true)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="TaxonomyTerm", mappedBy="taxonomy", cascade={"remove","persist"})
     */
    private $terms;

    /**
     * Constructor
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->terms = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Taxonomy
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Taxonomy
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set slug
     *
     * @param guid $slug
     *
     * @return Taxonomy
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return guid
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Taxonomy
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Taxonomy
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }


    /**
     * Add term
     *
     * @param \AppBundle\Entity\TaxonomyTerm $term
     *
     * @return Taxonomy
     */
    public function addTerm(\AppBundle\Entity\TaxonomyTerm $term)
    {
        $this->terms[] = $term;

        return $this;
    }

    /**
     * Remove term
     *
     * @param \AppBundle\Entity\TaxonomyTerm $term
     */
    public function removeTerm(\AppBundle\Entity\TaxonomyTerm $term)
    {
        $this->terms->removeElement($term);
    }

    /**
     * Get terms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTerms()
    {
        return $this->terms;
    }
}
