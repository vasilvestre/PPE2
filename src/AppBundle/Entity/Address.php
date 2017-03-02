<?php
/**
 * Created by PhpStorm.
 * User: vsilvestre
 * Date: 11/11/16
 * Time: 16:20
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Addresses")
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $line1;

    /**
     * @ORM\Column(type="string")
     */
    protected $line2;

    /**
     * @ORM\Column(type="string")
     */
    protected $line3;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Veuillez saisir votre ville.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="La ville est trop courte.",
     *     maxMessage="La ville est trop longue.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Veuillez saisir votre région.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="La region est trop courte.",
     *     maxMessage="La region est trop longue.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $countryProvince;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank(message="Veuillez saisir votre code postal.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Le code postal est trop court.",
     *     maxMessage="Le code postal est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $zipcode;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Veuillez saisir votre code postal.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="La ville est trop courte.",
     *     maxMessage="La ville est trop longue.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $country;

    /**
     * @ORM\Column(type="string")
     */
    protected $otherDetails;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="address")
     */
    private $users;

    public function __construct() {
        $this->users = new ArrayCollection();
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
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * @param mixed $line1
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;
    }

    /**
     * @return mixed
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * @param mixed $line2
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;
    }

    /**
     * @return mixed
     */
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * @param mixed $line3
     */
    public function setLine3($line3)
    {
        $this->line3 = $line3;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCountryProvince()
    {
        return $this->countryProvince;
    }

    /**
     * @param mixed $countryProvince
     */
    public function setCountryProvince($countryProvince)
    {
        $this->countryProvince = $countryProvince;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getOtherDetails()
    {
        return $this->otherDetails;
    }

    /**
     * @param mixed $otherDetails
     */
    public function setOtherDetails($otherDetails)
    {
        $this->otherDetails = $otherDetails;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}