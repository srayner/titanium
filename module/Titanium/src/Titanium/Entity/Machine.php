<?php

namespace Titanium\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
  * @ORM\Table(name="machine")
  */
class Machine extends AbstractEntity
{
    /** @ORM\Column(type="string") */
    protected $name;
    
    /** @ORM\Column(type="string", name="machine_name") */
    protected $type;
    
    /**
     * @ORM\ManyToOne(targetEntity="Plant", inversedBy="plants")
     * @ORM\JoinColumn(name="plant_id", referencedColumnName="id")
     */
    protected $plant;
    
    function getName()
    {
        return $this->name;
    }

    function getType()
    {
        return $this->type;
    }

    function getPlant()
    {
        return $this->plant;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function setPlant($plant)
    {
        $this->plant = $plant;
    }


}