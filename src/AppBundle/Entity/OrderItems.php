<?php
/**
 * Created by PhpStorm.
 * User: vsilvestre
 * Date: 11/11/16
 * Time: 16:49
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Order_Items")
 */
class OrderItems
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
    protected $price;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity;

    /**
     * @ORM\Column(type="string")
     */
    protected $comments;
}