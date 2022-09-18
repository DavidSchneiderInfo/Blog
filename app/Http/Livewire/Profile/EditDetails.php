<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditDetails extends Component
{
    public $isActive = false;

    public $name;
    public $email;

    public function activate()
    {
        $this->isActive = true;
    }

    public function save()
    {
        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        $this->isActive = false;
    }

    public function deactivate()
    {
        $this->isActive = false;
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        return view('livewire.profile.edit-details')
            ->with('user', $user);
    }
}
