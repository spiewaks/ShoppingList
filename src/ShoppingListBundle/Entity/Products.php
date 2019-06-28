<?php

namespace ShoppingListBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="ShoppingListBundle\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="products")
     */

    private $category;
    /**
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * @ORM\ManyToMany(targetEntity="allergens", mappedBy="products")
     */
    private $allergens;
    public function __construct()
    {
        $this->allergens = new ArrayCollection();
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, unique=true)
     */
    private $image;


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
     * @return Products
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
     * Set image
     *
     * @param string $image
     *
     * @return Products
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
