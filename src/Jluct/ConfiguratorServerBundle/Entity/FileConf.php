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
	 * @var ArrayCollection $groupsConfig
	 * @ORM\OneToMany(targetEntity="GroupConf", mappedBy="fileConf", cascade={"persist"})
	 */
	private $groupsConfig;

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
     * Constructor
     */
    public function __construct()
    {
        $this->groupsConf = new ArrayCollection();
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
