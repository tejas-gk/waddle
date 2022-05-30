<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ValidateForm extends Component
{
    public $email;
    public $password;
    public $count=0;
   
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];
    public function updated($field)
    {
        $this->validateOnly($field);
    }
    public function count()
    {
        $this->count++;
    }
    public function render()
    {
        return view('community.community',['email'=>$this->email]);
    }
}
