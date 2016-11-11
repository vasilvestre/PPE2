<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="Orders", indexes={@ORM\Index(name="FK_Orders_id_Users", columns={"id_Users"}), @ORM\Index(name="FK_Orders_id_Invoices", columns={"id_Invoices"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime", nullable=true)
     */
    private $datecreation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Invoices
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Invoices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Invoices", referencedColumnName="id")
     * })
     */
    private $idInvoices;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Users", referencedColumnName="id")
     * })
     */
    private $idUsers;



    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     *
     * @return Orders
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
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
     * Set idInvoices
     *
     * @param \AppBundle\Entity\Invoices $idInvoices
     *
     * @return Orders
     */
    public function setIdInvoices(\AppBundle\Entity\Invoices $idInvoices = null)
    {
        $this->idInvoices = $idInvoices;

        return $this;
    }

    /**
     * Get idInvoices
     *
     * @return \AppBundle\Entity\Invoices
     */
    public function getIdInvoices()
    {
        return $this->idInvoices;
    }

    /**
     * Set idUsers
     *
     * @param \AppBundle\Entity\Users $idUsers
     *
     * @return Orders
     */
    public function setIdUsers(\AppBundle\Entity\Users $idUsers = null)
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    /**
     * Get idUsers
     *
     * @return \AppBundle\Entity\Users
     */
    public function getIdUsers()
    {
        return $this->idUsers;
    }
}
