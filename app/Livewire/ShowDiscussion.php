<?php

namespace App\Livewire;

use App\Models\Discussion;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowDiscussion extends Component
{
    public ?Discussion $discussion;

    public function mount(?Discussion $discussion) : void
    {
        $this->discussion = $discussion;
    }

    public function render() : View
    {
        return view('livewire.discussions.show', [
            'discussion' => $this->discussion,
            'messages'   => $this->discussion->messages()
                 ->orderBy('created_at', 'desc')
                 ->get()
        ]);
    }
}
