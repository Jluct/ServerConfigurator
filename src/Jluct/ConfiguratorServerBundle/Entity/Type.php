<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
	 * @var bool
	 *
	 * @ORM\Column(name="required", type="boolean")
	 */
	private $required;

	/**
	 * @var array
	 *
	 * @ORM\Column(name="rules", type="array")
	 */
	private $rules;

	/**
	 * @var Pattern $patterns
	 *
	 * @ORM\Column(name="pattern", type="array")
	 */
	private $pattern;

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
	 * Set required
	 *
	 * @param boolean $required
	 *
	 * @return Type
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
     * Set pattern
     *
     * @param array $pattern
     *
     * @return Type
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Get pattern
     *
     * @return array
     */
    public function getPattern()
    {
        return $this->pattern;
    }
}
