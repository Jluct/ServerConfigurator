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
     * @return FileConf
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
     * @var
     *
     * @ORM\OneToMany(targetEntity="Jluct\ConfiguratorServerBundle\Entity\BlockConf", mappedBy="fileConfig", cascade={"persist"})
     */
    private $blockConfig;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blockConfig = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setDate(new \DateTime());
    }

    /**
     * Add blockConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\BlockConf $blockConfig
     *
     * @return FileConf
     */
    public function addBlockConfig(\Jluct\ConfiguratorServerBundle\Entity\BlockConf $blockConfig)
    {
        $this->blockConfig[] = $blockConfig;

        return $this;
    }

    /**
     * Remove blockConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\BlockConf $blockConfig
     */
    public function removeBlockConfig(\Jluct\ConfiguratorServerBundle\Entity\BlockConf $blockConfig)
    {
        $this->blockConfig->removeElement($blockConfig);
    }

    /**
     * Get blockConfig
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlockConfig()
    {
        return $this->blockConfig;
    }
}
