<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Jluct\ConfiguratorServerBundle\Entity\FileConf;
use Jluct\ConfiguratorServerBundle\Entity\ParamConf;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * BlockConf
 *
 * @ORM\Table(name="GroupConf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\GroupConfRepository")
 */
class GroupConf
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
     * @var GroupConf $dependencies
     * @ORM\ManyToMany(targetEntity="GroupConf", inversedBy="dependent", cascade={"all"})
     * @ORM\JoinTable(name="group_relation",
     *     joinColumns={@ORM\JoinColumn(name="dependent_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="dependency_id", referencedColumnName="id")}
     * )
     */
    private $dependencies;

    /**
     * @var GroupConf $dependent
     * @ORM\ManyToMany(targetEntity="GroupConf", mappedBy="dependencies", cascade={"all"})
     */
    private $dependent;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="ParamConf", mappedBy="groupConf", cascade={"persist"})
     */
    private $paramConf;

    /**
     * @ORM\ManyToOne(targetEntity="FileConf", inversedBy="groupsConfig")
     * @ORM\JoinColumn(name="fileConf_id", referencedColumnName="id")
     */
    private $fileConf;

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
     * @return GroupConf
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
     * @return GroupConf
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
     * @return GroupConf
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
     * Set Config
     *
     * @param FileConf $fileConf
     * @return GroupConf
     */
    public function setConfig(FileConf $fileConf = null)
    {
        $this->fileConf = $fileConf;

        return $this;
    }

    /**
     * Get fileConfig
     *
     * @return FileConf
     */
    public function getFileConf()
    {
        return $this->fileConf;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setDate(new \DateTime());
        $this->paramConf = new ArrayCollection();
        $this->dependencies = new ArrayCollection();
        $this->dependent = new ArrayCollection();
    }

    /**
     * Add paramConfig
     *
     * @param ParamConf $paramConf
     * @return GroupConf
     */
    public function addParamConf(ParamConf $paramConf)
    {
        $this->paramConf[] = $paramConf;

        return $this;
    }

    /**
     * Remove paramConfig
     *
     * @param ParamConf $paramConf
     */
    public function removeParamConf(ParamConf $paramConf)
    {
        $this->paramConf->removeElement($paramConf);
    }

    /**
     * Get paramConfig
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParamConf()
    {
        return $this->paramConf;
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
     * @param GroupConf $dependency
     *
     * @return GroupConf
     */
    public function addDependency(GroupConf $dependency)
    {
        $this->dependencies[] = $dependency;

        return $this;
    }

    /**
     * Remove dependency
     *
     * @param GroupConf $dependency
     */
    public function removeDependency(GroupConf $dependency)
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
     * @param GroupConf $dependent
     *
     * @return GroupConf
     */
    public function addDependent(GroupConf $dependent)
    {
        $this->dependent[] = $dependent;

        return $this;
    }

    /**
     * Remove dependent
     *
     * @param GroupConf $dependent
     */
    public function removeDependent(GroupConf $dependent)
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

    /**
     * Set fileConf
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\FileConf $fileConf
     *
     * @return GroupConf
     */
    public function setFileConf(\Jluct\ConfiguratorServerBundle\Entity\FileConf $fileConf = null)
    {
        $this->fileConf = $fileConf;

        return $this;
    }
}