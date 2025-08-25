<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email, $password, $remember ;

    public function rules()
    {
        return[
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    public function Login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($this->only(['email', 'password']), $this->remember)) {
            $this->addError('email', _('auth.failed'));
            return null;
        }

        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
