<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Service;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class TabRoomService extends Component
{
    use WithFileUploads, WithPagination;

    // public $tab = 'service';
    public $tab = 'room';

    // action room
    public $modal_room, $modal_destroyRoom;
    public $insert_name, $insert_type, $insert_bedroom, $insert_customer, $insert_price, $insert_title, $insert_description;
    public $insert_discount = 0;
    public $insert_service = [];
    public $insert_file = [];
    // action service
    public $action_service = false;
    public $in_nameService;
    public $slup_service;
    public $up_nameService;

    public function tabRoomService($itemTab){
        $this->tab = $itemTab;
    }
    public function checkAllService(){
        $service = Service::get('id');
        if(count($this->insert_service) == 0){
            foreach($service as $item){
                array_push($this->insert_service,$item->id);
            }
        }else{
            $this->insert_service = [];
        }
    }

    // function room
    public function getCustomer(){
        if ($this->insert_bedroom == 'Single') {
            $this->insert_customer = 1;
        }elseif($this->insert_bedroom == 'Triple'){
            $this->insert_customer = 3;
        }elseif($this->insert_bedroom == 'Twin' or $this->insert_bedroom == 'Double'){
            $this->insert_customer = 2;
        }
    }
    public function saveRoom(){ //update room in
        $this->validate([
                'insert_name'=>"required",
                'insert_type'=>"required",
                'insert_bedroom'=>"required",
                'insert_customer'=>"required",
                'insert_price'=>"required"
            ],[
                'insert_name.required'=>'*',
                'insert_type.required'=>'*',
                'insert_bedroom.required'=>'*',
                'insert_customer.required'=>'*',
                'insert_price.required'=>'*'
            ], 
            session()->flash('error','Check input, please !')
        );
        session()->forget('error');

        $fileName = '';
        foreach($this->insert_file as $file){
            if(count($this->insert_file) > 1){
                $fileName .= $file->getClientOriginalName().', ';
            }else{
                $fileName = $file->getClientOriginalName();
            }
            $file->storeAs('public\photo_wyndham',$file->getClientOriginalName());
        }
        // return;
        Room::insert([
            'numberRoom'          => $this->insert_name,
            'types'         => $this->insert_type,
            'bed'           => $this->insert_bedroom,
            'customer'      => $this->insert_customer,
            'price'         => str_replace('.','', $this->insert_price),
            'discount'      => $this->insert_discount,
            'service'       => implode(", ", $this->insert_service),
            'title'         => $this->insert_title,
            'img'           => $fileName,
            'description'   => $this->insert_description
        ]);
        
        $this->reset([
            'insert_name',
            'insert_type',
            'insert_bedroom',
            'insert_customer',
            'insert_price',
            'insert_discount',
            'insert_service',
            'insert_title',
            'insert_file',
            'insert_description'
        ]);
        session()->flash('success', 'Create new room success');
        return view('livewire.tab-room-service'); 
    }
    public function modalUpdateRoom($modal){
        $this->modal_room = 'modalRoom'.$modal;
    }
    public function modalDestroyRoom($modal){
        $this->modal_destroyRoom = 'modal_destroyRoom'.$modal;
    }
    public function destroyRoom($item){
        Room::find($item)->delete();
        session()->flash('success2','Delete success');
    }

    // function service
    public function actionService($action){
        if($this->action_service == $action){
            $this->action_service = false;
        }else{
            $this->action_service = $action;
        }
    }
    public function saveService(){
        $this->validate([
                'in_nameService'=>"required",
            ],[
                'in_nameService.required'=>'*'
            ], 
        );
        Service::insert(['name'=>$this->in_nameService]);
        $this->reset('in_nameService');
        session()->flash('success', 'Success');
    }
    public function selectIdService(){
        // $this->up_nameService = $this->slup_service;
        $service = explode('-',$this->slup_service);
        if(count($service) > 1){
            $this->up_nameService = $service[1];
        }
    }
    public function updateService(){
        $this->validate([
                'up_nameService'=>"required",
            ],[
                'up_nameService.required'=>'*'
            ], 
        );
        $service = explode('-',$this->slup_service);
        Service::findOrFail($service[0])->update(['name'=>$this->up_nameService]);
        $this->reset('up_nameService');
        session()->flash('success', 'Delete');
    }
    public function destroyService($ser){
        Service::findOrFail($ser)->delete();
        session()->flash('success', 'Success');
        // session()->forget('success');
    }
    public function render()
    {
        $rooms = Room::limit(10)->paginate(10);
        $services = Service::all();
        return view('livewire.tab-room-service', ['rooms'=>$rooms,'services'=>$services]);
    }
}
