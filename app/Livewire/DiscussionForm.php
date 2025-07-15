<?php

namespace App\Livewire;

use App\Enums\DiscussionUserStatus;
use App\Enums\UserRole;
use App\Models\Discussion;
use App\Models\User;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class DiscussionForm extends Component
{
    public $title;

    public $content;

    public ?Discussion $discussion;

    public $users = [];

    public $selected_users = [];

    public $selected_user_id;

    public $modal_id;

    public function mount(): void
    {
        $this->users = User::where('role', '!=', UserRole::Administrator)
            ->get();
    }

    public function addUser(): void
    {
        if (! $this->selected_user_id) {
            return;
        }

        $user = collect($this->users)->firstWhere('id', $this->selected_user_id);
        if (! $user) {
            return;
        }

        $this->selected_users[] = $user;
        $this->users = collect($this->users)
            ->filter(fn ($user) => $user['id'] != $this->selected_user_id)
            ->values();
        $this->selected_user_id = null;
    }

    public function removeUser($user_id): void
    {
        $user = collect($this->selected_users)->firstWhere('id', $user_id);

        if ($user) {
            $this->users[] = $user;
            $this->selected_users = collect($this->selected_users)
                ->filter(fn ($user) => $user['id'] != $user_id)
                ->values();
        }
    }

    public function save(): void
    {
        $this->validate();

        $discussion_data = [
            'title' => $this->title,
            'status' => 'Bleh',
            'user_id' => auth()->id(),
        ];

        $this->discussion = Discussion::create($discussion_data);
        $this->discussion->messages()
            ->create([
                'discussion_id' => $this->discussion->id,
                'content' => $this->content,
                'user_id' => auth()->id(),
            ]);

        collect($this->selected_users)
            ->add(auth()->user())
            ->each(fn ($user) => $this->discussion->users()
                ->attach([
                    'user_id' => $user->id,
                ], [
                    'status' => DiscussionUserStatus::Unread,
                ]));

        $message = 'Discussion has been created';

        Flux::toast($message, heading: 'Success', variant: 'success', position: 'top-right');
        Flux::modal($this->modal_id)
            ->close();
        $this->redirect(route('discussions.show', $this->discussion->id));
    }

    protected function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
        ];
    }

    public function render(): View
    {
        return view('livewire.discussions.form');
    }
}
