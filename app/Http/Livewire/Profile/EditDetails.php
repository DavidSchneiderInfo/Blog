<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditDetails extends Component
{
    public $isActive = false;

    public $name;
    public $email;

    protected array $rules = [];

    public function activate()
    {
        $this->isActive = true;
    }

    public function save()
    {
        $user = Auth::user();

        $this->rules = [
            'name' => [
                'required',
                'min:3',
                Rule::unique('users')->ignore($user),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ],
        ];
        $this->validate();

        $user->name = $this->name;
        if ($user->email !== $this->email) {
            $user->email = $this->email;
            $user->email_verified_at = null;
        }
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
