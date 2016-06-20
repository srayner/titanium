<?php

namespace Titanium\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
  * @ORM\Table(name="plant")
  */

class Plant extends AbstractEntity
{
    /** @ORM\Column(type="string") */
    protected $name;
    
    /** @ORM\Column(type="string") */
    protected $site;
    
    function getName()
    {
        return $this->name;
    }

    function getSite()
    {
        return $this->site;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setSite($site)
    {
        $this->site = $site;
    }
}
