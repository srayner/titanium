<?php

namespace Titanium\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    protected $created;
    protected $createdBy;
    protected $modified;
    protected $modifiedBy;
}