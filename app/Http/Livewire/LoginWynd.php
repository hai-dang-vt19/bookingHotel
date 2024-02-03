<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginWynd extends Component
{
    public $email,$password;

    public function render()
    {
        return view('livewire.login-wynd');
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ],[
            'email.required'=>'*',
            'password.required'=>'*',
            'password.min'=>'Password phải lớn hơn 8'
        ]);
        
        if(Auth::attempt($validatedDate)){
            session()->regenerate();
            if (Auth::check()) {
                session()->flash('welcome', 'Đăng nhập thành công');
                return redirect()->route('booking');
            }
        }else{
            session()->flash('Error', 'Đăng nhập không thành công');
            return redirect()->route('login');
        }
    }
}
