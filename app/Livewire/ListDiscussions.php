<?php

namespace App\Livewire;

use App\Livewire\Traits\Sortable;
use App\Models\Discussion;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListDiscussions extends Component
{
    use Sortable, WithPagination;

    #[On('refresh-page')]
    public function render(): View
    {
        // we are getting this user's stuff, but what about others?
        return view('livewire.discussions.list', [
            'discussions' => Discussion::whereRelation('users', 'user_id', '=', auth()->id())
                ->orderBy($this->sort_by, $this->sort_direction)
                ->get(),

        ]);
    }
}
