<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Jluct\ConfiguratorServerBundle\Entity\FileConf;
use Jluct\ConfiguratorServerBundle\Entity\ParamConf;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * BlockConf
 *
 * @ORM\Table(name="GroupConf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\GroupConfRepository")
 */
class GroupConf
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
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     * @ORM\Column(name="required", type="boolean", nullable=true)
     */
    private $required;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="orders", type="integer", nullable=true)
     */
    private $orders;

    /**
     * @var bool
     * @ORM\Column(name="activity", type="boolean", nullable=true)
     */
    private $activity;

    /**
     * @var GroupConf $dependencies
     * @ORM\ManyToMany(targetEntity="GroupConf", inversedBy="dependent", cascade={"all"})
     * @ORM\JoinTable(name="group_relation",
     *     joinColumns={@ORM\JoinColumn(name="dependent_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="dependency_id", referencedColumnName="id")}
     * )
     */
    private $dependencies;

    /**
     * @var GroupConf $dependent
     * @ORM\ManyToMany(targetEntity="GroupConf", mappedBy="dependencies", cascade={"all"})
     */
    private $dependent;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="ParamConf", mappedBy="groupConf", cascade={"persist"})
     */
    private $param;

    /**
     * @ORM\ManyToOne(targetEntity="FileConf", inversedBy="groupsConfig")
     * @ORM\JoinColumn(name="fileConf_id", referencedColumnName="id")
     */
    private $fileConf;
    
}
