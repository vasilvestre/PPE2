<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="Users", indexes={@ORM\Index(name="FK_Users_id_Adresses", columns={"id_Adresses"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=25, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="emailAdress", type="string", length=250, nullable=true)
     */
    private $emailadress;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=250, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=25, nullable=true)
     */
    private $phonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=250, nullable=true)
     */
    private $firstname;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Adresses
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Adresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Adresses", referencedColumnName="id")
     * })
     */
    private $idAdresses;



    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set emailadress
     *
     * @param string $emailadress
     *
     * @return Users
     */
    public function setEmailadress($emailadress)
    {
        $this->emailadress = $emailadress;

        return $this;
    }

    /**
     * Get emailadress
     *
     * @return string
     */
    public function getEmailadress()
    {
        return $this->emailadress;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set phonenumber
     *
     * @param string $phonenumber
     *
     * @return Users
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return string
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Users
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
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
     * Set idAdresses
     *
     * @param \AppBundle\Entity\Adresses $idAdresses
     *
     * @return Users
     */
    public function setIdAdresses(\AppBundle\Entity\Adresses $idAdresses = null)
    {
        $this->idAdresses = $idAdresses;

        return $this;
    }

    /**
     * Get idAdresses
     *
     * @return \AppBundle\Entity\Adresses
     */
    public function getIdAdresses()
    {
        return $this->idAdresses;
    }
}
