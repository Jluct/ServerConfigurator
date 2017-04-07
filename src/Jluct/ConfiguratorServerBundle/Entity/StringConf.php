<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StringConf
 *
 * @ORM\Table(name="string_conf")
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
}
