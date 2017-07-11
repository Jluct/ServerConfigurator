<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\TypeRepository")
 */
class Type
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
     * @var array
     *
     * @ORM\Column(name="rules", type="array", nullable=true)
     */
    private $rules;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Jluct\ConfiguratorServerBundle\Entity\Type", mappedBy="parent")
     *
     */
    private $components;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\Type", inversedBy="components")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;


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
     * Set rules
     *
     * @param array $rules
     *
     * @return Type
     */
    public function setRules($rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Get rules
     *
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Set components
     *
     * @param string $components
     *
     * @return Type
     */
    public function setComponents($components)
    {
        $this->components = $components;

        return $this;
    }

    /**
     * Get components
     *
     * @return string
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Type
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
     * Set role
     *
     * @param string $role
     *
     * @return Type
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    public function __construct()
    {
        $this->components = new ArrayCollection();
    }

    /**
     * Add component
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Type $component
     *
     * @return Type
     */
    public function addComponent(\Jluct\ConfiguratorServerBundle\Entity\Type $component)
    {
        $this->components[] = $component;

        return $this;
    }

    /**
     * Remove component
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Type $component
     */
    public function removeComponent(\Jluct\ConfiguratorServerBundle\Entity\Type $component)
    {
        $this->components->removeElement($component);
    }

    /**
     * Set parent
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Type $parent
     *
     * @return Type
     */
    public function setParent(\Jluct\ConfiguratorServerBundle\Entity\Type $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\Type
     */
    public function getParent()
    {
        return $this->parent;
    }
}
