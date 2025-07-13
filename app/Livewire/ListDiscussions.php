<?php

namespace App\Livewire;

use App\Models\Discussion;
use Illuminate\View\View;
use Livewire\Component;

class ListDiscussions extends Component
{
    public $sort_by        = 'created_at';
    public $sort_direction = 'desc';
    public $sort_direction_text = "Oldest To Newest";
    public $status         = [];

    public function mount() : void
    {
        $this->status = [
            'Active',
            'Inactive'
        ];
    }

    public function sort($column) : void
    {
        if ($this->sort_by === $column) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
            $this->sort_direction_text = "Newest To Oldest";
        } else {
            $this->sort_by = $column;
            $this->sort_direction = 'asc';
            $this->sort_direction_text = "Oldest To Newest";
        }
    }

    public function render() : View
    {
        return view('livewire.discussions.list', [
            'discussions' => Discussion::whereRelation('users', 'user_id', '=', auth()->id())->get()

        ]);
    }
}
