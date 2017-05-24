<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 24.05.2017
 * Time: 10:05
 */
class ParamValidator
{
	private $pattern;
	private $constructor;

	public function __construct(\Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern,
	                            ConditionConstructor $constructor)
	{
		$this->pattern = $pattern;
		$this->constructor = $constructor;
	}


	public function isValid()
	{
		return ($this->isValidStructure() == $this->isValidValue()) == true;
	}

	public function isValidStructure()
	{

	}

	public function isValidValue()
	{

	}

}

//['IF' => [
//	'CONDITION' => [
//		['OR',
//			['NOT', '{{2.VALUE}}', 'NULL'],
//			['NOT', '{{1.VALUE}}', 'NULL']
//		]
//	]
//], 'THEN' => [
//	['IS', '2.VALUE', '-l'],
//	['NOT', '{{2.VALUE}}', 'NULL']
//]
//]