<?php

namespace ShoppingListBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Routing\Annotation\Route;
/**
 * allergens
 *
 * @ORM\Table(name="allergens")
 * @ORM\Entity(repositoryClass="ShoppingListBundle\Repository\allergensRepository")
 */
class allergens
{
    /**
     * @ORM\ManyToMany(targetEntity="Products", inversedBy="allergens")
     * @ORM\JoinTable(name="allergens_products")
     */
    private $products;
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return allergens
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
}

