<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaxonomyTerm
 *
 * @ORM\Table(name="taxonomy_term")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaxonomyTermRepository")
 */
class TaxonomyTerm {

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
     * @ORM\ManyToOne(targetEntity="TaxonomyTerm", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="TaxonomyTerm", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Taxonomy", inversedBy="terms")
     */
    private $taxonomy;

    /**
     * Constructor
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TaxonomyTerm
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
     * @return TaxonomyTerm
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
     * Set name
     *
     * @param string $name
     *
     * @return TaxonomyTerm
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
     * @return TaxonomyTerm
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
     * @return TaxonomyTerm
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
     * Set parent
     *
     * @param \AppBundle\Entity\TaxonomyTerm $parent
     *
     * @return TaxonomyTerm
     */
    public function setParent(\AppBundle\Entity\TaxonomyTerm $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\TaxonomyTerm
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add child
     *
     * @param \AppBundle\Entity\TaxonomyTerm $child
     *
     * @return TaxonomyTerm
     */
    public function addChild(\AppBundle\Entity\TaxonomyTerm $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \AppBundle\Entity\TaxonomyTerm $child
     */
    public function removeChild(\AppBundle\Entity\TaxonomyTerm $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set vocabulary
     *
     * @param \AppBundle\Entity\Taxonomy $vocabulary
     *
     * @return TaxonomyTerm
     */
    public function setVocabulary(\AppBundle\Entity\Taxonomy $vocabulary = null)
    {
        $this->vocabulary = $vocabulary;

        return $this;
    }

    /**
     * Get vocabulary
     *
     * @return \AppBundle\Entity\Taxonomy
     */
    public function getVocabulary()
    {
        return $this->vocabulary;
    }

    /**
     * Set taxonomy
     *
     * @param \AppBundle\Entity\Taxonomy $taxonomy
     *
     * @return TaxonomyTerm
     */
    public function setTaxonomy(\AppBundle\Entity\Taxonomy $taxonomy = null)
    {
        $this->taxonomy = $taxonomy;

        return $this;
    }

    /**
     * Get taxonomy
     *
     * @return \AppBundle\Entity\Taxonomy
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }
}
