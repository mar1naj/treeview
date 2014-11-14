<?php

namespace Passport\Bundle\TreeviewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Child
 *
 * @ORM\Table(name="child", indexes={@ORM\Index(name="parent", columns={"parent"})})
 * @ORM\Entity
 */
class Child
{
    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Passport\Bundle\TreeviewBundle\Entity\Factory
     *
     * @ORM\ManyToOne(targetEntity="Passport\Bundle\TreeviewBundle\Entity\Factory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent", referencedColumnName="id")
     * })
     */
    private $parent;



    /**
     * Set value
     *
     * @param integer $value
     * @return Child
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
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
     * Set parent
     *
     * @param \Passport\Bundle\TreeviewBundle\Entity\Factory $parent
     * @return Child
     */
    public function setParent(\Passport\Bundle\TreeviewBundle\Entity\Factory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Passport\Bundle\TreeviewBundle\Entity\Factory 
     */
    public function getParent()
    {
        return $this->parent;
    }
}
