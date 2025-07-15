<?php

namespace App\Livewire;

use Flux\Flux;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Component;

class ConfirmDelete extends Component
{
    public Model $model;

    public string $modal_id;

    public function delete(): void
    {
        if ($this->model->delete()) {
            $message = 'Successfully deleted record.';
            $variant = 'success';
        } else {
            $message = 'Error deleting record.';
            $variant = 'error';
        }
        Flux::toast($message, heading: ucwords($message), variant: $variant, position: 'top-right');
        Flux::modal($this->modal_id)
            ->close();
        $this->dispatch('refresh-page');
    }

    public function render(): View
    {
        return view('livewire.partials.confirm-delete');
    }
}
