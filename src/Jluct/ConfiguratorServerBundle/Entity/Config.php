<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * FileConf
 *
 * @ORM\Table(name="`Config`")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\ConfigRepository")
 */
class Config
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
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Jluct\ConfiguratorServerBundle\Entity\GroupsConfig", mappedBy="fileConfig", cascade={"persist"})
     */
    private $groupsConfig;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

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
     * @return Config
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
     * Set version
     *
     * @param string $version
     *
     * @return Config
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Config
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->GroupsConfig = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setDate(new \DateTime());
    }

    /**
     * Add blockConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupsConfig $groupsConfig
     *
     * @return Config
     */
    public function addBlockConfig(\Jluct\ConfiguratorServerBundle\Entity\GroupsConfig $groupsConfig)
    {
        $this->groupsConfig[] = $groupsConfig;

        return $this;
    }

    /**
     * Remove blockConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupsConfig $groupsConfig
     */
    public function removeBlockConfig(\Jluct\ConfiguratorServerBundle\Entity\GroupsConfig $groupsConfig)
    {
        $this->groupsConfig->removeElement($groupsConfig);
    }

    /**
     * Get blockConfig
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlockConfig()
    {
        return $this->groupsConfig;
    }
}
