<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public string $name;
    public string $variant;
    public function __construct( string $name, string  $variant ='outline')
    {
       this-> = $name;
       this-> = $variant;
    }


    public function render(): View|Closure|string
    {
        return view('components.icon');
    }
}
