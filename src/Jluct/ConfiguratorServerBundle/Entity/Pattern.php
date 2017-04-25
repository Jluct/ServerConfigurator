<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pattern
 *
 * @ORM\Table(name="pattern")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\PatternRepository")
 */
class Pattern
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
     * @var array
     *
     * @ORM\Column(name="rules", type="array", nullable=true)
     */
    private $rules;

    /**
     * @var ParamConf $paramConf
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\ParamConf", inversedBy="patterns")
     * @ORM\JoinColumn(name="paramConf_id", referencedColumnName="id")
     */
    private $paramConf;

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
     * @return Pattern
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
     * Set rules
     *
     * @param array $rules
     *
     * @return Pattern
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
     * Set paramConf
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\ParamConf $paramConf
     *
     * @return Pattern
     */
    public function setParamConf(\Jluct\ConfiguratorServerBundle\Entity\ParamConf $paramConf = null)
    {
        $this->paramConf = $paramConf;

        return $this;
    }

    /**
     * Get paramConf
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\ParamConf
     */
    public function getParamConf()
    {
        return $this->paramConf;
    }
}
