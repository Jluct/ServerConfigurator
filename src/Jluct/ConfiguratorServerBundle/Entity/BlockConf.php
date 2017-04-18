<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     * @ORM\Column(name="required", type="boolean", nullable=true)
     */
    private $required;

    /**
     * @var \DateTime
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
     * @var int
     *
     * @ORM\Column(name="orders", type="integer", nullable=true)
     */
    private $orders;

    /**
     * @var bool
     * @ORM\Column(name="activity", type="boolean", nullable=true)
     */
    private $activity;

    /**
     * @var BlockConf
     * @ORM\ManyToMany(targetEntity="BlockConf", inversedBy="dependent", cascade={"all"})
     * @ORM\JoinTable(name="block_relation",
     *     joinColumns={@ORM\JoinColumn(name="dependent_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="dependency_id", referencedColumnName="id")}
     * )
     */
    private $dependencies;

    /**
     * @var BlockConf
     * @ORM\ManyToMany(targetEntity="BlockConf", mappedBy="dependencies", cascade={"all"})
     */
    private $dependent;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Jluct\ConfiguratorServerBundle\Entity\StringConf", mappedBy="blockConfig", cascade={"persist"})
     */
    private $stringConfig;

    /**
     * @return boolean
     */
    public function isActivity()
    {
        return $this->activity;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\FileConf", inversedBy="blockConfig")
     * @ORM\JoinColumn(name="fileConfig_id", referencedColumnName="id")
     */
    private $fileConfig;

    /**
     * @param boolean $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return int
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param int $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

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
     * Constructor
     */
    public function __construct()
    {
        $this->setDate(new \DateTime());
        $this->stringConfig = new ArrayCollection();
        $this->dependencies = new ArrayCollection();
        $this->dependent = new ArrayCollection();
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

    /**
     * Get activity
     *
     * @return boolean
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Add dependency
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\BlockConf $dependency
     *
     * @return BlockConf
     */
    public function addDependency(\Jluct\ConfiguratorServerBundle\Entity\BlockConf $dependency)
    {
        $this->dependencies[] = $dependency;

        return $this;
    }

    /**
     * Remove dependency
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\BlockConf $dependency
     */
    public function removeDependency(\Jluct\ConfiguratorServerBundle\Entity\BlockConf $dependency)
    {
        $this->dependencies->removeElement($dependency);
    }

    /**
     * Get dependencies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * Add dependent
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\BlockConf $dependent
     *
     * @return BlockConf
     */
    public function addDependent(\Jluct\ConfiguratorServerBundle\Entity\BlockConf $dependent)
    {
        $this->dependent[] = $dependent;

        return $this;
    }

    /**
     * Remove dependent
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\BlockConf $dependent
     */
    public function removeDependent(\Jluct\ConfiguratorServerBundle\Entity\BlockConf $dependent)
    {
        $this->dependent->removeElement($dependent);
    }

    /**
     * Get dependent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDependent()
    {
        return $this->dependent;
    }
}
