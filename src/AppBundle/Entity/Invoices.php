<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoices
 *
 * @ORM\Table(name="Invoices", indexes={@ORM\Index(name="FK_Invoices_id_Orders", columns={"id_Orders"})})
 * @ORM\Entity
 */
class Invoices
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=250, nullable=true)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Orders
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Orders", referencedColumnName="id")
     * })
     */
    private $idOrders;



    /**
     * Set code
     *
     * @param string $code
     *
     * @return Invoices
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
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Invoices
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
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
     * Set idOrders
     *
     * @param \AppBundle\Entity\Orders $idOrders
     *
     * @return Invoices
     */
    public function setIdOrders(\AppBundle\Entity\Orders $idOrders = null)
    {
        $this->idOrders = $idOrders;

        return $this;
    }

    /**
     * Get idOrders
     *
     * @return \AppBundle\Entity\Orders
     */
    public function getIdOrders()
    {
        return $this->idOrders;
    }
}
