<?php

namespace monitoring\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * pingUrl
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="monitoring\ApplicationBundle\Entity\pingUrlRepository")
 */
class pingUrl
{
    /**
     * @ORM\Column(name="id_pingUrl", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="pingDate", type="datetime")
     */
    private $pingDate;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="response", type="string", length=1000)
     */
    private $response;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="httpCode", type="string", length=255)
     */
    private $httpCode;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="responseTime", type="float")
     */
    private $responseTime;

    /**
     * @ORM\ManyToOne(targetEntity="monitoring\ApplicationBundle\Entity\checkUrl", inversedBy="checkUrl", cascade = {"persist", "remove"})
     **/
    private $checkUrl;

    public function __construct()
    {
        $this->setPingDate(new \DateTime());
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
     * Set pingDate
     *
     * @param \DateTime $pingDate
     * @return pingUrl
     */
    public function setPingDate($pingDate)
    {
        $this->pingDate = $pingDate;

        return $this;
    }

    /**
     * Get pingDate
     *
     * @return \DateTime
     */
    public function getPingDate()
    {
        return $this->pingDate;
    }

    /**
     * Set response
     *
     * @param string $response
     * @return pingUrl
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return string 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set httpCode
     *
     * @param integer $timeOut
     * @return pingUrl
     */
    public function setHttpCode($httpCode)
    {
        $this->httpCode = $httpCode;

        return $this;
    }

    /**
     * Get httpCode
     *
     * @return integer 
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * Set responseTime
     *
     * @param float $pingInterval
     * @return pingUrl
     */
    public function setResponseTime($responseTime)
    {
        $this->responseTime = $responseTime;

        return $this;
    }

    /**
     * Get responseTime
     *
     * @return float
     */
    public function getResponseTime()
    {
        return $this->responseTime;
    }

    /**
     * Set tags
     *
     * @param \monitoring\ApplicationBundle\Entity\checkUrl $checkUrl
     * @return checkUrl
     */
    public function setCheckUrl(\monitoring\ApplicationBundle\Entity\checkUrl $checkUrl = null)
    {
        $this->checkUrl = $checkUrl;

        return $this;
    }

    /**
     * Get tags
     *
     * @return \monitoring\ApplicationBundle\Entity\checkUrl
     */
    public function getCheckUrl()
    {
        return $this->checkUrl;
    }
}
