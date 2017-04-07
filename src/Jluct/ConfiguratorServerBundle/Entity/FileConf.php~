<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * FileConf
 *
 * @ORM\Table(name="file_conf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\FileConfRepository")
 */
class FileConf
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
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return FileConf
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return FileConf
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return FileConf
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @var ArrayCollection
     *
     *
     * @ORM\ManyToOne(targetEntity="BlockConf", inversedBy="fileConf")
     * @ORM\JoinColumn(name="FileConf_id", referencedColumnName="id")
     */
    private $blockConf;

    public function __construct()
    {
        $this->blockConf = new ArrayCollection();
    }


    /**
     * Set blockConf
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\BlockConf $blockConf
     *
     * @return FileConf
     */
    public function setBlockConf(\Jluct\ConfiguratorServerBundle\Entity\BlockConf $blockConf = null)
    {
        $this->blockConf = $blockConf;

        return $this;
    }

    /**
     * Get blockConf
     *
     * @return \Jluct\ConfiguratorServerBundle\Entity\BlockConf
     */
    public function getBlockConf()
    {
        return $this->blockConf;
    }
}
