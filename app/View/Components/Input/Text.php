<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Text extends Component
{
    public string $name;
    public string $label;
    public bool $required;
    public array $inputAttributes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, bool $required = false, $inputAttributes = [])
    {
        $this->name = $name;
        $this->label = $label;
        $this->required = $required;
        $this->inputAttributes = $inputAttributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.text');
    }

    public function isRequired()
    {
        return $this->required;
    }
}
