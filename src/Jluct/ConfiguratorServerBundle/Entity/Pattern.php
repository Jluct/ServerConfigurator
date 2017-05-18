<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pattern
 *
 * @ORM\Table(name="pattern")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\PatternRepository")
 */
class Pattern implements CompositionInterface
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
	 * @var Param $param
	 *
	 * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\ParamConf", inversedBy="patterns")
	 * @ORM\JoinColumn(name="paramConf_id", referencedColumnName="id")
	 */
	private $param;

	/**
	 * @var array Type
	 *
	 * @ORM\Column(name="composition", type="array")
	 *
	 */
	private $composition;



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
     * Set composition
     *
     * @param array $composition
     *
     * @return Pattern
     */
    public function setComposition($composition)
    {
        $this->composition = $composition;

        return $this;
    }

    /**
     * Get composition
     *
     * @return array
     */
    public function getComposition()
    {
        return $this->composition;
    }

    /**
     * Set param
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\ParamConf $param
     *
     * @return Pattern
     */
    public function setParam(\Jluct\ConfiguratorServerBundle\Entity\ParamConf $param = null)
    {
        $this->param = $param;

        return $this;
    }

    /**
     * Get param
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\ParamConf
     */
    public function getParam()
    {
        return $this->param;
    }
}
