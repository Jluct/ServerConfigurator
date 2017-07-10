<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 24.05.2017
 * Time: 10:05
 */

namespace Jluct\ConfiguratorServerBundle\Services\ParamValidator;


use \Jluct\ConfiguratorServerBundle\Entity\ParamConf;
use Doctrine\Common\Collections\Collection;
use Jluct\ConfiguratorServerBundle\Entity\Type;

use Jluct\ConfiguratorServerBundle\Services\ConditionConstructor\ConditionConstructor;

class ParamValidator
{
    private $param;
    private $constructor;

    public function __construct(ParamConf $param,
                                ConditionConstructor $constructor)
    {
        $this->param = $param;
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
        $this->valid($this->param->getPatterns());
    }

    public function valid(Collection $array)
    {
        foreach ($array as &$item) {
            if (get_class($item) == 'Pattern')
                $this->valid($item->getPatterns());
            else
                $this->validType($item);


        }
    }

    public function validType(Type $type)
    {
        return preg_match($type->getRules(), $type->getValue());
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