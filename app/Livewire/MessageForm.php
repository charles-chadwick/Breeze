<?php

namespace App\Livewire;

use App\Models\Discussion;
use App\Models\DiscussionMessage;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class MessageForm extends Component
{
    public Discussion         $discussion;
    public ?DiscussionMessage $message;
    public                    $content;
    public                    $modal_id;

    public function mount(Discussion $discussion, ?DiscussionMessage $message) : void
    {
        $this->discussion = $discussion;
        $this->message = $message;
        if ($message->id !== null) {
            $this->fill($message);
        }
    }

    public function save() : void
    {
        $this->validate();

        $message_data = [
            'status'  => 'Unread',
            'content' => $this->content,
        ];

        if ($this->message->id === null) {
            $message_data['user_id'] = auth()->id();
            $this->message = $this->discussion->messages()
                                              ->create($message_data);
            $message = 'Message has been created';
        } else {
            $this->message->update($message_data);
            $message = 'Message has been updated';
        }

        Flux::toast($message, heading: 'Success', variant: 'success', position: 'top-right');
        Flux::modal($this->modal_id)
            ->close();
        $this->dispatch("refresh-page");
    }

    protected function rules() : array
    {
        return [
            'content' => 'required|string',
        ];
    }

    public function render() : View
    {
        return view('livewire.discussions.message-form');
    }
}
