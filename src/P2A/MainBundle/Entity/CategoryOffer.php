<?php

namespace P2A\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryOffer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CategoryOffer
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
     * @ORM\Column(name="name", type="string", length=500)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_en", type="string", length=500)
     */
    private $nameEn;


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
        return ($this->getName()) ? $this->getName() : '';
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CategoryOffer
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $nameEn
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;
    }

    /**
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }


}
