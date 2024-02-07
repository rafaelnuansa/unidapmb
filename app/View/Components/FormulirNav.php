<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormulirNav extends Component
{
    public $encryptRegistNumber;

    public function __construct($encryptRegistNumber)
    {
        $this->encryptRegistNumber = $encryptRegistNumber;
    }

    public function render()
    {
    return view('components.formulir-nav');
    }
}
