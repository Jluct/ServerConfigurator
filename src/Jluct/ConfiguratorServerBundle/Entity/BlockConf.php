<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlockConf
 *
 * @ORM\Table(name="BlockConf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\BlockConfRepository")
 */
class BlockConf
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
     * @var bool
     *
     * @ORM\Column(name="required", type="boolean", nullable=true)
     */
    private $required;

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
     * @return BlockConf
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
     * Set required
     *
     * @param boolean $required
     *
     * @return BlockConf
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return bool
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return BlockConf
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
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\FileConf", inversedBy="blockConfig")
     * @ORM\JoinColumn(name="fileConfig_id", referencedColumnName="id")
     */
    private $fileConfig;


    /**
     * Set fileConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\FileConf $fileConfig
     *
     * @return BlockConf
     */
    public function setFileConfig(\Jluct\ConfiguratorServerBundle\Entity\FileConf $fileConfig = null)
    {
        $this->fileConfig = $fileConfig;

        return $this;
    }

    /**
     * Get fileConfig
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\FileConf
     */
    public function getFileConfig()
    {
        return $this->fileConfig;
    }

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Jluct\ConfiguratorServerBundle\Entity\StringConf", mappedBy="blockConfig", cascade={"persist"})
     */
    private $stringConfig;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stringConfig = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setDate(new \DateTime());
    }

    /**
     * Add stringConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $stringConfig
     *
     * @return BlockConf
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
}
