<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    public function updated(){
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }

    public function login(){
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            return redirect()->route('administrador');
        }else{
            session()->flash('error', 'Las credenciales son incorrectas');
    }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
