<?php

namespace Titanium\Form;

class PlantForm extends HorizontalForm
{
    public function __construct()
    {
        parent::__construct();
        
        $this->compact = true;
        $this->labelWidth = 3;
        $this->controlWidth = 9;
        
        $this->addText('name', 'Plant Name')
             ->addText('site', 'Site')
             ->addButton('submit', 'Add', 'btn-primary');   
    }
}