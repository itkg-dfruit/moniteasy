<?php

namespace monitoring\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * checkUrl
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="monitoring\ApplicationBundle\Entity\checkUrlRepository")
 */
class checkUrl
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="timeOut", type="integer")
     */
    private $timeOut;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="pingInterval", type="integer")
     */
    private $pingInterval;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;


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
     * Set name
     *
     * @param string $name
     * @return checkUrl
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
     * Set url
     *
     * @param string $url
     * @return checkUrl
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set timeOut
     *
     * @param integer $timeOut
     * @return checkUrl
     */
    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;

        return $this;
    }

    /**
     * Get timeOut
     *
     * @return integer 
     */
    public function getTimeOut()
    {
        return $this->timeOut;
    }

    /**
     * Set pingInterval
     *
     * @param integer $pingInterval
     * @return checkUrl
     */
    public function setPingInterval($pingInterval)
    {
        $this->pingInterval = $pingInterval;

        return $this;
    }

    /**
     * Get pingInterval
     *
     * @return integer
     */
    public function getPingInterval()
    {
        return $this->pingInterval;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return checkUrl
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
