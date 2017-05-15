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


}
