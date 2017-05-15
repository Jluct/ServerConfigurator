<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Param
 *
 * @ORM\Table(name="Param")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\ParamRepository")
 */
class Param
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
     * @var bool
     *
     * @ORM\Column(name="required", type="boolean", nullable=true)
     */
    private $required;

    /**
     * @var Pattern $usePattern
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\Pattern")
     * @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
     */
    private $usePattern;

    /**
     * @var string
     *
     * @ORM\Column(name="byDefault", type="string", length=255, nullable=true)
     */
    private $byDefault;

    /**
     * @var int
     *
     * @ORM\Column(name="orders", type="integer", nullable=true)
     */
    private $orders;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="activity", type="boolean", nullable=true)
     */
    private $activity;

    /**
     * @ORM\ManyToOne(targetEntity="Jluct\ConfiguratorServerBundle\Entity\GroupConf", inversedBy="param")
     * @ORM\JoinColumn(name="groupConf_id", referencedColumnName="id")
     */
    private $groupConf;

    /**
     * @var Param
     * @ORM\ManyToMany(targetEntity="Param", inversedBy="dependent", cascade={"all"})
     * @ORM\JoinTable(name="param_relation",
     *     joinColumns={@ORM\JoinColumn(name="dependent_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="dependency_id", referencedColumnName="id")}
     * )
     */
    private $dependencies;

    /**
     * @var Param
     * @ORM\ManyToMany(targetEntity="Param", mappedBy="dependencies", cascade={"all"})
     */
    private $dependent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var ParamConf
     * @ORM\JoinColumn(targetEntity="ParamConf", mappedBy="param")
     */
    private $paramConf;

}
