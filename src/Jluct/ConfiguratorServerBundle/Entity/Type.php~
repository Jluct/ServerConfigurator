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
	 * @var string
	 * @ORM\Column(name="value", type="string")
	 */
	private $value;
}
