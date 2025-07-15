<?php

namespace App\Livewire;

use App\Livewire\Traits\Sortable;
use App\Models\Discussion;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDiscussion extends Component
{
    use Sortable, WithPagination;

    public ?Discussion $discussion;

    public function mount(?Discussion $discussion): void
    {
        $this->discussion = $discussion;
    }

    #[On('refresh-page')]
    public function render(): View
    {
        return view('livewire.discussions.show', [
            'discussion' => $this->discussion,
            'messages' => $this->discussion->messages()
                ->orderBy($this->sort_by, $this->sort_direction)
                ->paginate(4),
        ]);
    }
}
