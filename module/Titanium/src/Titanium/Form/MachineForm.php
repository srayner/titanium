<?php

namespace Titanium\Form;

class MachineForm extends HorizontalForm
{
    public function __construct()
    {
        parent::__construct();
        
        $this->compact = true;
        $this->labelWidth = 3;
        $this->controlWidth = 9;
        
        $this->addText('name', 'Machine Name')
             ->addText('site', 'Machine Type')
             ->addButton('submit', 'Add', 'btn-primary');   
    }
}