<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected string $status)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $text = getStatusSupport($this->status);

        switch ($this->status) {
            case 'A':
                $color = "blue";
                break;
            
            case 'C':
                $color = 'green';
                break;

            case 'P':
                $color = "red";
                break;
            
            default:
                $color = 'blue';
                break;
        }

        return view('components.status-support', compact('text', 'color'));
    }
}
