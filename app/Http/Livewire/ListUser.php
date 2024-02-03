<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;
use Livewire\WithPagination;

class ListUser extends Component
{
    use WithPagination;

    public $search;
    public $roles = '';
    public $limits = '10';
    public $elements = 'name';
    protected $queryString = ['search','roles','limits','elements'];

    public $modal_more = '';
    public $modal_destroy = '';

    public $up_name;
    public $up_gender;
    public $up_email;
    public $up_phone;
    public $up_roles;
    public $up_address;

    public function showModalMore($itemModalMore) {
        $this->modal_more = 'modalMore'.$itemModalMore;
    }
    public function showModalDestroy($itemModalDestroy) {
        $this->modal_destroy = 'modalDestroy'.$itemModalDestroy;
    }
    public function resetInputModal(){
        $this->reset(['up_name', 'up_gender', 'up_email', 'up_phone', 'up_roles', 'up_address']);
    }

    public function updateUser($id_update){
        try {
            // $data = User::findOrFail(100);
            $data = User::findOrFail($id_update);
                if (!empty($this->up_name)) {$data->name = $this->up_name;}
                if ($this->up_gender >= 0) {$data->gender = $this->up_gender;}
                if (!empty($this->up_email)) {$data->email = $this->up_email;}
                if (!empty($this->up_phone)) {$data->phone = $this->up_phone;}
                if (!empty($this->up_roles)) {$data->roles = $this->up_roles;}
                if (!empty($this->up_address)) {$data->address = $this->up_address;}
            $data->save();
            session()->flash('success','update user success');
        } catch (ModelNotFoundException $ex) {
            session()->flash('error', $ex->getMessage());
        }
        $this->resetInputModal();
        $this->modal_more = false;
    }

    public function destroyUser($id_destroy) {
        User::find($id_destroy)->delete();
        session()->flash('success','delete user success');
    }
    public function render()
    {
        $user = User::where($this->elements,'like','%'.$this->search.'%');
        if($this->roles != ''){
            $users = $user->where('roles',$this->roles);
        }
        $users = $user->limit($this->limits)->paginate($this->limits);
        return view('livewire.list-user', ['users'=>$users]);
    }
}
