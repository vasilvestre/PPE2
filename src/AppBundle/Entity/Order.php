<?php
/**
 * Created by PhpStorm.
 * User: vsilvestre
 * Date: 11/11/16
 * Time: 16:40
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Orders")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="")
     */
    protected $dateCreation;

}