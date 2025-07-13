<?php

namespace App\Livewire;

use App\Models\Discussion;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowDiscussion extends Component
{
    public ?Discussion $discussion;
    public             $sort_by = 'created_at';
    public             $sort_direction_text = 'Oldest To Newest';
    public string      $sort_direction = 'desc';

    public function mount(?Discussion $discussion) : void
    {
        $this->discussion = $discussion;
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
        return view('livewire.discussions.show', [
            'discussion' => $this->discussion,
            'messages'   => $this->discussion->messages()
                 ->orderBy($this->sort_by, $this->sort_direction)
                 ->get()
        ]);
    }
}
