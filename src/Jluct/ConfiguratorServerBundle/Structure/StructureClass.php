<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 11.07.2017
 * Time: 10:28
 */

namespace Jluct\ConfiguratorServerBundle\Structure;

use Doctrine\Common\Collections\ArrayCollection;

class StructureClass
{

    private $components;

    private $rules;

    /**
     * Возвращает компоненты струкруры конфига
     * @return ArrayCollection
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Возвращает правила валидации для ConditionConstructor
     * @return ArrayCollection
     */
    public function getRules()
    {
        return $this->rules;
    }

    public function addComponents(StructureClass $component)
    {
        $this->components[] = $component;
    }

    public function __construct()
    {
        $this->components = new ArrayCollection();
    }


}