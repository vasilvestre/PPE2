<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="Products", indexes={@ORM\Index(name="FK_Products_code_Product_Categories", columns={"code_Product_Categories"}), @ORM\Index(name="FK_Products_id_Promotions", columns={"id_Promotions"})})
 * @ORM\Entity
 */
class Products
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=250, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="priceHT", type="float", precision=10, scale=0, nullable=false)
     */
    private $priceht;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=2500, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\ProductCategories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProductCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="code_Product_Categories", referencedColumnName="code")
     * })
     */
    private $codeProductCategories;

    /**
     * @var \AppBundle\Entity\Promotions
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Promotions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Promotions", referencedColumnName="id")
     * })
     */
    private $idPromotions;



    /**
     * Set code
     *
     * @param string $code
     *
     * @return Products
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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
     * Set priceht
     *
     * @param float $priceht
     *
     * @return Products
     */
    public function setPriceht($priceht)
    {
        $this->priceht = $priceht;

        return $this;
    }

    /**
     * Get priceht
     *
     * @return float
     */
    public function getPriceht()
    {
        return $this->priceht;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Products
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codeProductCategories
     *
     * @param \AppBundle\Entity\ProductCategories $codeProductCategories
     *
     * @return Products
     */
    public function setCodeProductCategories(\AppBundle\Entity\ProductCategories $codeProductCategories = null)
    {
        $this->codeProductCategories = $codeProductCategories;

        return $this;
    }

    /**
     * Get codeProductCategories
     *
     * @return \AppBundle\Entity\ProductCategories
     */
    public function getCodeProductCategories()
    {
        return $this->codeProductCategories;
    }

    /**
     * Set idPromotions
     *
     * @param \AppBundle\Entity\Promotions $idPromotions
     *
     * @return Products
     */
    public function setIdPromotions(\AppBundle\Entity\Promotions $idPromotions = null)
    {
        $this->idPromotions = $idPromotions;

        return $this;
    }

    /**
     * Get idPromotions
     *
     * @return \AppBundle\Entity\Promotions
     */
    public function getIdPromotions()
    {
        return $this->idPromotions;
    }
}
