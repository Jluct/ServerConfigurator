<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Jluct\ConfiguratorServerBundle\Entity\Primitive;
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
	 * @ORM\ManyToOne(targetEntity="Primitive")
	 * @ORM\JoinColumn(name="primitive_id", referencedColumnName="id")
	 */
	private $primitive;

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
	 * @return mixed
	 */
	public function getValue($id)
	{
		return $this->value[$id];
	}


	public function addValue($id, $value)
	{
		$this->value[$id] = $value;

		return $this;
	}

	public function removeValue($id)
	{
		unset($this->value[$id]);

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
	 * @param Primitive $primitive
	 *
	 * @return Type
	 */
	public function setPrimitive(Primitive $primitive)
	{
		$this->primitive = $primitive;

		return $this;
	}

	/**
	 * Get pattern
	 *
	 * @return array
	 */
	public function getPrimitive()
	{
		return $this->primitive;
	}

	/**
	 * Type constructor.
	 * @param \Jluct\ConfiguratorServerBundle\Entity\Primitive $primitive
	 */
	public function __construct(Primitive $primitive)
	{
		$this->setPrimitive($primitive);
		$this->primitive = new ArrayCollection();
	}
}
