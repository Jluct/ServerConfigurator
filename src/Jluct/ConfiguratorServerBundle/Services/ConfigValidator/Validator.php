<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 11.07.2017
 * Time: 9:59
 */

namespace Jluct\ConfiguratorServerBundle\Services\ConfigValidator;


class Validator
{
    private $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function validateValue()
    {
//        get_class($this->param)
    }
}