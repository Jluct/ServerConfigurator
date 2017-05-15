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
    private $param;

    /**
     * @ORM\ManyToOne(targetEntity="FileConf", inversedBy="groupsConfig")
     * @ORM\JoinColumn(name="fileConf_id", referencedColumnName="id")
     */
    private $fileConf;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dependencies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dependent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->param = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return boolean
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
     * Set description
     *
     * @param string $description
     *
     * @return GroupConf
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set orders
     *
     * @param integer $orders
     *
     * @return GroupConf
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return integer
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set activity
     *
     * @param boolean $activity
     *
     * @return GroupConf
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
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
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $dependency
     *
     * @return GroupConf
     */
    public function addDependency(\Jluct\ConfiguratorServerBundle\Entity\GroupConf $dependency)
    {
        $this->dependencies[] = $dependency;

        return $this;
    }

    /**
     * Remove dependency
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $dependency
     */
    public function removeDependency(\Jluct\ConfiguratorServerBundle\Entity\GroupConf $dependency)
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
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $dependent
     *
     * @return GroupConf
     */
    public function addDependent(\Jluct\ConfiguratorServerBundle\Entity\GroupConf $dependent)
    {
        $this->dependent[] = $dependent;

        return $this;
    }

    /**
     * Remove dependent
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\GroupConf $dependent
     */
    public function removeDependent(\Jluct\ConfiguratorServerBundle\Entity\GroupConf $dependent)
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
     * Add param
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\ParamConf $param
     *
     * @return GroupConf
     */
    public function addParam(\Jluct\ConfiguratorServerBundle\Entity\ParamConf $param)
    {
        $this->param[] = $param;

        return $this;
    }

    /**
     * Remove param
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\ParamConf $param
     */
    public function removeParam(\Jluct\ConfiguratorServerBundle\Entity\ParamConf $param)
    {
        $this->param->removeElement($param);
    }

    /**
     * Get param
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParam()
    {
        return $this->param;
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

    /**
     * Get fileConf
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\FileConf
     */
    public function getFileConf()
    {
        return $this->fileConf;
    }
}
