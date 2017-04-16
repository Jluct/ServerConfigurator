<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Meanings
 *
 * @ORM\Table(name="Meanings")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\MeaningsRepository")
 */
class Meanings
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Meanings
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
     * @var StringConf
     *
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\StringConf", inversedBy="meanings")
     * @ORM\JoinColumn(name="string_id", referencedColumnName="id")
     */
    private $stringConfig;

    public function __construct()
    {
        $this->stringConfig = new ArrayCollection();
    }

    /**
     * Add stringConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $stringConfig
     *
     * @return Meanings
     */
    public function addStringConfig(\Jluct\ConfiguratorServerBundle\Entity\StringConf $stringConfig)
    {
        $this->stringConfig[] = $stringConfig;

        return $this;
    }

    /**
     * Remove stringConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $stringConfig
     */
    public function removeStringConfig(\Jluct\ConfiguratorServerBundle\Entity\StringConf $stringConfig)
    {
        $this->stringConfig->removeElement($stringConfig);
    }

    /**
     * Get stringConfig
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStringConfig()
    {
        return $this->stringConfig;
    }

    /**
     * Set stringConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $stringConfig
     *
     * @return Meanings
     */
    public function setStringConfig(\Jluct\ConfiguratorServerBundle\Entity\StringConf $stringConfig = null)
    {
        $this->stringConfig = $stringConfig;

        return $this;
    }
}
