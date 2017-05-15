<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Param
 *
 * @ORM\Table(name="Param")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\ParamRepository")
 */
class Param
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
	 * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\GroupConf", inversedBy="param")
	 * @ORM\JoinColumn(name="groupConf_id", referencedColumnName="id")
	 */
	private $groupConf;

	/**
	 * @var Param
	 * @ORM\ManyToMany(targetEntity="Param", inversedBy="dependent", cascade={"all"})
	 * @ORM\JoinTable(name="param_relation",
	 *     joinColumns={@ORM\JoinColumn(name="dependent_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@ORM\JoinColumn(name="dependency_id", referencedColumnName="id")}
	 * )
	 */
	private $dependencies;

	/**
	 * @var Param
	 * @ORM\ManyToMany(targetEntity="Param", mappedBy="dependencies", cascade={"all"})
	 */
	private $dependent;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date", type="datetime")
	 */
	private $date;

	/**
	 * @var ParamConf
	 * @ORM\ManyToOne(targetEntity="ParamConf", inversedBy="param")
	 * @ORM\JoinColumn(name="paramConf_id", referencedColumnName="id")
	 */
	private $paramConf;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->dependencies = new \Doctrine\Common\Collections\ArrayCollection();
		$this->dependent = new \Doctrine\Common\Collections\ArrayCollection();
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
	 * @return Param
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
	 * @return Param
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
	 * Set byDefault
	 *
	 * @param string $byDefault
	 *
	 * @return Param
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
	 * @return Param
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
	 * Set description
	 *
	 * @param string $description
	 *
	 * @return Param
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
	 * Set activity
	 *
	 * @param boolean $activity
	 *
	 * @return Param
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
	 * Set date
	 *
	 * @param \DateTime $date
	 *
	 * @return Param
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
	 * Set usePattern
	 *
	 * @param \Jluct\ConfiguratorServerBundle\Entity\Pattern $usePattern
	 *
	 * @return Param
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
	 * @return Param
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

	/**
	 * Add dependency
	 *
	 * @param \Jluct\ConfiguratorServerBundle\Entity\Param $dependency
	 *
	 * @return Param
	 */
	public function addDependency(\Jluct\ConfiguratorServerBundle\Entity\Param $dependency)
	{
		$this->dependencies[] = $dependency;

		return $this;
	}

	/**
	 * Remove dependency
	 *
	 * @param \Jluct\ConfiguratorServerBundle\Entity\Param $dependency
	 */
	public function removeDependency(\Jluct\ConfiguratorServerBundle\Entity\Param $dependency)
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
	 * @param \Jluct\ConfiguratorServerBundle\Entity\Param $dependent
	 *
	 * @return Param
	 */
	public function addDependent(\Jluct\ConfiguratorServerBundle\Entity\Param $dependent)
	{
		$this->dependent[] = $dependent;

		return $this;
	}

	/**
	 * Remove dependent
	 *
	 * @param \Jluct\ConfiguratorServerBundle\Entity\Param $dependent
	 */
	public function removeDependent(\Jluct\ConfiguratorServerBundle\Entity\Param $dependent)
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
	 * Add paramConf
	 *
	 * @param \Jluct\ConfiguratorServerBundle\Entity\ParamConf $paramConf
	 *
	 * @return Param
	 */
	public function addParamConf(\Jluct\ConfiguratorServerBundle\Entity\ParamConf $paramConf)
	{
		$this->paramConf = $paramConf;

		return $this;
	}

	/**
	 * Get paramConf
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getParamConf()
	{
		return $this->paramConf;
	}
}
