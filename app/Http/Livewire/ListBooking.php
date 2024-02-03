<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListBooking extends Component
{
    public $modelLstBooking = '';
    public function showModal($item){
        $this->modelLstBooking = 'itmBooking'.$item;
    }

    public function destroyBooking($item){
        Booking::where('idBooking',$item)->update([
            'status'=>'3'
        ]);
    }

    public function render()
    {
        $bookings = DB::table('bookings')
                        ->join('users', function ($usJoin) {
                            $usJoin->on('bookings.phone','=','users.phone')
                                    ->where('roles', 'customer');
                        })
                        ->join('rooms','bookings.idRoom','=','rooms.numberRoom')
                        ->where('bookings.status','<','3')
                        ->select(
                            'bookings.id', 'bookings.idBooking', 'bookings.checkin', 'bookings.checkout', 'bookings.status', 'bookings.adult', 'bookings.children', 'bookings.baby',
                            'users.name', 'users.email', 'users.gender', 'users.address', 'users.phone',
                            'rooms.numberRoom', 'rooms.types', 'rooms.price', 'rooms.discount', 'rooms.service', 'rooms.bed' 
                    )->get();
        return view('livewire.list-booking', ['bookings'=>$bookings]);
    }
}
