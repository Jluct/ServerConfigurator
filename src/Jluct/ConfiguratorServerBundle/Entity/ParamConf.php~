<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ParamConf
 *
 * @ORM\Table(name="ParamConf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\ParamConfRepository")
 */
class ParamConf
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
     * @var Pattern $pattern
     *
     * @ORM\OneToMany(targetEntity="Jluct\ConfiguratorServerBundle\Entity\Pattern", mappedBy="paramConf")
     */
    private $patterns;

    /**
     * @var Pattern $usePattern
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\Pattern")
     * @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
     */
    private $usePattern;

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
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    /**
     * @var boolean
     * @ORM\Column(name="isRepeated", type="boolean", nullable=true)
     */
    private $isRepeated;

    /**
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\GroupConf", inversedBy="paramConf")
     * @ORM\JoinColumn(name="groupConf_id", referencedColumnName="id")
     */
    private $groupConf;

    /**
     * @var ParamConf
     * @ORM\ManyToMany(targetEntity="ParamConf", inversedBy="dependent", cascade={"all"})
     * @ORM\JoinTable(name="string_relation",
     *     joinColumns={@ORM\JoinColumn(name="dependent_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="dependency_id", referencedColumnName="id")}
     * )
     */
    private $dependencies;

    /**
     * @var ParamConf
     * @ORM\ManyToMany(targetEntity="ParamConf", mappedBy="dependencies", cascade={"all"})
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
     * @return ParamConf
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @param ParamConf $dependencies
     */
    public function setDependencies($dependencies)
    {
        $this->dependencies[] = $dependencies;
    }

    /**
     * @return ParamConf
     */
    public function getDependent()
    {
        return $this->dependent;
    }

    /**
     * @param ParamConf $dependent
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
     * @return ParamConf
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
     * @return ParamConf
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
     * Set byDefault
     *
     * @param string $byDefault
     *
     * @return ParamConf
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
     * @return ParamConf
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
     * @param GroupConf $groupConfig
     *
     * @return ParamConf
     */
    public function setGroupConfig(GroupConf $groupConfig = null)
    {
        $this->groupConf = $groupConfig;

        return $this;
    }

    /**
     * Get blockConfig
     *
     * @return GroupConf
     */
    public function getGroupConfig()
    {
        return $this->groupConf;
    }

    /**
     * @return boolean
     */
    public function isRepeated()
    {
        return $this->isRepeated;
    }

    /**
     * @param boolean $isRepeated
     */
    public function setIsRepeated($isRepeated)
    {
        $this->isRepeated = $isRepeated;
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
     * @param ParamConf $dependency
     *
     * @return ParamConf
     */
    public function addDependency(ParamConf $dependency)
    {
        $this->dependencies[] = $dependency;

        return $this;
    }

    /**
     * Remove dependency
     *
     * @param ParamConf $dependency
     */
    public function removeDependency(ParamConf $dependency)
    {
        $this->dependencies->removeElement($dependency);
    }

    /**
     * Add dependent
     *
     * @param ParamConf $dependent
     *
     * @return ParamConf
     */
    public function addDependent(ParamConf $dependent)
    {
        $this->dependent[] = $dependent;

        return $this;
    }

    /**
     * Remove dependent
     *
     * @param ParamConf $dependent
     */
    public function removeDependent(ParamConf $dependent)
    {
        $this->dependent->removeElement($dependent);
    }

    public function __construct()
    {
        $this->dependencies = new ArrayCollection();
        $this->dependent = new ArrayCollection();
        $this->patterns = new ArrayCollection();
        $this->date = new \DateTime();
    }



    /**
     * Get isRepeated
     *
     * @return boolean
     */
    public function getIsRepeated()
    {
        return $this->isRepeated;
    }

    /**
     * Add pattern
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern
     *
     * @return ParamConf
     */
    public function addPattern(\Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern)
    {
        $this->patterns[] = $pattern;

        return $this;
    }

    /**
     * Remove pattern
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern
     */
    public function removePattern(\Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern)
    {
        $this->patterns->removeElement($pattern);
    }

    /**
     * Get patterns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatterns()
    {
        return $this->patterns;
    }

    /**
     * Set usePattern
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Pattern $usePattern
     *
     * @return ParamConf
     */
    public function setUsePattern(\Jluct\ConfiguratorServerBundle\Entity\Pattern $usePattern = null)
    {
        $this->usePattern = $usePattern;

        return $this;
    }

    /**
     * Get usePattern
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\Pattern
     */
    public function getUsePattern()
    {
        return $this->usePattern;
    }

    /**
     * Set groupConf
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $groupConf
     *
     * @return ParamConf
     */
    public function setGroupConf(\Jluct\ConfiguratorServerBundle\Entity\GroupConf $groupConf = null)
    {
        $this->groupConf = $groupConf;

        return $this;
    }

    /**
     * Get groupConf
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\GroupConf
     */
    public function getGroupConf()
    {
        return $this->groupConf;
    }
}
