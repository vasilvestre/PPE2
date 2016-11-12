<?php
/**
 * Created by PhpStorm.
 * User: vsilvestre
 * Date: 12/11/16
 * Time: 14:22
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="Promotions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $taux;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateEnd;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="promotion")
     */
    private $products;

    public function __construct() {
        $this->products = new ArrayCollection();
    }
}