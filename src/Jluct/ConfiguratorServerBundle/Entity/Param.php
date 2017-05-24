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
