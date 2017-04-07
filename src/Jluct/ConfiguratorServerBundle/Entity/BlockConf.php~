<?php

namespace Jluct\ConfiguratorServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlockConf
 *
 * @ORM\Table(name="block_conf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\BlockConfRepository")
 */
class BlockConf
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
     * @return BlockConf
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
     * Set required
     *
     * @param boolean $required
     *
     * @return BlockConf
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return bool
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return BlockConf
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
     * @var FileConf $fileConf
     *
     * @ORM\OneToMany(targetEntity="FileConf", mappedBy="blockConf")
     */
    private $fileConf;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fileConf = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fileConf
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\FileConf $fileConf
     *
     * @return BlockConf
     */
    public function addFileConf(\Jluct\ConfiguratorServerBundle\Entity\FileConf $fileConf)
    {
        $this->fileConf[] = $fileConf;

        return $this;
    }

    /**
     * Remove fileConf
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\FileConf $fileConf
     */
    public function removeFileConf(\Jluct\ConfiguratorServerBundle\Entity\FileConf $fileConf)
    {
        $this->fileConf->removeElement($fileConf);
    }

    /**
     * Get fileConf
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFileConf()
    {
        return $this->fileConf;
    }
}
