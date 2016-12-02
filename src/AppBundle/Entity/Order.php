<?php
/**
 * Created by PhpStorm.
 * User: vsilvestre
 * Date: 11/11/16
 * Time: 16:40
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="datetime")
     */
    protected $dateCreation;

    /**
     * @ORM\OneToOne(targetEntity="Invoice", inversedBy="order")
     */
    private $invoice;

    /**
     * @var ArrayCollection $orderItems
     *
     * @ORM\ManyToMany(targetEntity="OrderItems", mappedBy="orders", cascade={"persist"}, fetch="EAGER")
     */
    private $orderItems;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     */
    private $user;

    /**
     * Order constructor.
     */
    public function __construct() {
        $this->orderItems = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param mixed $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param ArrayCollection $orderItems
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
    }

    /**
     * @param OrderItems $orderItem
     * @internal param OrderItems $orderItems
     * @return $this
     */
    public function addOrderItems(OrderItems $orderItem){
        $orderItem->addOrder($this);
        $this->orderItems->add($orderItem);

        return $this;
    }

    /**
     * @param OrderItems $orderItem
     * @return $this
     */
    public function addFirstOrderItems(OrderItems $orderItem){
        $this->orderItems->add($orderItem);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }



}