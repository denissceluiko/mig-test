<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class Sort extends Component
{
    public Request $request;

    public string $column;
    public string $order;
    public string $chevron;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $column)
    {
        $this->request = request();
        $this->column = $column;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->setOrder();
        $this->setChevron();

        return view('components.sort');
    }

    protected function setOrder()
    {
        $this->order = $this->request->has($this->column) ? $this->invert() : 'asc';
    }

    protected function invert()
    {
        return $this->request->get($this->column) == 'asc' ? 'desc' : 'asc';
    }

    protected function setChevron()
    {
        $this->chevron = $this->order == 'asc' ? 'v' : '^';
    }
}
