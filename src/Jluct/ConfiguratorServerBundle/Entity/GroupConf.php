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
