<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * StringConf
 *
 * @ORM\Table(name="StringConf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\StringConfRepository")
 */
class StringConf
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="byDefault", type="string", length=255, nullable=true)
     */
    private $byDefault;

    /**
     * @var int
     *
     * @ORM\Column(name="orders", type="integer", nullable=true)
     */
    private $orders;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="activity", type="boolean", nullable=true)
     */
    private $activity;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\BlockConf", inversedBy="stringConfig")
     * @ORM\JoinColumn(name="blockConfig_id", referencedColumnName="id")
     */
    private $blockConfig;

    /**
     * @var BlockConf
     * @ORM\ManyToMany(targetEntity="StringConf", inversedBy="dependent", cascade={"all"})
     * @ORM\JoinTable(name="string_relation",
     *     joinColumns={@ORM\JoinColumn(name="dependent_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="dependency_id", referencedColumnName="id")}
     * )
     */
    private $dependencies;

    /**
     * @var BlockConf
     * @ORM\ManyToMany(targetEntity="StringConf", mappedBy="dependencies", cascade={"all"})
     */
    private $dependent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return BlockConf
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @param BlockConf $dependencies
     */
    public function setDependencies($dependencies)
    {
        $this->dependencies[] = $dependencies;
    }

    /**
     * @return BlockConf
     */
    public function getDependent()
    {
        return $this->dependent;
    }

    /**
     * @param BlockConf $dependent
     */
    public function setDependent($dependent)
    {
        $this->dependent[] = $dependent;
    }


    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return boolean
     */
    public function isActivity()
    {
        return $this->activity;
    }

    /**
     * @param boolean $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
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
     * @return StringConf
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
     * @return StringConf
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
     * Set type
     *
     * @param string $type
     *
     * @return StringConf
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set byDefault
     *
     * @param string $byDefault
     *
     * @return StringConf
     */
    public function setByDefault($byDefault)
    {
        $this->byDefault = $byDefault;

        return $this;
    }

    /**
     * Get byDefault
     *
     * @return string
     */
    public function getByDefault()
    {
        return $this->byDefault;
    }

    /**
     * Set orders
     *
     * @param integer $orders
     *
     * @return StringConf
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return int
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set blockConfig
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\BlockConf $blockConfig
     *
     * @return StringConf
     */
    public function setBlockConfig(\Jluct\ConfiguratorServerBundle\Entity\BlockConf $blockConfig = null)
    {
        $this->blockConfig = $blockConfig;

        return $this;
    }

    /**
     * Get blockConfig
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\BlockConf
     */
    public function getBlockConfig()
    {
        return $this->blockConfig;
    }

    /**
     * @var Meanings
     *
     * @ORM\OneToMany(targetEntity="Jluct\ConfiguratorServerBundle\Entity\Meanings", mappedBy="stringConfig", cascade={"persist"})
     *
     */
    private $meanings;


    public function __construct()
    {
        $this->meanings = new ArrayCollection();
        $this->dependencies = new ArrayCollection();
        $this->dependent = new ArrayCollection();
        $this->date = new \DateTime();
    }

    /**
     * Add meaning
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Meanings $meaning
     *
     * @return StringConf
     */
    public function addMeaning(\Jluct\ConfiguratorServerBundle\Entity\Meanings $meaning)
    {
        $this->meanings[] = $meaning;

        return $this;
    }

    /**
     * Remove meaning
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Meanings $meaning
     */
    public function removeMeaning(\Jluct\ConfiguratorServerBundle\Entity\Meanings $meaning)
    {
        $this->meanings->removeElement($meaning);
    }

    /**
     * Get meanings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMeanings()
    {
        return $this->meanings;
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
     * Add child
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $child
     *
     * @return StringConf
     */
    public function addChild(\Jluct\ConfiguratorServerBundle\Entity\StringConf $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $child
     */
    public function removeChild(\Jluct\ConfiguratorServerBundle\Entity\StringConf $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Add parent
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $parent
     *
     * @return StringConf
     */
    public function addParent(\Jluct\ConfiguratorServerBundle\Entity\StringConf $parent)
    {
        $this->parent[] = $parent;

        return $this;
    }

    /**
     * Remove parent
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $parent
     */
    public function removeParent(\Jluct\ConfiguratorServerBundle\Entity\StringConf $parent)
    {
        $this->parent->removeElement($parent);
    }

    /**
     * Add dependency
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $dependency
     *
     * @return StringConf
     */
    public function addDependency(\Jluct\ConfiguratorServerBundle\Entity\StringConf $dependency)
    {
        $this->dependencies[] = $dependency;

        return $this;
    }

    /**
     * Remove dependency
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $dependency
     */
    public function removeDependency(\Jluct\ConfiguratorServerBundle\Entity\StringConf $dependency)
    {
        $this->dependencies->removeElement($dependency);
    }

    /**
     * Add dependent
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $dependent
     *
     * @return StringConf
     */
    public function addDependent(\Jluct\ConfiguratorServerBundle\Entity\StringConf $dependent)
    {
        $this->dependent[] = $dependent;

        return $this;
    }

    /**
     * Remove dependent
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\StringConf $dependent
     */
    public function removeDependent(\Jluct\ConfiguratorServerBundle\Entity\StringConf $dependent)
    {
        $this->dependent->removeElement($dependent);
    }
}
