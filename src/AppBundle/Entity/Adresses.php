<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresses
 *
 * @ORM\Table(name="Adresses")
 * @ORM\Entity
 */
class Adresses
{
    /**
     * @var string
     *
     * @ORM\Column(name="line1", type="string", length=250, nullable=true)
     */
    private $line1;

    /**
     * @var string
     *
     * @ORM\Column(name="line2", type="string", length=250, nullable=true)
     */
    private $line2;

    /**
     * @var string
     *
     * @ORM\Column(name="line3", type="string", length=250, nullable=true)
     */
    private $line3;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=250, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="countryProvince", type="string", length=250, nullable=true)
     */
    private $countryprovince;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipcode", type="integer", nullable=true)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=250, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="otherDetails", type="string", length=2500, nullable=true)
     */
    private $otherdetails;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set line1
     *
     * @param string $line1
     *
     * @return Adresses
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;

        return $this;
    }

    /**
     * Get line1
     *
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Set line2
     *
     * @param string $line2
     *
     * @return Adresses
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * Get line2
     *
     * @return string
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * Set line3
     *
     * @param string $line3
     *
     * @return Adresses
     */
    public function setLine3($line3)
    {
        $this->line3 = $line3;

        return $this;
    }

    /**
     * Get line3
     *
     * @return string
     */
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Adresses
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set countryprovince
     *
     * @param string $countryprovince
     *
     * @return Adresses
     */
    public function setCountryprovince($countryprovince)
    {
        $this->countryprovince = $countryprovince;

        return $this;
    }

    /**
     * Get countryprovince
     *
     * @return string
     */
    public function getCountryprovince()
    {
        return $this->countryprovince;
    }

    /**
     * Set zipcode
     *
     * @param integer $zipcode
     *
     * @return Adresses
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return integer
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Adresses
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set otherdetails
     *
     * @param string $otherdetails
     *
     * @return Adresses
     */
    public function setOtherdetails($otherdetails)
    {
        $this->otherdetails = $otherdetails;

        return $this;
    }

    /**
     * Get otherdetails
     *
     * @return string
     */
    public function getOtherdetails()
    {
        return $this->otherdetails;
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
}
