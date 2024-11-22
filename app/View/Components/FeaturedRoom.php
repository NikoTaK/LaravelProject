<?php

namespace App\View\Components;

use App\Models\Room;
use Illuminate\View\Component;

class FeaturedRoom extends Component
{

   public function __construct(public Room $room) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.featured-room');
    }
}
