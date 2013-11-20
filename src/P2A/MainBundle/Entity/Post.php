<?php

namespace P2A\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="P2A\MainBundle\Entity\PostRepository")
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="titleEn", type="string", length=255)
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionEn", type="text")
     */
    private $descriptionEn;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Location")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="CategoryOffer")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="typeContrat", type="string", length=255)
     */
    private $typeContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="responsability", type="text")
     */
    private $responsability;

    /**
     * @var string
     *
     * @ORM\Column(name="responsabilityEn", type="text")
     */
    private $responsabilityEn;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="text")
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="profilEn", type="text")
     */
    private $profilEn;

    /**
     * @var string
     *
     * @ORM\Column(name="salaire", type="string", length=255)
     */
    private $salaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="date")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255)
     */
    private $contact;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return ($this->getTitle()) ? $this->getTitle() : '';
    }


    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Post
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set titleEn
     *
     * @param string $titleEn
     * @return Post
     */
    public function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;
    
        return $this;
    }

    /**
     * Get titleEn
     *
     * @return string 
     */
    public function getTitleEn()
    {
        return $this->titleEn;
    }

    /**
     * Set descriptionEn
     *
     * @param string $descriptionEn
     * @return Post
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;
    
        return $this;
    }

    /**
     * Get descriptionEn
     *
     * @return string 
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Post
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Post
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set typeContrat
     *
     * @param string $typeContrat
     * @return Post
     */
    public function setTypeContrat($typeContrat)
    {
        $this->typeContrat = $typeContrat;
    
        return $this;
    }

    /**
     * Get typeContrat
     *
     * @return string 
     */
    public function getTypeContrat()
    {
        return $this->typeContrat;
    }

    /**
     * Set responsability
     *
     * @param string $responsability
     * @return Post
     */
    public function setResponsability($responsability)
    {
        $this->responsability = $responsability;
    
        return $this;
    }

    /**
     * Get responsability
     *
     * @return string 
     */
    public function getResponsability()
    {
        return $this->responsability;
    }

    /**
     * Set responsabilityEn
     *
     * @param string $responsabilityEn
     * @return Post
     */
    public function setResponsabilityEn($responsabilityEn)
    {
        $this->responsabilityEn = $responsabilityEn;
    
        return $this;
    }

    /**
     * Get responsabilityEn
     *
     * @return string 
     */
    public function getResponsabilityEn()
    {
        return $this->responsabilityEn;
    }

    /**
     * Set profil
     *
     * @param string $profil
     * @return Post
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;
    
        return $this;
    }

    /**
     * Get profil
     *
     * @return string 
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set profilEn
     *
     * @param string $profilEn
     * @return Post
     */
    public function setProfilEn($profilEn)
    {
        $this->profilEn = $profilEn;
    
        return $this;
    }

    /**
     * Get profilEn
     *
     * @return string 
     */
    public function getProfilEn()
    {
        return $this->profilEn;
    }

    /**
     * Set salaire
     *
     * @param string $salaire
     * @return Post
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    
        return $this;
    }

    /**
     * Get salaire
     *
     * @return string 
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return Post
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    
        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return Post
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getTitleLang($lang = 'fr')
    {
        if ($lang == 'fr')
            return $this->title;
        return $this->titleEn;
    }

    public function getDescriptionLang($lang = 'fr')
    {
        if ($lang == 'fr')
            return $this->description;
        return $this->descriptionEn;
    }

    public function getResponsabilityLang($lang = 'fr')
    {
        if ($lang == 'fr')
            return $this->responsability;
        return $this->responsabilityEn;
    }

    public function getProfileLang($lang = 'fr')
    {
        if ($lang == 'fr')
            return $this->profil;
        return $this->profilEn;
    }

    public function getCategoryLang($lang = 'fr')
    {
        if ($lang == 'fr')
            return $this->category->getName();
        return $this->category->getNameEn();
    }

    public function getLocationLang($lang = 'fr')
    {
        if ($lang == 'fr')
            return $this->location->getName();
        return $this->location->getName();
    }

}
