<?php

namespace Titanium\Entity;

abstract class AbstractEntity
{
    protected $id;
    protected $created;
    protected $createdBy;
    protected $modified;
    protected $modifiedBy;
}