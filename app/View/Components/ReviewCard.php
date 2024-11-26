<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReviewCard extends Component
{
    public $review;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.review-card');
    }
}
