<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddUser extends Component
{
    public $insert_name;
    public $insert_gender;
    public $insert_email;
    public $insert_phone;
    public $insert_roles;
    public $insert_address;

    protected $rules = [
        'insert_name'=>'required',
        'insert_email'=>'required',
        'insert_roles'=>'required',
    ];
    protected $message = [
        'insert_name'=>'*',
        'insert_email'=>'*',
        'insert_roles'=>'*',
    ];

    public function resetInputAddUser(){
        $this->reset(['insert_name', 'insert_gender', 'insert_email', 'insert_phone', 'insert_roles', 'insert_address']);
    }
    public function addUser() {
        if (empty($this->insert_name) or empty($this->insert_roles)) {
            session()->flash('error', 'name and roles not null');
            $this->validate([
                'insert_name'=>'required',
                'insert_roles'=>'required',
            ],[
                'insert_name.required'=>'*',
                'insert_roles.required'=>'*',
            ]);
        }

        if ($this->insert_roles != 'customer') {
            $password = Hash::make(12345678);
        }else { $password = null;}

        try {
            User::create([
                'name'=>$this->insert_name,
                'gender'=>$this->insert_gender,
                'email'=>$this->insert_email,
                'phone'=>$this->insert_phone,
                'roles'=>$this->insert_roles,
                'adddress'=>$this->insert_address,
                'password'=>$password
            ]);
            session()->flash('success', 'Add user success');
        } catch (ModelNotFoundException $ex) {
            session()->flash('error', $ex->getMessage());
        }
        $this->reset(['insert_name', 'insert_gender', 'insert_email', 'insert_phone', 'insert_roles', 'insert_address']);
    }
    public function render()
    {
        return view('livewire.add-user');
    }
}
