<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 15.05.2017
 * Time: 10:41
 */

namespace Jluct\ConfiguratorServerBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ParamConf
 * @ORM\Table(name="ParamConf")
 * @ORM\Entity(repositoryClass="Jluct\ConfiguratorServerBundle\Repository\ParamConfRepository")
 */
class ParamConf
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
	 * @var boolean
	 * @ORM\Column(name="isRepeated", type="boolean", nullable=true)
	 */
	private $isRepeated;

	/**
	 * @var Pattern $pattern
	 *
	 * @ORM\OneToMany(targetEntity="Jluct\ConfiguratorServerBundle\Entity\Pattern", mappedBy="param")
	 */
	private $patterns;
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patterns = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return ParamConf
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
     * Set isRepeated
     *
     * @param boolean $isRepeated
     *
     * @return ParamConf
     */
    public function setIsRepeated($isRepeated)
    {
        $this->isRepeated = $isRepeated;

        return $this;
    }

    /**
     * Get isRepeated
     *
     * @return boolean
     */
    public function getIsRepeated()
    {
        return $this->isRepeated;
    }

    /**
     * Add pattern
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern
     *
     * @return ParamConf
     */
    public function addPattern(\Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern)
    {
        $this->patterns[] = $pattern;

        return $this;
    }

    /**
     * Remove pattern
     *
     * @param \Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern
     */
    public function removePattern(\Jluct\ConfiguratorServerBundle\Entity\Pattern $pattern)
    {
        $this->patterns->removeElement($pattern);
    }

    /**
     * Get patterns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatterns()
    {
        return $this->patterns;
    }
}
