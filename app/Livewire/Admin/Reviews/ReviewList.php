<?php

namespace App\Livewire\Admin\Reviews;

use App\Models\Reviews;
use Livewire\Component;

class ReviewList extends Component
{
    public function render()
    {
        $reviews = Reviews::paginate(10);
        return view('livewire.admin.reviews.review-list', ['reviews' => $reviews]);
    }
}
