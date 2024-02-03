<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function UpdateRoom(Request $request){
        if(empty($request->up_name) || empty($request->up_type) || empty($request->up_bedroom) || empty($request->up_price)){
            session()->flash('error2', $request->id);
            $request->validate([
                    'up_name'=>"required",
                    'up_type'=>"required",
                    'up_bedroom'=>"required",
                    'up_price'=>"required"
                ],[
                    'up_name.required'=>'*',
                    'up_type.required'=>'*',
                    'up_bedroom.required'=>'*',
                    'up_price.required'=>'*'
                ],
            );
        }
        // session()->forget('error2');
        if ($request->up_bedroom == 'Single') {
            $up_customer = 1;
        }elseif($request->up_bedroom == 'Triple'){
            $up_customer = 3;
        }elseif($request->up_bedroom == 'Twin' or $request->up_bedroom == 'Double'){
            $up_customer = 2;
        }

        $room = Room::find($request->id);
        $room->numberRoom          = $request->up_name;
        $room->types         = $request->up_type;
        $room->bed           = $request->up_bedroom;
        $room->customer      = $up_customer;
        $room->price         = str_replace('.','', $request->up_price);
        $room->discount      = $request->up_discount;
        $room->service       = implode(", ", $request->up_service);
        $room->title         = $request->up_title;
        $room->description   = $request->up_description;
        if($request->hasfile('up_file')){
            $fileName = '';
            foreach($request->file('up_file') as $file){
                if(count($request->up_file) > 1){
                    $fileName .= $file->getClientOriginalName().', ';
                }else{
                    $fileName .= $file->getClientOriginalName();
                }
                $file->storeAs('public\photo_wyndham',$file->getClientOriginalName());
            }
            $room->img = $fileName;
        }
        $room->save();

        session()->flash('success2', 'Success !');
        return back();
    }

    public function checkin(Request $item){
        Booking::where('idBooking',$item->id)->update([
            'status'=>'1'
        ]);
        return back();
    }
    public function checkout(Request $item){
        Booking::where('idBooking',$item->id)->update([
            'status'=>'2'
        ]);
        return back();
    }
}
