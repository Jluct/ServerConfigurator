<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\TypeRepository")
 */
class Type implements CompositionInterface
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
	 * @ORM\Column(name="name", type="string")
	 */
	private $name;
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
	private $composition;

	/**
	 * @var string
	 * @ORM\Column(name="value", type="string")
	 */
	private $value;

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
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
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
	 * @return boolean
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
	 * @param array $composition
	 *
	 * @return Type
	 */
	public function setComposition($composition)
	{
		$this->composition = $composition;

		return $this;
	}

	/**
	 * Get pattern
	 *
	 * @return array
	 */
	public function getComposition()
	{
		return $this->composition;
	}

	/**
	 * Set value
	 *
	 * @param string $value
	 *
	 * @return Type
	 */
	public function setValue($value)
	{
		$this->value = $value;

		return $this;
	}

	/**
	 * Get value
	 *
	 * @return string
	 */
	public function getValue()
	{
		return $this->value;
	}
}
