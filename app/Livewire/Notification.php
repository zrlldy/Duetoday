<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $message = null;

    public $type = 'success';

    protected $listeners = [
        'taskAdded' => 'showTaskadded',
        'taskdeleted' => 'showTaskDeleted',
    ];

    public function showTaskadded($notifname)
    {
        $this->message = $notifname.' has been  Added';
        $this->type = 'success';
        $this->dispatch('hideNotification');
    }

    public function showTaskDeleted($notifname)
    {
        $this->message = $notifname.'has been deleted';
        $this->type = 'error';
        $this->dispatch('hideNotification');
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
