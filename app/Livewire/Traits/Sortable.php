<?php

namespace App\Livewire\Traits;

trait Sortable {

    public $sort_by        = 'created_at';
    public $sort_direction = 'desc';
    public $sort_direction_text = "Oldest To Newest";

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

}
