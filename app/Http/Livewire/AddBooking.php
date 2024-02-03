<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AddBooking extends Component
{
    public $checkInOut, $name, $phone, $adult, $children, $baby, $roomBooking;
    public $checkUpLstRoom = false;
    public $listsBookings = [];

    public function checkUser(){
        $check_phone = User::where('roles','customer')->where('phone', $this->phone)->get('name');
        if($check_phone != '[]'){
            foreach ($check_phone as $value) {
                $this->name = $value->name;
            }
        }else{
            $this->name = '';
        }
    }

    public function pushBooking() {
        $this->checkUpLstRoom=false;

        $exp_id = explode(' - ', $this->roomBooking);
        $exp_inout = explode(' to ', $this->checkInOut);
        $ck_out = (empty($exp_inout[1])) ? $exp_inout[0] : $exp_inout[1];

        $getAdult = ($this->adult == null) ? 0 : $this->adult;
        $getChildren = ($this->children == null) ? 0 : $this->children;
        $getBaby = ($this->baby == null) ? 0 : $this->baby;

        $new = [
            'id'=>$exp_id[0],
            'checkInOut'=>$this->checkInOut,
            'nameCustomer'=>$this->name,
            'phoneCustomer'=>$this->phone,
            'adult'=>$getAdult,
            'children'=>$getChildren,
            'baby'=>$getBaby,
            'roomBooking'=>$this->roomBooking,
            'checkIn'=>Carbon::parse($exp_inout[0])->toDateTimeString(),
            'checkOut'=>Carbon::parse($ck_out)->toDateTimeString(),
        ];
        array_push($this->listsBookings,$new);

        $this->reset([
            'adult',
            'children',
            'baby',
            'roomBooking',
        ]);
    }

    public function getUpdate($item){
        $this->checkInOut   = $this->listsBookings[$item]['checkInOut'];
        $this->adult        = $this->listsBookings[$item]['adult'];
        $this->children     = $this->listsBookings[$item]['children'];
        $this->baby         = $this->listsBookings[$item]['baby'];
        $this->roomBooking  = $this->listsBookings[$item]['roomBooking'];

        $this->checkUpLstRoom=$item+1;
    }
    public function updateLstRoom($item){
        $exp_id = explode(' - ', $this->roomBooking);
        $exp_inout = explode(' to ', $this->checkInOut);
        $ck_out = (empty($exp_inout[1])) ? $exp_inout[0] : $exp_inout[1];

        $this->listsBookings[$item]['id']               = $exp_id[0];
        $this->listsBookings[$item]['checkInOut']       = $this->checkInOut;
        $this->listsBookings[$item]['adult']            = $this->adult;
        $this->listsBookings[$item]['children']         = $this->children;
        $this->listsBookings[$item]['baby']             = $this->baby;
        $this->listsBookings[$item]['roomBooking']      = $this->roomBooking;
        $this->listsBookings[$item]['CheckIn']          = Carbon::parse($exp_inout[0])->toDateTimeString();
        $this->listsBookings[$item]['CheckOut']         = Carbon::parse($ck_out)->toDateTimeString();

        $this->reset([
            'adult',
            'children',
            'baby',
            'roomBooking',
        ]);
        $this->checkUpLstRoom=false;
    }

    public function destroyItemListBooking($item){
        array_splice($this->listsBookings,$item,1);
        $this->checkUpLstRoom=false;
    }

    public function saveBooking(){
        User::updateOrCreate([
            'phone'=>$this->phone,
        ],[
            'name'=>$this->name,
            'roles'=>'customer',
        ]);
        for($i=0; $i< count($this->listsBookings); $i++){
            Booking::create([
                'idBooking' =>'BOOKING-'.$this->listsBookings[$i]['phoneCustomer'],
                'idRoom'    =>$this->listsBookings[$i]['id'],
                'phone'     =>$this->listsBookings[$i]['phoneCustomer'],
                'adult'     =>$this->listsBookings[$i]['adult'],
                'children'  =>$this->listsBookings[$i]['children'],
                'baby'      =>$this->listsBookings[$i]['baby'],
                'checkin'   =>Carbon::parse($this->listsBookings[$i]['checkIn'])->toDateTimeString(),
                'checkout'  =>Carbon::parse($this->listsBookings[$i]['checkOut'])->toDateTimeString(),
            ]);
        }
        return redirect()->to('/booking');
    }
    
    public function render()
    {
        $bookings = Booking::where('status','<','3')->get();
        return view('livewire.add-booking', ['bookings'=>$bookings]);
    }
}
