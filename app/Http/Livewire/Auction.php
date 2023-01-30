<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Auction extends Component
{
    public function render()
    {
        return view('livewire.auction')
        ->layout('layouts.main')
        ->section('content');
    }
}
