<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * FileConf
 *
 * @ORM\Table(name="FileConf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\FileConfRepository")
 */
class FileConf
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
     * @var ArrayCollection $groupsConfig
     * @ORM\OneToMany(targetEntity="GroupConf", mappedBy="fileConf", cascade={"persist"})
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
     * @return FileConf
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
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
     * @return FileConf
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
     * @return FileConf
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
        $this->groupsConf = new ArrayCollection();
        $this->setDate(new \DateTime());
    }

    /**
     * Add blockConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $groupsConfig
     *
     * @return FileConf
     */
    public function addBlockConfig(GroupConf $groupsConfig)
    {
        $this->groupsConfig[] = $groupsConfig;

        return $this;
    }

    /**
     * Remove blockConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $groupsConfig
     */
    public function removeBlockConfig(GroupConf $groupsConfig)
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

    /**
     * Add groupsConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $groupsConfig
     *
     * @return FileConf
     */
    public function addGroupsConfig(\Jluct\ConfiguratorServerBundle\Entity\GroupConf $groupsConfig)
    {
        $this->groupsConfig[] = $groupsConfig;

        return $this;
    }

    /**
     * Remove groupsConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $groupsConfig
     */
    public function removeGroupsConfig(\Jluct\ConfiguratorServerBundle\Entity\GroupConf $groupsConfig)
    {
        $this->groupsConfig->removeElement($groupsConfig);
    }

    /**
     * Get groupsConfig
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupsConfig()
    {
        return $this->groupsConfig;
    }
}
