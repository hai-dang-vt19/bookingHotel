<div x-data="{ openBooking: false }" class="mx-5 px-5">
    <div class="w-1/6">
        <button @click="openBooking = ! openBooking" class="outline-none h-fit mx-5 px-3 py-1 bg-green-500 text-white rounded">
            Booking
        </button>
    </div>
 
    <div x-show="openBooking"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.200ms
        class="flex flex-row justify-center mt-3 mb-5"
        style="max-height: 500px"
    >
        @php
            use App\Models\Room;
            use App\Models\User;
            use App\Models\Booking;
            use Carbon\Carbon;
        @endphp
        <form autocomplete="off" class="border border-green-600 rounded px-4 py-3 shadow">
        {{-- <form action="{{ route('saveBooking') }}" method="POST" autocomplete="off" class="border border-green-600 rounded px-4 py-3 shadow"> --}}
            @csrf
            <div class="border-b-2 flex">
                <p class="font-medium text-lg">Booking Person</p>
                <div class="mt-5">
                    <div class="flex justify-start my-5">
                        <div wire:keydown.tab='checkUser' class="mx-1 border border-green-600 rounded bg-white font-medium">
                            <p class="label__input text-green-600 text-sm">Phone</p>
                            <input wire:model="phone" class="my-2 px-3 w-full outline-none" type="number">
                        </div>
                        <div wire:click='checkUser' class="mx-1 border border-green-600 rounded bg-white font-medium">
                            <p class="label__input text-green-600 text-sm">Name</p>
                            <input wire:model="name" class="my-2 px-3 w-full outline-none" type="text">
                        </div>
                    </div>
                    <div class="flex flex-warp justify-start my-5">
                        <div class="mx-1 border border-green-600 rounded bg-white font-medium">
                            <p class="label__input text-green-600 text-sm">Checkin - Checkout</p>
                            <input wire:model="checkInOut" class="my-2 px-3 w-96 outline-none" type="text" id="checkInOut">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-y-auto py-1 max-h-96">
                <div class="border-l-2 border-green-600 my-5">
                    <p class="mb-5 mt-2 px-5 font-medium border-r-2 border-t-2 border-green-600 w-fit drop-shadow">Room @if($checkUpLstRoom > 0) {{ $checkUpLstRoom }} @endif</p>
                    <div class="flex flex-warp mb-3 mx-2">
                        <div class="mx-1 border border-green-600 rounded bg-white font-medium">
                            <p class="label__input text-green-600 text-sm">Adult</p>
                            <input wire:model='adult' class="my-2 px-3 w-full outline-none" type="number" placeholder="0">
                        </div>
                        <div class="mx-1 border border-green-600 rounded bg-white font-medium">
                            <p class="label__input text-green-600 text-sm">Children</p>
                            <input wire:model="children" class="my-2 px-3 w-full outline-none" type="number" placeholder="0">
                        </div>
                        <div class="mx-1 border border-green-600 rounded bg-white font-medium">
                            <p class="label__input text-green-600 text-sm">Baby</p>
                            <input wire:model="baby" class="my-2 px-3 w-full outline-none" type="number" placeholder="0">
                        </div>
                    </div>
                    @php
                        $explode_inout = explode(' to ', $this->checkInOut);
                        $inout_array = [];
                        foreach ($bookings as $val) {
                            $ck_time_in = Carbon::parse($explode_inout[0])->betweenIncluded($val->checkin, $val->checkout);
                            if($ck_time_in == true){
                                array_push($inout_array, $val->idRoom);
                                // chưa check được ngày out có khách ở
                                // if(count($explode_inout) > 1){
                                //     $ck_time_out = Carbon::parse($explode_inout[1])->betweenIncluded($val->checkin, $val->checkout);
                                //     if($ck_time_out == false){
                                //         array_push($inout_array, $val->idRoom);
                                //     }
                                // }
                            }
                        }
                        $sum = array_sum([$adult,$children]);
                        $check = ($sum > 3) ? 3 : $sum;
                        $lstRooms = Room::where('customer',$check)->whereNotIn('numberRoom', $inout_array)->get();
                    @endphp
                    <div class="flex flex-warp mx-2">
                        <div class="my-2 mx-1 border border-green-600 rounded bg-white font-medium">
                            <p class="label__input text-green-600 text-sm">Room</p>
                            <input list="idRooms" wire:model="roomBooking" class="my-2 px-3 w-full outline-none">
                            <datalist id="idRooms">
                                @foreach ($lstRooms as $lstRoom)
                                    <option value="{{ $lstRoom->numberRoom.' - '.$lstRoom->types.' '.$lstRoom->bed }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="my-2 mx-1 bg-white font-medium">
                            @php
                                $expRoom = explode(' - ', $this->roomBooking);
                                $infoRoom = Room::where('numberRoom',$expRoom[0])->get();
                            @endphp
                            @foreach ($infoRoom as $item)
                                <div class="mt-2 px-3 text-green-600 flex">
                                    <p class="px-2">Price: <span class="text-slate-500">{{ number_format($item->price,0,'.','.') }} &#8363;</span></p>
                                    <p class="px-2">Discount: <span class="text-slate-500">{{ $item->discount }}</span></p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-1 flex flex-row justify-end">
                <button wire:click='pushBooking' type="button" class="px-4 py-1 mx-1 rounded text-white font-medium bg-green-600">Push</button>
                @if($checkUpLstRoom > 0)
                    <button wire:click="updateLstRoom('{{$checkUpLstRoom-1}}')" type="button" class="px-3 py-1 mx-1 text-green-600 font-medium bg-white border rounded border-green-600">Update</button>
                @endif
            </div>
        </form>
        @if (!empty($listsBookings))
            <div class="mx-2 w-80 overflow-y-scroll border border-green-600 rounded px-4 shadow">
                <div class="sticky top-0 text-center bg-white py-1 font-medium">
                    List booking room
                </div>
                @for ($i = 0; $i < count($listsBookings); $i++)
                    <div class="my-4 flex">
                        <div class="w-1/5 px-1 bg-green-500 text-center border-y border-l border-green-500 text-white">{{ $i+1 }}</div>
                        <button wire:click="getUpdate('{{$i}}')" type="button" class="outline-none w-4/5 px-1 text-left bg-white border-y border-green-500">{{ $listsBookings[$i]['roomBooking'] }}</button>
                        <button wire:click="destroyItemListBooking('{{$i}}')" type="button" class="w-1/5 px-2 py-1 bg-red-500 flex justify-center outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>                              
                        </button>
                    </div>
                @endfor
                <div class="bg-white py-2 sticky bottom-0">
                    <button wire:click='saveBooking' type="button" class="text-white font-medium border border-green-600 py-1 bg-green-600 w-full">Save</button>
                </div>
            </div>
        @endif
    </div>
</div>
<script>
    flatpickr("#checkInOut", {
        mode: "range",
        dateFormat: "d-m-Y H:i:S",
        enableTime: true,
        time_24hr: true,
        minDate: "today"
    });
</script>