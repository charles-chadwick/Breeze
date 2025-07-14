<?php

namespace App\Livewire;

use App\Livewire\Traits\Sortable;
use App\Models\Discussion;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListDiscussions extends Component
{
    use WithPagination, Sortable;

    public $status = [];

    public function mount() : void
    {
        $this->status = [
            'Active',
            'Inactive'
        ];
    }

    public function render() : View
    {
        return view('livewire.discussions.list', [
            'discussions' => Discussion::whereRelation('users', 'user_id', '=', auth()->id())
                                       ->orderBy($this->sort_by, $this->sort_direction)
                                       ->get()

        ]);
    }
}
